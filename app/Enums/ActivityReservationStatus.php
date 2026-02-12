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

    public static function options(): array
    {
        return array_column(array_map(fn($case) => [
            'value' => $case->value, // 這是 Key (存資料庫)
            'label' => $case->label(), // 這是顯示的值 (介面顯示)
        ], self::cases()), 'label', 'value');
    }
}
