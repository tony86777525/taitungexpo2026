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
                    ->getStateUsing(fn ($record) => $record->project->display_name),
                TextEntry::make('title_tw')
                    ->label('活動標題（中）'),
                TextEntry::make('title_en')
                    ->label('活動標題（英）'),
                TextEntry::make('date')
                    ->label('活動日期')
                    ->getStateUsing(fn ($record) => "{$record->display_date_range}"),
                TextEntry::make('time')
                    ->label('活動時間')
                    ->getStateUsing(fn ($record) => "{$record->display_time_range}"),
                TextEntry::make('activity_location_tw')
                    ->label('活動地點（中）')
                    ->placeholder('-'),
                TextEntry::make('activity_location_en')
                    ->label('活動地點（英）')
                    ->placeholder('-'),
                TextEntry::make('map_link')
                    ->label('地圖連結')
                    ->placeholder('-'),
                TextEntry::make('registration_info_tw')
                    ->label('報名資訊（中）')
                    ->state(fn ($record): string => RichContentRenderer::make($record->registration_info_tw)->toHtml())
                    ->prose()
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('registration_info_en')
                    ->label('報名資訊（英）')
                    ->state(fn ($record): string => RichContentRenderer::make($record->registration_info_en)->toHtml())
                    ->prose()
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('tour_info_tw')
                    ->label('導覽預約資訊（中）')
                    ->state(fn ($record): string => RichContentRenderer::make($record->tour_info_tw)->toHtml())
                    ->prose()
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('tour_info_en')
                    ->label('導覽預約資訊（英）')
                    ->state(fn ($record): string => RichContentRenderer::make($record->tour_info_en)->toHtml())
                    ->prose()
                    ->placeholder('-')
                    ->columnSpanFull(),
                RepeatableEntry::make('activityNatures')
                    ->label('活動性質')
                    ->schema([
                        TextEntry::make('name_tw')->label('（中）'),
                        TextEntry::make('name_en')->label('（英）'),
                    ])
                    ->grid(6)
                    ->placeholder('-'),
                RepeatableEntry::make('projectTypes')
                    ->label('計畫類型')
                    ->schema([
                        TextEntry::make('name_tw')->label('（中）'),
                        TextEntry::make('name_en')->label('（英）'),
                    ])
                    ->grid(6)
                    ->placeholder('-'),
                RepeatableEntry::make('contents')
                    ->label('計畫內容')
                    ->schema([
                        TextEntry::make('title_tw')->label('標題（中）')->placeholder('-'),
                        TextEntry::make('title_en')->label('標題（英）')->placeholder('-'),
                        TextEntry::make('content_tw')->label('內文（中）')
                            ->state(fn ($record): string => RichContentRenderer::make($record->content_tw)->toHtml())
                            ->prose()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('content_en')->label('內文（英）')
                            ->state(fn ($record): string => RichContentRenderer::make($record->content_en)->toHtml())
                            ->prose()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('item_text_tw')->label('項目文字（中）')
                            ->state(fn ($record): string => RichContentRenderer::make($record->item_text_tw)->toHtml())
                            ->prose()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('item_text_en')->label('項目文字（英）')
                            ->state(fn ($record): string => RichContentRenderer::make($record->item_text_en)->toHtml())
                            ->prose()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        RepeatableEntry::make('links')
                            ->label('連結按鈕')
                            ->schema([
                                TextEntry::make('name_tw')->label('連結按鈕（中）'),
                                TextEntry::make('name_en')->label('連結按鈕（英）'),
                                TextEntry::make('url_tw')->label('連結（中）'),
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
                    ->placeholder('-')
                    ->columns(1),
                RepeatableEntry::make('images')
                    ->label('活動相簿')
                    ->schema([
                        ImageEntry::make('url')->disk('public')->label('圖片'),
                        TextEntry::make('alt_text')->label('Alt文字')->placeholder('-'),
                    ])
                    ->placeholder('-')
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
