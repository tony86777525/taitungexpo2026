<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

// 民間參與計畫
class PrivateSectorProject extends Model
{
    protected $fillable = [
        // 執行單位（中）
        'project_name_zh_TW',
        // 執行單位（英）
        'project_name_en',
        // 執行日期
        'project_date',
        // 地點（中）
        'project_location_zh_TW',
        // 地點（英）
        'project_location_en',
        // 地圖連結
        'map_link',
        // 主視覺
        'featured_image_url',
        // 縮略圖
        'thumbnail_url',
        // 執行單位
        'executing_unit_id',
        'is_active',
    ];

    protected $casts = [
        'project_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function executingUnit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'executing_unit_id');
    }

    public function projectNatures(): BelongsToMany
    {
        return $this->belongsToMany(ProjectNature::class, 'psp_project_nature');
    }

    public function participatingUnits(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'psp_unit')
            ->withPivot('type')
            ->wherePivot('type', 'participating');
    }

    public function curationNatures(): BelongsToMany
    {
        return $this->belongsToMany(CurationNature::class, 'psp_curation_nature');
    }

    /**
     * Get the images for the article.
     */
    public function images(): HasMany
    {
        return $this->hasMany(PrivateSectorProjectImage::class);
    }

    /**
     * Get the images for the article.
     */
    public function contents(): HasMany
    {
        return $this->hasMany(PrivateSectorProjectContent::class);
    }
}
