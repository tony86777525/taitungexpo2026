<?php

namespace App\Models;

use App\Enums\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectCategory extends Model
{
    protected $fillable = [
        // 計畫分類（中）
        'name_tw',
        // 計畫分類（英）
        'name_en',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the project for the project category.
     * 民間參與計畫
     *
     * @return BelongsToMany
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'p_project_category');
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
        return lang_route('user.participation.list', ['project_category' => $this->id]);
    }

    /**
     * @return boolean
     */
    public function getIsCurrentProjectCategoryAttribute(): bool
    {
        return $this->id == request()->query('project_category');
    }
}
