<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    protected $fillable = [
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
     * Get the private sector project for the activity.
     * 民間參與計畫
     *
     * @return BelongsTo
     */
    public function privateSectorProject(): BelongsTo
    {
        return $this->belongsTo(PrivateSectorProject::class);
    }

    /**
     * Get the exhibition overview for the activity.
     * 展覽概覽
     *
     * @return BelongsTo
     */
    public function exhibitionOverview(): BelongsTo
    {
        return $this->belongsTo(ExhibitionOverview::class);
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

    public function getCurrentProjectAttribute()
    {
        return $this->privateSectorProject ?? $this->exhibitionOverview;
    }

    // 2. 為了保險，顯式定義它為字串，阻止 Carbon 介入
    public function setActivityDateAttribute($value)
    {
        // 如果是陣列（來自 dehydrate），就轉 json
        // 如果是字串，直接存
        $this->attributes['activity_date'] = is_array($value) ? json_encode($value) : $value;
    }
}
