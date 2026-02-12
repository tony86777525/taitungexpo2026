<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Enums\ProjectType;

// 民間參與計畫
class Project extends Model
{
    protected $fillable = [
        'zone_id',
        // 計畫類型
        'type',
        // LOGO
        'logo_url',
        // 計畫編號
        'project_number',
        // 計畫名稱（中）
        'project_name_tw',
        // 計畫名稱（英）
        'project_name_en',
        // 計畫開始日期
        'project_start_date',
        // 計畫結束日期
        'project_end_date',
        // 計畫開始時間
        'project_start_time',
        // 計畫結束時間
        'project_end_time',
        // 地點（中）
        'project_location_tw',
        // 地點（英）
        'project_location_en',
        // 地圖連結
        'map_link',
        // 縮略圖
        'thumbnail_url',
        // 執行單位
        'executing_unit_id',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'type' => ProjectType::class,
    ];

    /**
     * Get the zone for the project.
     * 展區
     *
     * @return BelongsTo
     */
    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }

    /**
     * Get the executing unit for the project.
     * 執行單位
     *
     * @return BelongsTo
     */
    public function executingUnit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'executing_unit_id');
    }

    /**
     * Get the featured images for the project.
     * 主視覺
     *
     * @return HasMany
     */
    public function featuredImages(): HasMany
    {
        return $this->hasMany(ProjectFeaturedImage::class);
    }

    /**
     * Get the activity for the project.
     * 活動
     *
     * @return HasOne
     */
    public function activity(): HasOne
    {
        return $this->hasOne(Activity::class);
    }

    /**
     * Get the project categories for the project.
     * 計畫分類
     *
     * @return BelongsToMany
     */
    public function projectCategories(): BelongsToMany
    {
        return $this->belongsToMany(ProjectCategory::class, 'p_project_category');
    }

    /**
     * Get the project natures for the project.
     * 計畫性質
     *
     * @return BelongsToMany
     */
    public function projectNatures(): BelongsToMany
    {
        return $this->belongsToMany(ProjectNature::class, 'p_project_nature');
    }

    /**
     * Get the curation natures for the project.
     * 策展議題
     *
     * @return BelongsToMany
     */
    public function curationNatures(): BelongsToMany
    {
        return $this->belongsToMany(CurationNature::class, 'p_curation_nature');
    }

    /**
     * Get the units for the project.
     * 單位
     *
     * @return BelongsToMany
     */
    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'p_unit');
    }

    /**
     * Get the images for the project.
     * 計畫相簿
     *
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }

    /**
     * Get the contents for the project.
     * 計畫內容
     *
     * @return HasMany
     */
    public function contents(): HasMany
    {
        return $this->hasMany(ProjectContent::class);
    }

    /**
     * 計畫展場編號
     *
     * @return string
     */
    public function getVenueNumberAttribute(): string
    {
        return "{$this->zone->code}{$this->project_number}{$this->project_name_tw}";
    }

    /**
     * 計畫展場編號
     *
     * @return string
     */
    public function getTypeNameAttribute(): string
    {
        return $this->type?->label() ?? '';
    }

    /**
     * 計畫名稱
     *
     * @return string
     */
    public function getDisplayNameAttribute(): string
    {
        return "{$this->type_name} - {$this->venue_number}";
    }

    /**
     * 活動期間-日期
     *
     * @return string
     */
    public function getDisplayDateRangeAttribute(): string
    {
        $startDate = Carbon::create($this->project_start_date)->translatedFormat('n/j D');
        $endDate = Carbon::create($this->project_end_date)->translatedFormat('n/j D');

        return "{$startDate} ~ {$endDate}";
    }

    /**
     * 活動期間-每日開放時間
     *
     * @return string
     */
    public function getDisplayTimeRangeAttribute(): string
    {
        $startTime = Carbon::create($this->project_start_time)->translatedFormat('H:i');
        $endTime = Carbon::create($this->project_end_time)->translatedFormat('H:i');

        return "{$startTime} ~ {$endTime}";
    }
}
