<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PrivateSectorProjectContent extends Model
{
    protected $fillable = [
        'private_sector_project_id',
        // 標題（中）
        'title_tw',
        // 標題（英）
        'title_en',
        // 項目文字（中）
        'item_text_en',
        // 項目文字（英）
        'item_text_tw',
        // 內文（中）
        'content_tw',
        // 內文（英）
        'content_en',
    ];

    /**
     * Get the private sector project for the private sector project content.
     * 最新消息
     *
     * @return BelongsTo
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * Get the images for the private sector project content.
     * 輪播圖片
     *
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(PrivateSectorProjectContentImage::class);
    }

    /**
     * Get the links for the private sector project content.
     * 連結按鈕
     *
     * @return HasMany
     */
    public function links(): HasMany
    {
        return $this->hasMany(PrivateSectorProjectContentLink::class);
    }
}
