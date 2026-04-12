<?php

namespace App\Models;

use App\Enums\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectUnitType extends Model
{
    protected $fillable = [
        'project_id',
        // 單位類型（中）
        'name_tw',
        // 單位類型（英）
        'name_en',
        // 排序順序
        'sort_order',
    ];

    /**
     * Get the project for the project unit type.
     * 計畫
     *
     * @return BelongsTo
     */
    public function projects(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the unit for the project unit type.
     * 單位
     *
     * @return BelongsToMany
     */
    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'p_unit_type_unit');
    }

    /**
     * @return string|null
     */
    public function getDisplayAllNameAttribute(): ?string
    {
        return "＃{$this->name_tw} / ＃{$this->name_en}";
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
}
