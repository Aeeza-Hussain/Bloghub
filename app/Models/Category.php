<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
        'color',
    ];

    /**
     * An category has many articles.
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
