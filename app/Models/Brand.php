<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    protected $fillable = [
        // 品牌名稱（中）
        'name_tw',
        // 品牌名稱（英）
        'name_en',
        // 品牌連結
        'url',
        // 品牌介紹（中）
        'description_tw',
        // 品牌介紹（英）
        'description_en',
        // 縮略圖
        'thumbnail_url',
        // 啟用狀態
        'is_active',
        // 排序順序
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the contents for the brand.
     * 商品介紹
     *
     * @return HasMany
     */
    public function contents(): HasMany
    {
        return $this->hasMany(BrandContent::class);
    }

    /**
     * Get the links for the brand.
     * 連結按鈕
     *
     * @return HasMany
     */
    public function links(): HasMany
    {
        return $this->hasMany(BrandLink::class);
    }

    /**
     * Get the images for the brand.
     * 品牌相簿
     *
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(BrandImage::class);
    }

    /**
     * Get the tags for the article.
     * 品牌分類
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(BrandTag::class, 'brand_tag_relations');
    }
}
