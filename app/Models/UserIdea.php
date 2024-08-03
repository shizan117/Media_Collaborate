<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIdea extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'idea', 'photo', 'link', 'status'
    ];
}
