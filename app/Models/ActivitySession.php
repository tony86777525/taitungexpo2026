<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivitySession extends Model
{
    protected $fillable = [
        // 預約日期
        'date',
        // 預約開始時段
        'start_time',
        // 預約結束時段
        'end_time',
        // 建議人數下限
        'quota_min',
        // 建議人數上限
        'quota_max',
        // 預約組數上限
        'group_max',
        // 預約組數上限（vip）
        'group_vip',
        // 活動
        'activity_id',
        // 啟用狀態
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the activity for the activity session.
     * 活動
     *
     * @return BelongsTo
     */
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    /**
     * @return string
     */
    public function getDisplayTitleAttribute(): string
    {
        return "{$this->activity->title_zh_TW} ： {$this->date} - {$this->start_time} ~ {$this->end_time}";
    }
}
