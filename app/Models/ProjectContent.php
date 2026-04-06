<?php

namespace App\Models;

use App\Enums\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class ProjectContent extends Model
{
    protected $fillable = [
        'project_id',
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

    protected $casts = [
        'item_text_tw' => 'string',
        'item_text_en' => 'string',
    ];

    /**
     * Get the project for the project content.
     * 最新消息
     *
     * @return BelongsTo
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * Get the images for the project content.
     * 輪播圖片
     *
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProjectContentImage::class);
    }

    /**
     * Get the links for the project content.
     * 連結按鈕
     *
     * @return HasMany
     */
    public function links(): HasMany
    {
        return $this->hasMany(ProjectContentLink::class);
    }

    /**
     * @return string|null
     */
    public function getDisplayTitleAttribute(): ?string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->title_en)) {
            return $this->title_en;
        }

        return $this->title_tw;
    }

    /**
     * @return string|null
     */
    public function getDisplayItemTextAttribute(): ?string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->item_text_en)) {
            return $this->item_text_en;
        }

        return $this->item_text_tw;
    }

    /**
     * @return string|null
     */
    public function getDisplayContentAttribute(): ?string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->content_en)) {
            return $this->content_en;
        }

        return $this->content_tw;
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
}
