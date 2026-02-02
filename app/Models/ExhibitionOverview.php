<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

// 展覽概覽
class ExhibitionOverview extends Model
{
    protected $fillable = [
        // LOGO
        'logo_url',
        // 計畫名稱（中）
        'project_name_zh_TW',
        // 計畫名稱（英）
        'project_name_en',
        // 活動日期
        'project_start_date',
        'project_end_date',
        // 活動時間
        'project_start_time',
        'project_end_time',
        // 計畫地點（中）
        'project_location_zh_TW',
        // 計畫地點（英）
        'project_location_en',
        // 地圖連結
        'map_link',
        // 主視覺
        'featured_image_url',
        // 縮略圖
        'thumbnail_url',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'project_date' => 'date',
        'project_time' => 'datetime:H:i',
        'is_active' => 'boolean',
    ];

    /**
     * Get the venue for the exhibition overview.
     * 場館
     *
     * @return BelongsTo
     */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    /**
     * Get the project natures for the exhibition overview.
     * 計畫性質
     *
     * @return BelongsToMany
     */
    public function projectNatures(): BelongsToMany
    {
        return $this->belongsToMany(ProjectNature::class, 'eo_project_nature');
    }

    /**
     * Get the units for the exhibition overview.
     * 單位
     *
     * @return BelongsToMany
     */
    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'eo_unit');
    }

    /**
     * Get the images for the exhibition overview.
     * 計畫相簿
     *
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ExhibitionOverviewImage::class);
    }

    /**
     * Get the contents for the exhibition overview.
     * 計畫內容
     *
     * @return HasMany
     */
    public function contents(): HasMany
    {
        return $this->hasMany(ExhibitionOverviewContent::class);
    }

    /**
     * Get the curation natures for the exhibition overview.
     * 計畫性質
     *
     * @return BelongsToMany
     */
    public function curationNatures(): BelongsToMany
    {
        return $this->belongsToMany(CurationNature::class, 'eo_curation_nature');
    }
}
