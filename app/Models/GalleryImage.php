<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'image',
        'title',
        'category',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];
}
