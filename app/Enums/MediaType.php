<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum MediaType: int implements HasLabel
{
    case IMAGE = 1;
    case VIDEO = 2;

    public function label(): string
    {
        return match($this) {
            self::IMAGE => '圖片',
            self::VIDEO => '影片',
        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::IMAGE => '圖片',
            self::VIDEO => '影片',
        };
    }
}
