<?php

namespace App\Models;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivityReservationType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ActivitySession extends Model
{
    protected $fillable = [
        // 活動
        'activity_id',
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
     * Get the activity reservations for the activity session.
     * 活動內容
     *
     * @return HasMany
     */
    public function activityReservations(): HasMany
    {
        return $this->hasMany(ActivityReservation::class);
    }

    /**
     * Get the activity reservations for the activity session.
     * 活動內容
     *
     * @return HasMany
     */
    public function bookedActivityReservations(): HasMany
    {
        return $this->activityReservations()
            ->where('status', ActivityReservationStatus::CONFIRMED->value);
    }

    /**
     * 場次日期
     *
     * @return string
     */
    public function getDisplayDateAttribute(): string
    {
        $date = Carbon::create($this->date)->translatedFormat('n/j D');

        return "{$date}";
    }

    /**
     * 場次時段
     *
     * @return string
     */
    public function getDisplayTimeRangeAttribute(): string
    {
        $startTime = Carbon::create($this->start_time)->translatedFormat('H:i');
        $endTime = Carbon::create($this->end_time)->translatedFormat('H:i');

        return "{$startTime} ~ {$endTime}";
    }

    /**
     * 場次資訊
     *
     * @return string
     */
    public function getDisplayInfoAttribute(): string
    {
        return "{$this->display_date} {$this->display_time_range}";
    }

    /**
     * 可預約普通團數
     *
     * @return integer
     */
    public function getNormalGroupCountAttribute(): int
    {
        return $this->group_max - $this->group_vip;
    }

    /**
     * 是否可以預約普通團
     *
     * @param integer $currentGroupCount
     * @return boolean
     */
    public function canBookNormalGroup(int $currentGroupCount): bool
    {
        return ($this->group_max - $this->group_vip) > $currentGroupCount;
    }

    /**
     * 可預約VIP團數
     *
     * @return integer
     */
    public function getVipGroupCountAttribute(): int
    {
        return $this->group_vip;
    }

    /**
     * 是否可以預約普通團
     *
     * @param integer $currentGroupCount
     * @return boolean
     */
    public function canBookVipGroup(int $currentGroupCount): bool
    {
        return ($this->group_vip) > $currentGroupCount;
    }

    public function getBookedStatusColorAttribute()
    {
        if ($this->relationLoaded('activityReservations') === false) {
            return null;
        }

        $bookedCount = $this->activityReservations->count();

        if ($this->group_max === 0) {
            return 'gray';
        }

        $percentNumber = number_format($bookedCount /  $this->group_max) * 100;

        if ($percentNumber >= 100) {
            return 'red';
        }

        if ($percentNumber >= 50) {
            return 'yellow';
        }

        if ($percentNumber >= 0) {
            return 'green';
        }
    }
}
