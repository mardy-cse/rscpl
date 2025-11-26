<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add indexes to services table
        Schema::table('services', function (Blueprint $table) {
            $table->index('is_active');
            $table->index('order');
            $table->index(['is_active', 'order']);
        });

        // Add indexes to projects table
        Schema::table('projects', function (Blueprint $table) {
            $table->index('is_featured');
            $table->index('location');
            $table->index('order');
            $table->index(['is_featured', 'order']);
            $table->index(['location', 'order']);
        });

        // Add indexes to testimonials table
        Schema::table('testimonials', function (Blueprint $table) {
            $table->index('is_active');
            $table->index('order');
            $table->index(['is_active', 'order']);
        });

        // Add indexes to contacts table
        Schema::table('contacts', function (Blueprint $table) {
            $table->index('email');
            $table->index('created_at');
        });

        // Add indexes to users table
        Schema::table('users', function (Blueprint $table) {
            $table->index('role');
        });

        // Add indexes to settings table
        Schema::table('settings', function (Blueprint $table) {
            $table->index('key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove indexes from services table
        Schema::table('services', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
            $table->dropIndex(['order']);
            $table->dropIndex(['is_active', 'order']);
        });

        // Remove indexes from projects table
        Schema::table('projects', function (Blueprint $table) {
            $table->dropIndex(['is_featured']);
            $table->dropIndex(['location']);
            $table->dropIndex(['order']);
            $table->dropIndex(['is_featured', 'order']);
            $table->dropIndex(['location', 'order']);
        });

        // Remove indexes from testimonials table
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
            $table->dropIndex(['order']);
            $table->dropIndex(['is_active', 'order']);
        });

        // Remove indexes from contacts table
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropIndex(['email']);
            $table->dropIndex(['created_at']);
        });

        // Remove indexes from users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role']);
        });

        // Remove indexes from settings table
        Schema::table('settings', function (Blueprint $table) {
            $table->dropIndex(['key']);
        });
    }
};
