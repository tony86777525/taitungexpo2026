<?php

namespace App\Models;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivitySessionType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class ActivitySession extends Model
{
    protected $table = 'activity_sessions';

    protected $fillable = [
        // 計畫
        'project_id',
        // 場次類型 (1:普通, 2:vip)
        'type',
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
        // 可預約總組數
        'group_max',
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
        'type' => ActivitySessionType::class,
        'is_active' => 'boolean',
    ];

    /**
     * Get the project for the activity session.
     * 活動
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    /**
     * Get the activity reservations for the activity session.
     * 活動內容
     *
     * @return HasMany
     */
    public function activityReservations(): HasMany
    {
        return $this->hasMany(ActivityReservation::class, 'activity_session_id', 'id');
    }

    /**
     * Booked activity reservations
     * 已預約成功
     *
     * @return HasMany
     */
    public function bookedActivityReservations(): HasMany
    {
        return $this->activityReservations()
            ->where('status', ActivityReservationStatus::CONFIRMED->value);
    }

    // delect
    // normal_group_count -> group_count
    // canBookNormalGroup() -> canBookGroup()
    // vip_group_count -> group_count
    // canBookVipGroup() -> canBookGroup()

    /**
     * 已預約團數
     *
     * @return integer
     */
    public function getGroupBookedCountAttribute(): int
    {
        return $this->booked_activity_reservations_count ?? 0;
    }

    /**
     * 可預約團數上限
     *
     * @return integer
     */
    public function getGroupMaxCountAttribute(): int
    {
        return $this->group_max;
    }

    /**
     * 剩餘可預約團數
     *
     * @return integer
     */
    public function getGroupRemainingCountAttribute(): int
    {
        return $this->group_max_count - $this->group_booked_count;
    }

    /**
     * 是否可以預約
     *
     * @return boolean
     */
    public function getCanBookAttribute(): bool
    {
        return ($this->group_max) > $this->group_booked_count;
    }

    /**
     * 取得狀態文字顏色
     *
     * @return string|null
     */
    public function getBookedStatusColorAttribute(): ?string
    {
        if (is_null($this->booked_activity_reservations_count)) {
            return null;
        }

        $bookedCount = $this->booked_activity_reservations_count;

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
    public function getDisplayOptionTitleAttribute(): string
    {
        if ($this->relationLoaded('project') === false) {
            return '';
        }

        if ($this->group_remaining_count <= 0) {
            $groupCountNotice = "報名已額滿";

        } else {
            $groupCountNotice = "剩餘{$this->group_remaining_count}/{$this->group_max_count}";
        }

        return "{$this->project->display_type_and_venue_number_name} - {$this->display_date} - {$this->display_time_range}($groupCountNotice)";
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
     * 場次日期
     *
     * @return string
     */
    public function getDisplayDateForDatepickerAttribute(): string
    {
        $date = Carbon::create($this->date)->translatedFormat('Y-m-d');

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
    public function getDisplayProjectNameAttribute(): ?string
    {
        if ($this->relationLoaded('project') === false) {
            return null;
        }

        return $this->project->display_project_name;
    }

    /**
     * @return Collection|null
     */
    public function getProjectNatures(): ?Collection
    {
        if ($this->relationLoaded('project') === false) {
            return null;
        }

        $project = $this->project;

        if ($project->relationLoaded('projectNatures') === false) {
            return null;
        }

        return $project->projectNatures;
    }
}
