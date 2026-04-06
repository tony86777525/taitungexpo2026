<?php

namespace App\Models;

use App\Enums\Language;
use App\Enums\MediaType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class HomeBanner extends Model
{
    protected $fillable = [
        // 類型 (1:圖片, 2:影片)
        'media_type',
        // 圖片/影片連結
        'media_url',
        // 文字（中）
        'name_tw',
        // 文字（英）
        'name_en',
        // 連結
        'link',
        // 啟用狀態
        'is_active',
        // 排序順序
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'media_type' => MediaType::class,
    ];


    /**
     * @return string|null
     */
    public function getDisplayMediaTypeAttribute(): ?string
    {
        return $this->media_type->getLabel();
    }

    /**
     * @return string|null
     */
    public function getDisplayAllNameAttribute(): ?string
    {
        return "{$this->name_tw} / {$this->name_en}";
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
    public function getDisplayMediaUrlAttribute(): string
    {
        return asset('storage/' . $this->media_url);
    }

    /**
     * @return string
     */
    public function getDisplayLinkAttribute(): string
    {
        return $this->url ?: '';
    }
}
