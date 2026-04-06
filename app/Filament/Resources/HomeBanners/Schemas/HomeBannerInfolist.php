<?php

namespace App\Filament\Resources\HomeBanners\Schemas;

use App\Enums\MediaType;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Schemas\Schema;

class HomeBannerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('media_type')
                    ->label('類型')
                    ->getStateUsing(fn ($record) => $record->display_media_type)
                    ->placeholder('-'),
                // 圖片顯示
                ImageEntry::make('media_url')
                    ->label('圖片內容')
                    ->disk('public')
                    ->visible(fn ($record) => $record->media_type === MediaType::IMAGE),
                // 影片顯示 (使用 ViewEntry 自定義 HTML)
                ViewEntry::make('media_url')
                    ->label('影片內容')
                    ->visible(fn ($record) => $record->media_type === MediaType::VIDEO)
                    ->view('filament.infolists.video-player'),
                TextEntry::make('media_url')
                    ->visible()
                    ->label('圖片/影片連結')
                    ->placeholder('-'),
                TextEntry::make('name')
                    ->label('文字')
                    ->getStateUsing(fn ($record) => $record->display_all_name)
                    ->placeholder('-'),
                TextEntry::make('link')
                    ->label('連結')
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
