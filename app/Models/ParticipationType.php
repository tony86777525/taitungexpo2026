<?php

namespace App\Models;

use App\Enums\Language;
use Illuminate\Database\Eloquent\Model;

class ParticipationType extends Model
{
    protected $fillable = [
        // 報名資訊（中）
        'name_tw',
        // 報名資訊（英）
        'name_en',
        // 報名連結文字（中）
        'link_name_tw',
        // 報名連結文字（英）
        'link_name_en',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * @return string|null
     */
    public function getDisplayAllNameAttribute(): ?string
    {
        return "{$this->name_tw} / {$this->name_en} | {$this->link_name_tw} / {$this->link_name_en}";
    }

    /**
     * @return string|null
     */
    public function getDisplayNameAttribute(): ?string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->name_en)) {
            return "{$this->name_en}";
        }

        return "{$this->name_tw}";
    }

    /**
     * @return string|null
     */
    public function getDisplayLinkNameAttribute(): ?string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->link_name_en)) {
            return "{$this->link_name_en}";
        }

        return "{$this->link_name_tw}";
    }
}
