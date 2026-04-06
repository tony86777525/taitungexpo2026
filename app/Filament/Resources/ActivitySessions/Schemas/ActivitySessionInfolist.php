<?php

namespace App\Filament\Resources\ActivitySessions\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ActivitySessionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project.display_type_and_venue_number_name')
                    ->label('計畫'),
                TextEntry::make('date')
                    ->label('場次日期')
                    ->getStateUsing(fn ($record) => "{$record->display_date}"),
                TextEntry::make('time')
                    ->label('場次時段')
                    ->getStateUsing(fn ($record) => "{$record->display_time_range}"),
                TextEntry::make('quota')
                    ->label('建議人數')
                    ->getStateUsing(fn ($record) => "{$record->quota_min} ~ {$record->quota_max}"),
                TextEntry::make('group_max')
                    ->label('可預約總組數 (※一般＋ VIP 預約名額)')
                    ->numeric(),
                TextEntry::make('group_vip')
                    ->label('保留「VIP 預約」組數 (※建議每時段至少保留 1 組)')
                    ->numeric(),
                TextEntry::make('group_regular')
                    ->label('開放「一般預約」組數 (※對外開放預約名額)')
                    ->numeric(),
                TextEntry::make('tour_venue_note')
                    ->label('團體導覽場館備註')
                    ->formatStateUsing(fn (string $state) => nl2br($state))
                    ->html(),
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
