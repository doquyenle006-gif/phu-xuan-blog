<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

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

    /**
     * TỰ ĐỘNG TẠO SLUG KHI TẠO POST
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }

    /**
     * Quan hệ: Post có nhiều comment
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Chỉ lấy comment đã duyệt
     */
    public function approvedComments(): HasMany
    {
        return $this->hasMany(Comment::class)
                    ->where('is_approved', true);
    }

    /**
     * MANY-TO-MANY: Post ↔ Tag
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}