<?php

namespace App\Filament\Resources\Activities\Schemas;

use Filament\Forms\Components\RichEditor\RichContentRenderer;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ActivityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project')
                    ->label('計畫名稱')
                    ->getStateUsing(fn ($record) => $record->privateSectorProject?->project_name_zh_TW ?? $record->exhibitionOverview?->project_name_zh_TW),
                TextEntry::make('title_zh_TW')
                    ->label('活動標題（中）'),
                TextEntry::make('title_en')
                    ->label('活動標題（英）'),
                TextEntry::make('activity_date')
                    ->label('活動日期')
                    ->getStateUsing(fn ($record) => "{$record->activity_start_date} ~ {$record->activity_end_date}"),
                TextEntry::make('activity_time')
                    ->label('活動時間')
                    ->getStateUsing(fn ($record) => "{$record->activity_start_time} ~ {$record->activity_end_time}"),
                TextEntry::make('activity_location_zh_TW')
                    ->label('活動地點（中）')
                    ->placeholder('-'),
                TextEntry::make('activity_location_en')
                    ->label('活動地點（英）')
                    ->placeholder('-'),
                TextEntry::make('map_link')
                    ->label('地圖連結')
                    ->placeholder('-'),
                TextEntry::make('registration_info_zh_TW')
                    ->label('報名資訊（中）')
                    ->state(fn ($record): string => RichContentRenderer::make($record->registration_info_zh_TW)->toHtml())
                    ->prose()
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('registration_info_en')
                    ->label('報名資訊（英）')
                    ->state(fn ($record): string => RichContentRenderer::make($record->registration_info_en)->toHtml())
                    ->prose()
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('tour_info_zh_TW')
                    ->label('導覽預約資訊（中）')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('tour_info_en')
                    ->label('導覽預約資訊（英）')
                    ->html()
                    ->placeholder('-'),
                RepeatableEntry::make('activityNatures')
                    ->label('活動性質')
                    ->schema([
                        TextEntry::make('name_zh_TW')->label('（中）'),
                        TextEntry::make('name_en')->label('（英）'),
                    ])
                    ->grid(6)
                    ->placeholder('-'),
                RepeatableEntry::make('projectTypes')
                    ->label('計畫類型')
                    ->schema([
                        TextEntry::make('name_zh_TW')->label('（中）'),
                        TextEntry::make('name_en')->label('（英）'),
                    ])
                    ->grid(6)
                    ->placeholder('-'),
                RepeatableEntry::make('contents')
                    ->label('計畫內容')
                    ->schema([
                        TextEntry::make('title_zh_TW')->label('標題（中）')->placeholder('-'),
                        TextEntry::make('title_en')->label('標題（英）')->placeholder('-'),
                        TextEntry::make('content_zh_TW')->label('內文（中）')->placeholder('-'),
                        TextEntry::make('content_en')->label('內文（英）')->placeholder('-'),
                        TextEntry::make('item_text_zh_TW')->label('項目文字（中）')->placeholder('-'),
                        TextEntry::make('item_text_en')->label('項目文字（英）')->placeholder('-'),
                        RepeatableEntry::make('links')
                            ->label('連結按鈕')
                            ->schema([
                                TextEntry::make('name_zh_TW')->label('連結按鈕（中）'),
                                TextEntry::make('name_en')->label('連結按鈕（英）'),
                                TextEntry::make('url_zh_TW')->label('連結（中）'),
                                TextEntry::make('url_en')->label('連結（英）'),
                            ])
                            ->grid(3),
                        RepeatableEntry::make('images')
                            ->label('輪播圖片')
                            ->schema([
                                ImageEntry::make('url')->disk('public')->label('圖片'),
                                TextEntry::make('alt_text')->label('Alt文字')->placeholder('-'),
                            ])
                            ->grid(3),
                    ])
                    ->columns(1),
                RepeatableEntry::make('images')
                    ->label('活動相簿')
                    ->schema([
                        ImageEntry::make('url')->disk('public')->label('圖片'),
                        TextEntry::make('alt_text')->label('Alt文字')->placeholder('-'),
                    ])
                    ->grid(3),
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
