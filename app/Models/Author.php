<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'email',
        'role',
        'bio',
        'avatar',
        'cover_image',
        'specialty',
        'location',
        'website',
        'twitter',
        'github',
        'linkedin',
        'followers_count',
        'following_count',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    /**
     * An author has many authored articles.
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
