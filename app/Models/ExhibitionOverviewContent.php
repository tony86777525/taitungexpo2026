<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExhibitionOverviewContent extends Model
{
    protected $fillable = [
        'exhibition_overview_id',
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
     * Get the exhibition overview for the exhibition overview content.
     * 最新消息
     *
     * @return BelongsTo
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * Get the images for the exhibition overview content.
     * 輪播圖片
     *
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(PrivateSectorProjectContentImage::class);
    }

    /**
     * Get the links for the exhibition overview content.
     * 連結按鈕
     *
     * @return HasMany
     */
    public function links(): HasMany
    {
        return $this->hasMany(PrivateSectorProjectContentLink::class);
    }
}
