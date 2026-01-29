<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleContentImage extends Model
{
    protected $fillable = [
        'article_content_id',
        'url',
        'alt_text',
        'sort_order'
    ];

    public function content(): BelongsTo
    {
        return $this->belongsTo(ArticleContent::class);
    }
}
