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

    public static function store(\Illuminate\Http\UploadedFile $file): string
    {
        $filename = time().'_'.preg_replace('/[^A-Za-z0-9._-]/', '_', $file->getClientOriginalName());

        $storageDir = storage_path('app/public/photos');
        if (! is_dir($storageDir)) {
            mkdir($storageDir, 0755, true);
        }

        $file->move($storageDir, $filename);

        self::$index = null;

        return 'photos/'.$filename;
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
