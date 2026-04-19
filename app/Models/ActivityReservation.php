<?php

namespace App\Models;

use App\Enums\ActivityReservationStatus;
use App\Enums\ContactSex;
use App\Enums\Language;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class ActivityReservation extends Model
{
    protected $table = 'activity_reservations';

    protected $fillable = [
        // 導覽領隊人
        'guide_leader_name',
        // 導覽領隊人聯絡方式
        'guide_leader_contact',
        // 導覽領隊人聯絡電話
        'guide_leader_phone',
        // 導覽領隊人聯絡信箱
        'guide_leader_email',
        // 聯絡人姓名
        'contact_name',
        // 聯絡人性別
        'contact_sex',
        // 聯絡電話
        'contact_phone',
        // 電子郵件
        'contact_email',
        // 預約團體名稱
        'contact_group_name',
        // 預計參與人數
        'participants_quota',
        // 備註（選填）
        'notes',
        // vip團隊內部備註
        'vip_staff_only_notes',
        // 未通過原因（選填）
        'status_notes',
        // 活動預約場次
        'activity_session_id',
        // 狀態 (1:confirmed, 0:cancelled, 2:pending)
        'status',
        // 排序順序
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'status' => ActivityReservationStatus::class,
            'contact_sex' => ContactSex::class,
        ];
    }

    /**
     * Get the activity session for the activity reservation.
     */
    public function activitySession(): BelongsTo
    {
        return $this->belongsTo(ActivitySession::class, 'activity_session_id');
    }

    /**
     * Get the activity session normal for the activity reservation.
     */
    public function activitySessionNormal(): BelongsTo
    {
        return $this->belongsTo(ActivitySessionNormal::class, 'activity_session_id');
    }

    /**
     * Get the activity session vip for the activity reservation.
     */
    public function activitySessionVip(): BelongsTo
    {
        return $this->belongsTo(ActivitySessionVip::class, 'activity_session_id');
    }

    /**
     * @return string
     */
    public function getDisplayStatusAttribute(): string
    {
        switch ($this->status) {
            case ActivityReservationStatus::CONFIRMED:
                return "已核准";
            case ActivityReservationStatus::PENDING:
                return "待審核";
            case ActivityReservationStatus::CANCELLED:
                return "已取消";
        }

        return '';
    }

    /**
     * @return string
     */
    public function getOrderNumberAttribute(): string
    {
        if (empty($this->activitySession->project->display_venue_number)) {
            return '';
        }

        $venueNumber = $this->activitySession->project->display_venue_number;
        $datetime = Carbon::parse($this->created_at)->format('YmdHis');

        return "{$datetime}-{$venueNumber}-{$this->id}";
    }


    /**
     * @return string|null
     */
    public function getDisplayContactDearNameAttribute(): ?string
    {
        if (app()->getLocale() === Language::EN->value) {
            return "{$this->contact_sex->labelEn()}{$this->contact_name}";
        }

        return "{$this->contact_name}{$this->contact_sex->labelTw()}";
    }
}
