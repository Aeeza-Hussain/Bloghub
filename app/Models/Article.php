<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'author_name',
        'author_role',
        'author_avatar',
        'reading_time',
        'views',
        'likes',
        'is_featured',
        'is_trending',
        'tags',
        'published_at',
    ];

    protected $casts = [
        'is_featured'  => 'boolean',
        'is_trending'  => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * An article belongs to a category.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * An article belongs to an author.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * An article has many comments.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }
}
