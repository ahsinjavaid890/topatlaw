<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cms extends Model
{
    use HasFactory;

    protected $fillable = [
        'pagename',
        'tittle_english',
        'tittle_arabic',
        'description_english',
        'description_arabic',
        'image_english',
        'image_arabic',
        'video_english',
        'video_arabic',
    ];
}
