<?php

namespace App\Support;

class Photo
{
    public static function url(?string $path): ?string
    {
        $name = self::filename($path);

        if (! $name) {
            return null;
        }

        self::publishOne($name);

        return asset('photos/'.$name);
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
        $dir = public_path('photos');

        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $file->move($dir, $filename);

        $storageDir = storage_path('app/public/photos');
        if (! is_dir($storageDir)) {
            mkdir($storageDir, 0755, true);
        }
        @copy($dir.DIRECTORY_SEPARATOR.$filename, $storageDir.DIRECTORY_SEPARATOR.$filename);

        return 'photos/'.$filename;
    }

    public static function publish(): int
    {
        $from = storage_path('app/public/photos');
        $count = 0;

        if (is_dir($from)) {
            foreach (glob($from.DIRECTORY_SEPARATOR.'*') ?: [] as $file) {
                if (is_file($file) && self::publishOne(basename($file), $file)) {
                    $count++;
                }
            }
        }

        return $count;
    }

    public static function fullPath(?string $path): ?string
    {
        $name = self::filename($path);

        if (! $name || str_contains($name, '..')) {
            return null;
        }

        foreach ([
            public_path('photos/'.$name),
            storage_path('app/public/photos/'.$name),
            storage_path('app/public/public/photos/'.$name),
            public_path('storage/photos/'.$name),
            storage_path('photos/'.$name),
        ] as $file) {
            if (is_file($file)) {
                return $file;
            }
        }

        return null;
    }

    private static function publishOne(string $name, ?string $source = null): bool
    {
        $destDir = public_path('photos');
        $dest = $destDir.DIRECTORY_SEPARATOR.$name;

        if (is_file($dest)) {
            return true;
        }

        $source = $source ?: self::fullPath($name);

        if (! $source || ! is_file($source)) {
            return false;
        }

        if (! is_dir($destDir)) {
            mkdir($destDir, 0755, true);
        }

        return @copy($source, $dest);
    }
}
