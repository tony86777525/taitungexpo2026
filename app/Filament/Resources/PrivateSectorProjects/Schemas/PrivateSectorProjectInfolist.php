<?php

namespace App\Filament\Resources\PrivateSectorProjects\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
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
                TextEntry::make('project_number')
                    ->label('計畫編號')
                    ->placeholder('-'),
                TextEntry::make('project_name_zh_TW')
                    ->label('計畫名稱（中）')
                    ->placeholder('-'),
                TextEntry::make('project_name_en')
                    ->label('計畫名稱（英）'),
                TextEntry::make('project_date')
                    ->label('執行日期')
                    ->getStateUsing(fn ($record) => "{$record->project_start_date} ~ {$record->project_end_date}"),
                TextEntry::make('project_location_zh_TW')
                    ->label('地點（中）')
                    ->placeholder('-'),
                TextEntry::make('project_location_en')
                    ->label('地點（英）')
                    ->placeholder('-'),
                TextEntry::make('map_link')
                    ->label('地圖連結')
                    ->openUrlInNewTab()
                    ->placeholder('-'),
                RepeatableEntry::make('projectCategories')
                    ->label('計劃類型')
                    ->schema([
                        TextEntry::make('name_zh_TW')->label('（中）'),
                        TextEntry::make('name_en')->label('（英）'),
                    ])
                    ->grid(6)
                    ->placeholder('-'),
                RepeatableEntry::make('projectNatures')
                    ->label('計劃性質')
                    ->schema([
                        TextEntry::make('name_zh_TW')->label('（中）'),
                        TextEntry::make('name_en')->label('（英）'),
                    ])
                    ->grid(6)
                    ->placeholder('-'),
                ImageEntry::make('featured_image_url')
                    ->label('主視覺')
                    ->disk('public')
                    ->placeholder('-'),
                RepeatableEntry::make('featuredImages')
                    ->label('主視覺')
                    ->schema([
                        ImageEntry::make('url')->disk('public')->label('圖片'),
                        TextEntry::make('alt_text')->label('Alt文字')->placeholder('-'),
                    ])
                    ->grid(3),
                ImageEntry::make('thumbnail_url')
                    ->label('縮略圖')
                    ->disk('public')
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
                    ->label('計畫相簿')
                    ->schema([
                        ImageEntry::make('url')->disk('public')->label('圖片'),
                        TextEntry::make('alt_text')->label('Alt文字')->placeholder('-'),
                    ])
                    ->grid(3),
                RepeatableEntry::make('units')
                    ->label('單位')
                    ->schema([
                        TextEntry::make('name_zh_TW')->label('（中）'),
                        TextEntry::make('name_en')->label('（英）'),
                        ImageEntry::make('image_url')
                            ->label('圖檔')
                            ->disk('public')
                            ->placeholder('-'),
                        TextEntry::make('link')
                            ->label('連結')
                            ->openUrlInNewTab()
                            ->placeholder('-'),
                    ])
                    ->grid(3)
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
