<?php

namespace App\Models;

use App\Enums\ActivityReservationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityReservation extends Model
{
    protected $fillable = [
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
