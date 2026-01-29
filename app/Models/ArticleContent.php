<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArticleContent extends Model
{
    protected $fillable = [
        'article_id',
        'title',
        'content',
    ];

    /**
     * Get the images for the article content.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ArticleContentImage::class);
    }

    /**
     * Get the links for the article content.
     */
    public function links(): HasMany
    {
        return $this->hasMany(ArticleContentLink::class);
    }
}
