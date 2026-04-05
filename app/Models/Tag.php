<?php

namespace App\Models;

use App\Enums\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
        // 消息分類（中）
        'name_tw',
        // 消息分類（英）
        'name_en',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the articles for the tag.
     * 最新消息
     *
     * @return BelongsToMany
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_tags');
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
        return $this->id == request()->query('tag');
    }
}
