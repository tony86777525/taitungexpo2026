<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    protected $fillable = [
        'project_id',
        // 活動標題（中）
        'title_tw',
        // 活動標題（英）
        'title_en',
        // 活動日期
        'activity_start_date',
        'activity_end_date',
        // 活動時間
        'activity_start_time',
        'activity_end_time',
        // 活動地點（中）
        'activity_location_tw',
        // 活動地點（英）
        'activity_location_en',
        // 地圖連結
        'map_link',
        // 報名資訊（中）
        'registration_info_tw',
        // 報名資訊（英）
        'registration_info_en',
        // 導覽預約資訊（中）
        'tour_info_tw',
        // 導覽預約資訊（英）
        'tour_info_en',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the project for the activity.
     * 計畫
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the activity natures for the activity.
     * 活動性質
     *
     * @return BelongsToMany
     */
    public function activityNatures(): BelongsToMany
    {
        return $this->belongsToMany(ActivityNature::class, 'activity_activity_nature');
    }

    /**
     * Get the project types for the activity.
     * 計畫類型
     *
     * @return BelongsToMany
     */
    public function projectTypes(): BelongsToMany
    {
        return $this->belongsToMany(ProjectType::class, 'activity_project_type');
    }

    /**
     * Get the images for the activity.
     * 活動相簿
     *
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ActivityImage::class);
    }

    /**
     * Get the contents for the activity.
     * 活動內容
     *
     * @return HasMany
     */
    public function contents(): HasMany
    {
        return $this->hasMany(ActivityContent::class);
    }

    /**
     * Get the images for the activity.
     * 活動相簿
     *
     * @return HasMany
     */
    public function activitySessions(): HasMany
    {
        return $this->hasMany(ActivitySession::class);
    }

    /**
     * 活動期間-日期
     *
     * @return string
     */
    public function getDisplayDateRangeAttribute(): string
    {
        $startDate = Carbon::create($this->activity_start_date)->translatedFormat('n/j D');
        $endDate = Carbon::create($this->activity_end_date)->translatedFormat('n/j D');

        return "{$startDate} ~ {$endDate}";
    }

    /**
     * 活動期間-每日開放時間
     *
     * @return string
     */
    public function getDisplayTimeRangeAttribute(): string
    {
        $startTime = Carbon::create($this->activity_start_time)->translatedFormat('H:i');
        $endTime = Carbon::create($this->activity_end_time)->translatedFormat('H:i');

        return "{$startTime} ~ {$endTime}";
    }
}
