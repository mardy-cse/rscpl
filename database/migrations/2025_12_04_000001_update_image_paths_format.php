<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migration.
     * 
     * This migration updates image paths to use the new relative format:
     * Old format: 'services/image.jpg' or 'storage/services/image.jpg'
     * New format: 'uploads/services/image.jpg'
     */
    public function up(): void
    {
        // Update services table
        DB::statement("
            UPDATE services 
            SET image = CASE
                WHEN image LIKE 'storage/%' THEN REPLACE(image, 'storage/', 'uploads/')
                WHEN image NOT LIKE 'uploads/%' AND image IS NOT NULL THEN CONCAT('uploads/', image)
                ELSE image
            END
            WHERE image IS NOT NULL
        ");

        // Update projects table
        DB::statement("
            UPDATE projects 
            SET image = CASE
                WHEN image LIKE 'storage/%' THEN REPLACE(image, 'storage/', 'uploads/')
                WHEN image NOT LIKE 'uploads/%' AND image IS NOT NULL THEN CONCAT('uploads/', image)
                ELSE image
            END
            WHERE image IS NOT NULL
        ");

        // Update testimonials table
        DB::statement("
            UPDATE testimonials 
            SET avatar = CASE
                WHEN avatar LIKE 'storage/%' THEN REPLACE(avatar, 'storage/', 'uploads/')
                WHEN avatar NOT LIKE 'uploads/%' AND avatar IS NOT NULL THEN CONCAT('uploads/', avatar)
                ELSE avatar
            END
            WHERE avatar IS NOT NULL
        ");

        // Update about_contents table
        DB::statement("
            UPDATE about_contents 
            SET image = CASE
                WHEN image LIKE 'storage/%' THEN REPLACE(image, 'storage/', 'uploads/')
                WHEN image NOT LIKE 'uploads/%' AND image IS NOT NULL THEN CONCAT('uploads/', image)
                ELSE image
            END
            WHERE image IS NOT NULL
        ");

        // Log migration completion
        \Log::info('Image paths migrated to new format (uploads/*)');
    }

    /**
     * Reverse the migration.
     */
    public function down(): void
    {
        // Remove 'uploads/' prefix to revert to old format
        DB::statement("
            UPDATE services 
            SET image = REPLACE(image, 'uploads/', '')
            WHERE image LIKE 'uploads/%'
        ");

        DB::statement("
            UPDATE projects 
            SET image = REPLACE(image, 'uploads/', '')
            WHERE image LIKE 'uploads/%'
        ");

        DB::statement("
            UPDATE testimonials 
            SET avatar = REPLACE(avatar, 'uploads/', '')
            WHERE avatar LIKE 'uploads/%'
        ");

        DB::statement("
            UPDATE about_contents 
            SET image = REPLACE(image, 'uploads/', '')
            WHERE image LIKE 'uploads/%'
        ");

        \Log::info('Image paths reverted to old format');
    }
};
