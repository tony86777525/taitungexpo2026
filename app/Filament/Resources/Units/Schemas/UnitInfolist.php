<?php

namespace App\Filament\Resources\Units\Schemas;

use App\Models\Unit;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UnitInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name_zh_TW')
                    ->label('單位名稱（中）')
                    ->placeholder('-'),
                TextEntry::make('name_en')
                    ->label('單位名稱（英）')
                    ->placeholder('-'),
                ImageEntry::make('image_url')
                    ->label('單位圖檔')
                    ->disk('public')
                    ->placeholder('-'),
                TextEntry::make('link')
                    ->label('單位連結')
                    ->url(fn (Unit $record): string => $record->link ?? '')
                    ->openUrlInNewTab()
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->label('啟用狀態')
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
