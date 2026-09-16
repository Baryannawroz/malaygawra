<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $origin = $this->publicAssetOrigin();

        if (! $origin) {
            return;
        }

        config(['app.asset_url' => $origin]);

        $url = $this->app->make('url');

        if (method_exists($url, 'useAssetOrigin')) {
            $url->useAssetOrigin($origin);

            return;
        }

        $property = new \ReflectionProperty($url, 'assetRoot');
        $property->setAccessible(true);
        $property->setValue($url, $origin);
    }

    /**
     * When the domain document root is the Laravel project (public_html),
     * CSS/JS/images live under /public and asset() must prefix that path.
     * Local Herd already uses the public/ folder as the document root.
     */
    private function publicAssetOrigin(): ?string
    {
        if ($this->app->runningInConsole()) {
            return null;
        }

        if (config('app.asset_url')) {
            return rtrim((string) config('app.asset_url'), '/');
        }

        $docRoot = realpath($_SERVER['DOCUMENT_ROOT'] ?? '') ?: '';
        $public = realpath(public_path()) ?: '';

        if ($docRoot === '' || $public === '' || strcasecmp($docRoot, $public) === 0) {
            return null;
        }

        return rtrim((string) config('app.url'), '/').'/public';
    }
}
