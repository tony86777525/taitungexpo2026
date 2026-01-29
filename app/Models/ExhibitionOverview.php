<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// 展覽概覽
class ExhibitionOverview extends Model
{
    protected $fillable = [
        // LOGO
        'logo_url',
        // 場館
        'venue_id',
        // 計畫名稱（中）
        'project_name_zh_TW',
        // 計畫名稱（英）
        'project_name_en',
        // 執行日期
        'project_date',
        // 執行時間
        'project_time',
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
        'is_active',
    ];

    protected $casts = [
        'project_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    public function projectNatures(): BelongsToMany
    {
        return $this->belongsToMany(ProjectNature::class, 'eo_project_nature');
    }

    public function participatingUnits(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'eo_unit')
            ->withPivot('type')
            ->wherePivot('type', 'participating');
    }

    public function curationNatures(): BelongsToMany
    {
        return $this->belongsToMany(CurationNature::class, 'eo_curation_nature');
    }
}
