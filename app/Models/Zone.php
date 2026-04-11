<?php

namespace App\Models;

use App\Enums\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Zone extends Model
{
    protected $fillable = [
        // 展區代碼
        'code',
        // 展區（中）
        'name_tw',
        // 展區（英）
        'name_en',
        // 活動限定使用
        'is_only_activity',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_only_activity' => 'boolean',
    ];

    /**
     * Get the projects for the zone.
     * 計畫
     *
     * @return HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
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
     * @return string|null
     */
    public function getDisplayCodeNameAttribute(): ?string
    {
        return "{$this->code}{$this->display_name}";
    }

    /**
     * @return string
     */
    public function getDisplayHtmlTagAttribute(): string
    {
        return "zone-{$this->id}";
    }

    /**
     * @return string
     */
    public function getDisplayMapImageAttribute(): string
    {
        $lower = strtolower($this->code);

        return asset("images/index/exhMap/exhMap_{$lower}.png");
    }
}
