<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\RichEditor\RichContentRenderer;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BrandInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name_tw')
                    ->label('品牌名稱（中）')
                    ->placeholder('-'),
                TextEntry::make('name_en')
                    ->label('品牌名稱（英）')
                    ->placeholder('-'),
                TextEntry::make('url')
                    ->label('品牌連結')
                    ->placeholder('-'),
                TextEntry::make('description_tw')
                    ->label('品牌介紹（中）')
                    ->state(fn ($record): string => !empty($record->description_tw) ? RichContentRenderer::make($record->description_tw)->toHtml() : '')
                    ->prose()
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('description_en')
                    ->label('品牌介紹（英）')
                    ->state(fn ($record): string => !empty($record->description_en) ? RichContentRenderer::make($record->description_en)->toHtml() : '')
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
                ImageEntry::make('thumbnail_url')
                    ->label('縮略圖')
                    ->disk('public')
                    ->placeholder('-'),
                RepeatableEntry::make('contents')
                    ->label('商品介紹')
                    ->schema([
                        TextEntry::make('title_tw')->label('標題（中）')->placeholder('-'),
                        TextEntry::make('title_en')->label('標題（英）')->placeholder('-'),
                        TextEntry::make('content_tw')->label('內文（中）')
                            ->state(fn ($record): string => !empty($record->content_tw) ? RichContentRenderer::make($record->content_tw)->toHtml() : '')
                            ->prose()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('content_en')->label('內文（英）')
                            ->state(fn ($record): string => !empty($record->content_en) ? RichContentRenderer::make($record->content_en)->toHtml() : '')
                            ->prose()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('item_text_tw')->label('項目文字（中）')
                            ->state(fn ($record): string => !empty($record->item_text_tw) ? RichContentRenderer::make($record->item_text_tw)->toHtml() : '')
                            ->prose()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('item_text_en')->label('項目文字（英）')
                            ->state(fn ($record): string => !empty($record->item_text_en) ? RichContentRenderer::make($record->item_text_en)->toHtml() : '')
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
                    ->label('品牌相簿')
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
