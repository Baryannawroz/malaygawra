<?php

namespace App\Support;

class Photo
{
    /** @var array<string,string>|null */
    private static ?array $index = null;

    public static function url(?string $path): ?string
    {
        $name = self::filename($path);

        if (! $name) {
            return null;
        }

        return url('media/photo').'?f='.rawurlencode($name);
    }

    public static function filename(?string $path): ?string
    {
        $relative = self::relative($path);

        return $relative ? basename($relative) : null;
    }

    public static function relative(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        $path = ltrim(str_replace('\\', '/', $path), '/');
        $path = preg_replace('#^(storage/app/public/|storage/|public/)+#', '', $path);

        return $path !== '' ? $path : null;
    }

    /** Longest edge (px) kept after compression. */
    public const MAX_DIMENSION = 1000;

    /** JPEG quality (0-100) used when compressing. */
    public const JPEG_QUALITY = 75;

    public static function store(\Illuminate\Http\UploadedFile $file): string
    {
        $storageDir = storage_path('app/public/photos');
        if (! is_dir($storageDir)) {
            mkdir($storageDir, 0755, true);
        }

        $base = preg_replace('/[^A-Za-z0-9._-]/', '_', pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $base = trim($base, '_') ?: 'photo';

        // Preferred: compress to a smaller JPEG.
        $filename = time().'_'.$base.'.jpg';
        $target = $storageDir.DIRECTORY_SEPARATOR.$filename;

        if (! self::compress($file->getRealPath(), $target)) {
            // Fallback: store the original file untouched.
            $ext = strtolower($file->getClientOriginalExtension() ?: 'jpg');
            $filename = time().'_'.$base.'.'.$ext;
            $file->move($storageDir, $filename);
        }

        self::$index = null;

        return 'photos/'.$filename;
    }

    /**
     * Downscale + re-encode an uploaded image to a compressed JPEG using GD.
     * Returns false when GD is unavailable or the file is not a supported image,
     * so the caller can fall back to storing the original.
     */
    public static function compress(?string $source, string $target): bool
    {
        if (! $source || ! is_file($source) || ! function_exists('imagecreatetruecolor')) {
            return false;
        }

        $info = @getimagesize($source);
        if (! $info) {
            return false;
        }

        [$width, $height] = $info;
        $type = $info[2];

        $src = match ($type) {
            IMAGETYPE_JPEG => function_exists('imagecreatefromjpeg') ? @imagecreatefromjpeg($source) : false,
            IMAGETYPE_PNG => function_exists('imagecreatefrompng') ? @imagecreatefrompng($source) : false,
            IMAGETYPE_GIF => function_exists('imagecreatefromgif') ? @imagecreatefromgif($source) : false,
            IMAGETYPE_WEBP => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($source) : false,
            default => false,
        };

        if (! $src) {
            return false;
        }

        // Correct orientation from EXIF for JPEG photos (phone cameras).
        if ($type === IMAGETYPE_JPEG && function_exists('exif_read_data')) {
            $exif = @exif_read_data($source);
            $orientation = $exif['Orientation'] ?? 0;

            if (in_array($orientation, [3, 6, 8], true)) {
                $angle = match ($orientation) {
                    3 => 180,
                    6 => -90,
                    8 => 90,
                    default => 0,
                };
                $rotated = @imagerotate($src, $angle, 0);
                if ($rotated) {
                    imagedestroy($src);
                    $src = $rotated;
                    $width = imagesx($src);
                    $height = imagesy($src);
                }
            }
        }

        $scale = min(1, self::MAX_DIMENSION / max($width, $height));
        $newW = max(1, (int) round($width * $scale));
        $newH = max(1, (int) round($height * $scale));

        $dst = imagecreatetruecolor($newW, $newH);
        // Flatten any transparency onto white (JPEG has no alpha).
        $white = imagecolorallocate($dst, 255, 255, 255);
        imagefilledrectangle($dst, 0, 0, $newW, $newH, $white);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $width, $height);

        $ok = imagejpeg($dst, $target, self::JPEG_QUALITY);

        imagedestroy($src);
        imagedestroy($dst);

        return (bool) $ok;
    }

    /**
     * Base directories that may contain uploaded photos, in priority order.
     *
     * @return array<int,string>
     */
    public static function baseDirs(): array
    {
        return array_values(array_filter([
            storage_path('app/public/photos'),
            storage_path('app/public/public/photos'),
            storage_path('app/public'),
            public_path('photos'),
            public_path('storage/photos'),
            public_path('storage/app/public/photos'),
        ], 'is_dir'));
    }

    public static function fullPath(?string $path): ?string
    {
        $name = self::filename($path);

        if (! $name || str_contains($name, '..')) {
            return null;
        }

        // Fast path: exact file in a known directory.
        foreach (self::baseDirs() as $dir) {
            $direct = $dir.DIRECTORY_SEPARATOR.$name;
            if (is_file($direct)) {
                return $direct;
            }
        }

        // Robust path: case-insensitive lookup in a recursive index.
        $index = self::index();
        $key = mb_strtolower($name);

        return $index[$key] ?? null;
    }

    /**
     * Build (and cache) a filename => absolute path index by scanning
     * the storage and public trees. Handles unknown upload locations.
     *
     * @return array<string,string>
     */
    public static function index(): array
    {
        if (self::$index !== null) {
            return self::$index;
        }

        $roots = array_values(array_filter([
            storage_path('app'),
            public_path('photos'),
            public_path('storage'),
        ], 'is_dir'));

        $map = [];

        foreach ($roots as $root) {
            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($root, \FilesystemIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($iterator as $file) {
                if (! $file->isFile()) {
                    continue;
                }

                $key = mb_strtolower($file->getFilename());

                // First match wins (roots are ordered by priority).
                if (! isset($map[$key])) {
                    $map[$key] = $file->getPathname();
                }
            }
        }

        return self::$index = $map;
    }
}
