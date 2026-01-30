<?php

namespace App\Filament\Resources\PrivateSectorProjects\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PrivateSectorProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('executingUnit.name_zh_TW')
                    ->label('執行單位')
                    ->placeholder('-'),
                TextEntry::make('project_name_zh_TW')
                    ->label('計畫名稱（中）'),
                TextEntry::make('project_name_en')
                    ->label('計畫名稱（英）'),
                TextEntry::make('project_date')
                    ->label('執行日期')
                    ->date('Y年m月d日')
                    ->placeholder('-'),
                TextEntry::make('project_location_zh_TW')
                    ->label('地點（中）')
                    ->placeholder('-'),
                TextEntry::make('project_location_en')
                    ->label('地點（英）')
                    ->placeholder('-'),
                TextEntry::make('map_link')
                    ->label('地圖連結')
                    ->placeholder('-'),
                ImageEntry::make('featured_image_url')
                    ->label('主視覺')
                    ->disk('public')
                    ->placeholder('-'),
                ImageEntry::make('thumbnail_url')
                    ->label('縮略圖')
                    ->disk('public')
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->label('開關')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->label('建立時間')
                    ->dateTime('Y年m月d日 H:i:s')
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('最後更新時間')
                    ->dateTime('Y年m月d日 H:i:s')
                    ->placeholder('-'),
            ])
            ->columns(1);
    }
}
