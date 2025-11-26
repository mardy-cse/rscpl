<?php

namespace App\Http\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HandlesFileUploads
{
    /**
     * Handle file upload to storage.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @param string $disk
     * @return string The path to the uploaded file
     */
    protected function uploadFile(UploadedFile $file, string $directory, string $disk = 'public'): string
    {
        return $file->store($directory, $disk);
    }

    /**
     * Delete file from storage.
     *
     * @param string|null $path
     * @param string $disk
     * @return bool
     */
    protected function deleteFile(?string $path, string $disk = 'public'): bool
    {
        if (!$path) {
            return false;
        }

        return Storage::disk($disk)->delete($path);
    }

    /**
     * Check if file exists in storage.
     *
     * @param string $path
     * @param string $disk
     * @return bool
     */
    protected function fileExists(string $path, string $disk = 'public'): bool
    {
        return Storage::disk($disk)->exists($path);
    }

    /**
     * Replace an old file with a new one.
     *
     * @param \Illuminate\Http\UploadedFile $newFile
     * @param string|null $oldPath
     * @param string $directory
     * @param string $disk
     * @return string The path to the new file
     */
    protected function replaceFile(
        UploadedFile $newFile,
        ?string $oldPath,
        string $directory,
        string $disk = 'public'
    ): string {
        $newPath = $this->uploadFile($newFile, $directory, $disk);
        
        if ($oldPath) {
            $this->deleteFile($oldPath, $disk);
        }
        
        return $newPath;
    }
}
