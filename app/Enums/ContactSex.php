<?php
namespace App\Enums;

enum ContactSex: int
{
    case MAN = 1;
    case WOMAN = 2;

    public function label(): ?string
    {
        return match ($this) {
            self::MAN => '先生',
            self::WOMAN => '小姐',
        };
    }

    public static function options(): array
    {
        return array_column(array_map(fn($case) => [
            'value' => $case->value, // 這是 Key (存資料庫)
            'label' => $case->label(), // 這是顯示的值 (介面顯示)
        ], self::cases()), 'label', 'value');
    }

    public function labelTw(): string
    {
        return match ($this) {
            self::MAN => '先生',
            self::WOMAN => '小姐',
        };
    }

    public function labelEn(): string
    {
        return match ($this) {
            self::MAN => 'Mr.',
            self::WOMAN => 'Ms.',
        };
    }
}
