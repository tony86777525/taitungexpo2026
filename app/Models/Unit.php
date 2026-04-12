<?php

namespace App\Models;

use App\Enums\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// 單位
class Unit extends Model
{
    protected $fillable = [
        // 單位文字（中）
        'name_tw',
        // 單位文字（英）
        'name_en',
        // 單位圖檔
        'image_url',
        // 單位連結
        'link',
        // 啟用狀態
        'is_active',
        // 排序順序
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the project for the unit.
     * 民間參與計畫
     *
     * @return BelongsToMany
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'p_unit');
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
    public function getDisplayImageAttribute(): string
    {
        return asset('storage/' . $this->image_url);
    }
}
