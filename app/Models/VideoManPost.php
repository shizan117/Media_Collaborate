<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoManPost extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content', 'photos','edited_photos', 'videos','edited_videos', 'link', 'status'];

    protected $casts = [
        'photos' => 'array',
        'videos' => 'array',
        'edited_photos' => 'array',
        'edited_videos' => 'array',
    ];
}
