<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use App\Helpers\ImageHelper;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Log;

class ImageService
{
    // Maximum width for uploaded images
    private const MAX_WIDTH = 1920;
    
    // WebP quality (0-100, 80 is optimal for size vs quality)
    private const WEBP_QUALITY = 80;

    /**
     * Upload an image file with automatic WebP conversion and resizing
     * 
     * @param UploadedFile $file The uploaded file
     * @param string $directory Subdirectory to store in (services, projects, testimonials, about)
     * @return string|null Relative path to the uploaded file or null on failure
     */
    public function uploadImage(UploadedFile $file, $directory = 'uploads')
    {
        try {
            // Normalize directory name
            $subdirectory = str_replace('uploads/', '', $directory);
            
            // Generate unique filename with timestamp (WebP extension)
            $filename = uniqid() . '_' . time() . '.webp';
            
            // Use Laravel's public_path() for cross-platform compatibility
            $uploadDir = public_path('uploads/' . $subdirectory);
            
            // Check if upload directory exists, if not create it with proper permissions
            if (!is_dir($uploadDir)) {
                if (!mkdir($uploadDir, 0755, true)) {
                    Log::error("Failed to create upload directory: {$uploadDir}");
                    return null;
                }
            }
            
            // Ensure directory is writable
            if (!is_writable($uploadDir)) {
                Log::error("Upload directory is not writable: {$uploadDir}");
                return null;
            }
            
            // Load image using Intervention Image
            $image = Image::read($file->getRealPath());
            
            // Get original dimensions
            $originalWidth = $image->width();
            $originalHeight = $image->height();
            
            // Resize if width exceeds maximum
            if ($originalWidth > self::MAX_WIDTH) {
                $newHeight = (int) (($originalHeight / $originalWidth) * self::MAX_WIDTH);
                $image->resize(self::MAX_WIDTH, $newHeight);
                
                Log::info("Image resized from {$originalWidth}x{$originalHeight} to " . self::MAX_WIDTH . "x{$newHeight}");
            }
            
            // Convert to WebP and save with compression
            $outputPath = $uploadDir . '/' . $filename;
            $image->toWebp(self::WEBP_QUALITY)->save($outputPath);
            
            // Log success
            $originalSize = $file->getSize();
            $newSize = filesize($outputPath);
            $savedPercentage = round((($originalSize - $newSize) / $originalSize) * 100, 1);
            
            Log::info("Image converted to WebP. Original: " . round($originalSize/1024, 2) . "KB, WebP: " . round($newSize/1024, 2) . "KB (Saved {$savedPercentage}%)");
            
            // Return relative path for database storage (works on any domain)
            $relativePath = 'uploads/' . $subdirectory . '/' . $filename;
            return $relativePath;
            
        } catch (\Exception $e) {
            Log::error('Image upload failed: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Delete an image file
     * 
     * @param string $path Relative path to image
     * @return bool True if deleted successfully
     */
    public function deleteImage($path)
    {
        return ImageHelper::deleteImage($path);
    }

    /**
     * Get image URL for use in views
     * 
     * @param string $path Relative path to image
     * @return string Full URL to image or empty string
     */
    public function getImageUrl($path)
    {
        return ImageHelper::getImageUrl($path);
    }

    /**
     * Replace an image (delete old, upload new)
     * 
     * @param UploadedFile $file New image file
     * @param string $oldPath Old image path
     * @param string $directory Directory to store in
     * @return string|null New image path or null on failure
     */
    public function replaceImage(UploadedFile $file, $oldPath, $directory = 'uploads')
    {
        if ($oldPath) {
            $this->deleteImage($oldPath);
        }
        return $this->uploadImage($file, $directory);
    }

    /**
     * Validate image file
     * 
     * @param UploadedFile $file
     * @return array Validation errors or empty array if valid
     */
    public function validateImage(UploadedFile $file)
    {
        $errors = [];
        $maxSize = 5 * 1024 * 1024; // 5MB

        if ($file->getSize() > $maxSize) {
            $errors[] = 'Image size must not exceed 5MB';
        }

        $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($file->getMimeType(), $allowedMimes)) {
            $errors[] = 'Only JPG, PNG, GIF, and WebP images are allowed';
        }

        return $errors;
    }
}
