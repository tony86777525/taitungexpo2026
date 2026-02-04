<?php

namespace App\Filament\Resources\ActivityReservations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ActivityReservationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('activitySession.display_title')
                    ->label('活動預約場次'),
                TextEntry::make('contact_name')
                    ->label('聯絡人姓名'),
                TextEntry::make('contact_phone')
                    ->label('聯絡電話'),
                TextEntry::make('contact_email')
                    ->label('電子郵件'),
                TextEntry::make('contact_group_name')
                    ->label('預約團體名稱'),
                TextEntry::make('participants_quota')
                    ->label('預計參與人數'),
                TextEntry::make('notes')
                    ->label('備註（選填）')
                    ->formatStateUsing(fn (string $state) => nl2br($state))
                    ->html(),
                TextEntry::make('display_status')
                    ->label('狀態')
                    ->placeholder('-'),
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
