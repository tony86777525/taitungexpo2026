<?php

namespace App\Models;

use App\Enums\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityContentLink extends Model
{
    protected $fillable = [
        'activity_content_id',
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
     * Get the content for the activity content link.
     * 內文
     *
     * @return BelongsTo
     */
    public function content(): BelongsTo
    {
        return $this->belongsTo(ActivityContent::class);
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
    public function getDisplayUrlAttribute(): ?string
    {
        if (app()->getLocale() === Language::EN->value && !empty($this->url_en)) {
            return $this->url_en;
        }

        return $this->url_tw;
    }
}
