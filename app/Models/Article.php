<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $fillable = [
        'title',
        // 主視覺
        'featured_image_url',
        // 縮略圖
        'thumbnail_url',
        'published_at',
        'is_active',
    ];

    /**
     * Get the images for the article.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ArticleImage::class);
    }

    /**
     * Get the images for the article.
     */
    public function contents(): HasMany
    {
        return $this->hasMany(ArticleContent::class);
    }

    /**
     * Get the tags for the article.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }
}
