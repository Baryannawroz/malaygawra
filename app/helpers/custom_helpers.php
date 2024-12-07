<?php
if (!function_exists('custom_asset')) {
    function custom_asset($path, $secure = null)
    {

        if (app()->environment('production')) {
            // Modify the path for production
            $path = 'public/' . ltrim($path, '/');
        }

        // Call the original Laravel asset() function
        return asset($path, $secure);
    }
}
