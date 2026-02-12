<?php
namespace App\Enums;

enum ProjectType: int
{
    case EXHIBITION_OVERVIEW = 1;
    case PRIVATE_SECTOR_PROJECT = 2;

    public function label(): string
    {
        return match($this) {
            self::EXHIBITION_OVERVIEW => '展覽總覽',
            self::PRIVATE_SECTOR_PROJECT => '民間參與計畫',
        };
    }
}
