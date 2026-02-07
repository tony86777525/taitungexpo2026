<?php
namespace App\Enums;

enum ActivityReservationStatus: int
{
    case CANCELLED = 0;
    case CONFIRMED = 1;
    case PENDING = 2;

    // 定義顯示用的標籤
    public function label(): string
    {
        return match($this) {
            self::CANCELLED => '已取消',
            self::CONFIRMED => '已核准',
            self::PENDING => '待審核',
        };
    }

    public function color(): string
    {
        return match($this) {
            self::CANCELLED => '',
            self::CONFIRMED => 'success',
            self::PENDING => 'danger',
        };
    }
}
