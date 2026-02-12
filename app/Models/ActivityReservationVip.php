<?php

namespace App\Models;

use App\Enums\ActivityReservationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class ActivityReservationVip extends Model
{
    protected $fillable = [
        // 預約類型 (1:普通, 2:vip)
        'type',
        // 聯絡人姓名
        'contact_name',
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
        // 活動預約場次
        'activity_session_id',
        // 狀態 (1:confirmed, 0:cancelled, 2:pending)
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => ActivityReservationStatus::class,
        ];
    }

    /**
     * Get the activity session for the activity reservation.
     */
    public function activitySession(): BelongsTo
    {
        return $this->belongsTo(ActivitySession::class);
    }

    /**
     * Get the activity for the activity reservation.
     */
    public function activity(): HasOneThrough
    {
        return $this->hasOneThrough(
            Activity::class,         // 最終目標 Model
            ActivitySession::class,  // 中間層級 Model
            'id',                    // ActivitySession 的主鍵 (或 ActivityReservation 指向它的外鍵)
            'id',                    // Activity 的主鍵
            'activity_session_id',   // ActivityReservation 指向 ActivitySession 的外鍵
            'activity_id'            // ActivitySession 指向 Activity 的外鍵
        );
    }

    /**
     * @return string
     */
    public function getDisplayStatusAttribute(): string
    {
        switch ($this->status) {
            case 1:
                return "已核准";
            case 2:
                return "待審核";
            case 0:
                return "已取消";
        }

        return '';
    }
}
