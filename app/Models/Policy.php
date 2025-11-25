<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
        'type',
        'title',
        'slug',
        'content',
    ];

    /**
     * Get policy by type
     */
    public static function getByType($type)
    {
        return self::where('type', $type)->first();
    }

    /**
     * Get privacy policy
     */
    public static function privacyPolicy()
    {
        return self::getByType('privacy_policy');
    }

    /**
     * Get terms of service
     */
    public static function termsOfService()
    {
        return self::getByType('terms_of_service');
    }
}
