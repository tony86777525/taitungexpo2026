<?php

namespace App\Models;

use App\Enums\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BrandTag extends Model
{
    protected $fillable = [
        // 品牌分類（中）
        'name_tw',
        // 品牌分類（英）
        'name_en',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the brands for the tag.
     * 品牌
     *
     * @return BelongsToMany
     */
    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'brand_tag_relations');
    }

    /**
     * @return string|null
     */
    public function getDisplayAllNameAttribute(): ?string
    {
        return "＃{$this->name_tw} / ＃{$this->name_en}";
    }

    public function getDisplayNameAttribute()
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->name_en)) {
            return $this->name_en;
        }

        return $this->name_tw;
    }

    public function getDisplayUrlAttribute()
    {
        return route('user.news.list', ['tag' => $this->id]);
    }

    /**
     * @return boolean
     */
    public function getIsCurrentTagAttribute(): bool
    {
        return $this->id == request()->query('brand_tag');
    }
}
