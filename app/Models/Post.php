<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'author',
        'status',
        'published_at',
        'user_id',
        'category_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}