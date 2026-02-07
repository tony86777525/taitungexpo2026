<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $fillable = [
        // 消息標題（中）
        'title_tw',
        // 消息標題（英）
        'title_en',
        // 日期
        'published_at',
        // 縮略圖
        'thumbnail_url',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Get the contents for the article.
     * 消息內容
     *
     * @return HasMany
     */
    public function contents(): HasMany
    {
        return $this->hasMany(ArticleContent::class);
    }

    /**
     * Get the images for the article.
     * 相簿
     *
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ArticleImage::class);
    }

    /**
     * Get the tags for the article.
     * 消息分類
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_tags');
    }
}
