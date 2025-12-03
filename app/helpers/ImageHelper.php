<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Get the image URL that works in both local and live environments
     * 
     * @param string $path Relative path to image (e.g., 'uploads/services/image.jpg')
     * @return string Full URL to the image or empty string if not found
     */
    public static function getImageUrl($path)
    {
        if (!$path) {
            return '';
        }

        // Remove leading slash if present
        $path = ltrim($path, '/');
        
        // Use Laravel's public_path() for cross-platform compatibility
        $absolutePath = public_path($path);
        
        // Check if file exists using absolute path
        if (file_exists($absolutePath)) {
            return asset($path);
        }

        // Return empty string if file doesn't exist
        return '';
    }

    /**
     * Get the full file path for storing images
     * 
     * @param string $subdirectory Subdirectory like 'services', 'projects', etc.
     * @return string Absolute path to store files
     */
    public static function getStoragePath($subdirectory = 'uploads')
    {
        return public_path('uploads/' . $subdirectory);
    }

    /**
     * Get the file system disk for image storage
     * 
     * @return string Disk name ('public' for both local and shared hosting)
     */
    public static function getStorageDisk()
    {
        return 'public';
    }

    /**
     * Delete an image file
     * 
     * @param string $path Relative path to image (e.g., 'uploads/services/image.jpg')
     * @return bool True if deleted successfully
     */
    public static function deleteImage($path)
    {
        if (!$path) {
            return false;
        }

        // Remove leading slash if present
        $path = ltrim($path, '/');
        
        // Use Laravel's public_path() for cross-platform compatibility
        $absolutePath = public_path($path);
        
        if (file_exists($absolutePath)) {
            return unlink($absolutePath);
        }

        return false;
    }

    /**
     * Check if image exists
     * 
     * @param string $path Relative path to image (e.g., 'uploads/services/image.jpg')
     * @return bool True if image exists
     */
    public static function imageExists($path)
    {
        if (!$path) {
            return false;
        }

        // Remove leading slash if present
        $path = ltrim($path, '/');
        
        // Use Laravel's public_path() for cross-platform compatibility
        $absolutePath = public_path($path);
        
        return file_exists($absolutePath);
    }

    /**
     * Get image dimensions
     * 
     * @param string $path Relative path to image (e.g., 'uploads/services/image.jpg')
     * @return array|false Array with 'width' and 'height' or false if not found
     */
    public static function getImageDimensions($path)
    {
        if (!$path) {
            return false;
        }

        // Remove leading slash if present
        $path = ltrim($path, '/');
        
        // Use Laravel's public_path() for cross-platform compatibility
        $absolutePath = public_path($path);

        if (!file_exists($absolutePath)) {
            return false;
        }

        $size = getimagesize($absolutePath);
        if ($size === false) {
            return false;
        }

        return [
            'width' => $size[0],
            'height' => $size[1],
        ];
    }
}
