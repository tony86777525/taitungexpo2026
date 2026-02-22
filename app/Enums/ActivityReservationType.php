<?php
namespace App\Enums;

enum ActivityReservationType: int
{
    case NORMAL = 1;
    case VIP = 2;

    // 定義顯示用的標籤
    public function label(): string
    {
        return match($this) {
            self::NORMAL => '一般',
            self::VIP => 'VIP',
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
