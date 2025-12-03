<?php

if (! function_exists('setting')) {
    /**
     * Get a setting value from cache
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, $default = null)
    {
        return app(\App\Services\SettingService::class)->get($key, $default);
    }
}

if (! function_exists('imageUrl')) {
    /**
     * Get image URL that works in both local and live environments
     *
     * @param string $path Relative path to image (e.g., 'uploads/services/image.jpg')
     * @return string Full URL to the image or empty string if not found
     */
    function imageUrl($path)
    {
        return \App\Helpers\ImageHelper::getImageUrl($path);
    }
}

if (! function_exists('imageExists')) {
    /**
     * Check if an image exists
     *
     * @param string $path Relative path to image (e.g., 'uploads/services/image.jpg')
     * @return bool
     */
    function imageExists($path)
    {
        return \App\Helpers\ImageHelper::imageExists($path);
    }
}
