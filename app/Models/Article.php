<?php

namespace App\Models;

use App\Enums\Language;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

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
        // 最新消息卡片導向連結
        'url',
        // 啟用狀態
        'is_active',
        // 排序順序
        'sort_order',
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

    /**
     * @return string
     */
    public function getDisplayTitleAttribute(): string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->title_en)) {
            return $this->title_en;
        }

        return $this->title_tw;
    }

    /**
     * @return string
     */
    public function getDisplayPublishedAtAttribute(): string
    {
        return Carbon::parse($this->published_at)->format('Y.m.d');
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
        return $this->url ?: route('user.news.detail', ['id' => $this->id]);
    }

    /**
     * @return string|null
     */
    public function getDisplayTagNameAttribute(): string|null
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
