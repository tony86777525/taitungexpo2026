<?php

namespace App\Models;

use App\Enums\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

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

    /**
     * @return string|null
     */
    public function getDisplayNameAttribute(): ?string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->name_en)) {
            return $this->name_en;
        }

        return $this->name_tw;
    }

    /**
     * @return string
     */
    public function getDisplayThumbnailAttribute(): string
    {
        return asset('storage/' . $this->thumbnail_url);
    }

    /**
     * @return string
     */
    public function getDisplayUrlAttribute(): string
    {
        return lang_route('user.brand.detail', ['id' => $this->id]);
    }

    /**
     * @return string|null
     */
    public function getDisplayDescriptionAttribute(): ?string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->description_en)) {
            return $this->description_en;
        }

        return $this->description_tw;
    }

    /**
     * @return string|null
     */
    public function getDisplayTagNameAttribute(): ?string
    {
        if ($this->relationLoaded('tags') === false) {
            return null;
        }

        if ($this->tags->isEmpty()) {
            return null;
        }

        $tag = $this->tags->first();

        return $tag->display_name ?: null;
    }

    /**
     * @return Collection|null
     */
    public function getLinks(): Collection|null
    {
        if ($this->relationLoaded('links') === false) {
            return null;
        }

        if ($this->links->isEmpty()) {
            return null;
        }

        return $this->links;
    }

    /**
     * @return Collection|null
     */
    public function getContents(): Collection|null
    {
        if ($this->relationLoaded('contents') === false) {
            return null;
        }

        if ($this->contents->isEmpty()) {
            return null;
        }

        return $this->contents;
    }

    /**
     * @return Collection|null
     */
    public function getImages(): Collection|null
    {
        if ($this->relationLoaded('images') === false) {
            return null;
        }

        if ($this->images->isEmpty()) {
            return null;
        }

        return $this->images;
    }
}
