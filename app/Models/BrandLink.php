<?php

namespace App\Models;

use App\Enums\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BrandLink extends Model
{
    protected $fillable = [
        'brand_id',
        // 連結按鈕（中）
        'name_tw',
        // 連結按鈕（英）
        'name_en',
        // 連結（中）
        'url_tw',
        // 連結（英）
        'url_en',
    ];

    /**
     * Get the brand for the brand.
     * 品牌
     *
     * @return BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return string
     */
    public function getDisplayNameAttribute(): string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->name_en)) {
            return $this->name_en;
        }

        return $this->name_tw;
    }

    /**
     * @return string
     */
    public function getDisplayUrlAttribute(): string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->url_en)) {
            return $this->url_en;
        }

        return $this->url_tw;
    }
}
