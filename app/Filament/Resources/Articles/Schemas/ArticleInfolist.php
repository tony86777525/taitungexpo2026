<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ArticleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title_zh_TW')
                    ->label('消息標題（中）')
                    ->placeholder('-'),
                TextEntry::make('title_en')
                    ->label('消息標題（英）')
                    ->placeholder('-'),
                TextEntry::make('published_at')
                    ->label('日期')
                    ->date('Y年m月d日')
                    ->placeholder('-'),
                RepeatableEntry::make('tags')
                    ->label('消息分類')
                    ->schema([
                        TextEntry::make('name_zh_TW')->label('（中）'),
                        TextEntry::make('name_en')->label('（英）'),
                    ])
                    ->columns()
                    ->placeholder('-'),
                ImageEntry::make('thumbnail_url')
                    ->label('縮略圖')
                    ->disk('public')
                    ->placeholder('-'),
                RepeatableEntry::make('contents')
                    ->label('消息內容')
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
                                TextEntry::make('url')->label('圖片'),
                                TextEntry::make('alt_text')->label('Alt文字')->placeholder('-'),
                            ])
                            ->grid(3),
                    ])
                    ->columns(1),
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
