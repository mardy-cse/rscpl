<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsCondition extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    /**
     * Get the terms and conditions content
     */
    public static function getContent()
    {
        $terms = self::first();
        return $terms ? $terms->content : '';
    }

    /**
     * Update the terms and conditions content
     */
    public static function updateContent($content)
    {
        $terms = self::first();
        if ($terms) {
            $terms->update(['content' => $content]);
        } else {
            self::create(['content' => $content]);
        }
        return $terms;
    }
}
