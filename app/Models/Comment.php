<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'article_id',
        'author_name',
        'author_email',
        'author_avatar',
        'content',
    ];

    /**
     * A comment belongs to an article.
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
