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
                TextEntry::make('activity.title_zh_TW')
                    ->label('活動標題'),
                TextEntry::make('date')
                    ->label('預約日期')
                    ->date('Y-m-d'),
                TextEntry::make('time')
                    ->label('預約時段')
                    ->getStateUsing(fn ($record) => "{$record->start_time} ~ {$record->end_time}"),
                TextEntry::make('quota')
                    ->label('建議人數')
                    ->getStateUsing(fn ($record) => "{$record->quota_min} ~ {$record->quota_max}"),
                TextEntry::make('group_max')
                    ->label('預約組數上限')
                    ->numeric(),
                TextEntry::make('group_vip')
                    ->label('預約組數上限（vip）')
                    ->numeric(),
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
