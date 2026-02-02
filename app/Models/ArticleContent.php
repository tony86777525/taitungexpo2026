<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArticleContent extends Model
{
    protected $fillable = [
        'article_id',
        // 標題（中）
        'title_zh_TW',
        // 標題（英）
        'title_en',
        // 項目文字（中）
        'item_text_en',
        // 項目文字（英）
        'item_text_zh_TW',
        // 內文（中）
        'content_zh_TW',
        // 內文（英）
        'content_en',
    ];

    /**
     * Get the article for the article content.
     * 最新消息
     *
     * @return BelongsTo
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * Get the images for the article content.
     * 輪播圖片
     *
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ArticleContentImage::class);
    }

    /**
     * Get the links for the article content.
     * 連結按鈕
     *
     * @return HasMany
     */
    public function links(): HasMany
    {
        return $this->hasMany(ArticleContentLink::class);
    }
}
