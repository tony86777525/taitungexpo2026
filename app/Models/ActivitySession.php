<?php

namespace App\Models;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivityReservationType;
use App\Enums\Language;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

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
        // 可預約總組數 (※一般＋ VIP 預約名額)
        'group_max',
        // 保留「VIP 預約」組數 (※建議每時段至少保留 1 組)
        'group_vip',
        // 開放「一般預約」組數 (※對外開放預約名額)
        'group_regular',
        // 團體導覽場館備註
        'tour_venue_note',
        // 單位/聯絡人
        'contact_name',
        // 聯絡電話
        'contact_phone',
        // 聯絡信箱
        'contact_email',
        // 啟用狀態
        'is_active',
        // 排序順序
        'sort_order',
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
     * 可預約普通團數
     *
     * @return integer
     */
    public function getNormalGroupCountAttribute(): int
    {
        return $this->group_regular;
    }

    /**
     * 是否可以預約普通團
     *
     * @param integer $currentGroupCount
     * @return boolean
     */
    public function canBookNormalGroup(int $currentGroupCount): bool
    {
        return ($this->group_regular) > $currentGroupCount;
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

        $percentNumber = number_format($bookedCount /  $this->group_max, 2) * 100;

        if ($percentNumber >= 100) {
            return '#ff6b6b';
        }

        if ($percentNumber >= 50) {
            return '#fafa24';
        }

        if ($percentNumber >= 0) {
            return '#52f152';
        }

        return null;
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

        return "{$startTime}-{$endTime}";
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
     * @return string|null
     */
    public function getDisplayActivityTitleAttribute(): ?string
    {
        if ($this->relationLoaded('activity') === false) {
            return null;
        }

        return $this->activity->display_title;
    }

    /**
     * @return string|null
     */
    public function getDisplayProjectNameAttribute(): ?string
    {
        if ($this->relationLoaded('activity') === false) {
            return null;
        }

        $activity = $this->activity;

        if ($activity->relationLoaded('project') === false) {
            return null;
        }

        return $activity->project->display_project_name;
    }

    /**
     * @return string|null
     */
    public function getDisplayActivityActivityLocationAttribute(): ?string
    {
        if ($this->relationLoaded('activity') === false) {
            return null;
        }

        return $this->activity->display_activity_location;
    }

    /**
     * @return Collection|null
     */
    public function getProjectNatures(): ?Collection
    {
        if ($this->relationLoaded('activity') === false) {
            return null;
        }

        $activity = $this->activity;

        if ($activity->relationLoaded('project') === false) {
            return null;
        }

        $project = $activity->project;

        if ($project->relationLoaded('projectNatures') === false) {
            return null;
        }

        return $project->projectNatures;
    }
}
