<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleContentLink extends Model
{
    protected $fillable = [
        'article_content_id',
        'name',
        'url',
    ];

    public function content(): BelongsTo
    {
        return $this->belongsTo(ArticleContent::class);
    }
}
