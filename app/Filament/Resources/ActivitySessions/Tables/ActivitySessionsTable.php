<?php

namespace App\Filament\Resources\ActivitySessions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ActivitySessionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('activity.id')
                    ->label('活動標題')
                    ->searchable(),
                TextColumn::make('date')
                    ->label('預約日期')
                    ->date('Y-m-d')
                    ->sortable(),
                TextColumn::make('time')
                    ->label('預約時段')
                    ->getStateUsing(fn ($record) => "{$record->start_time} ~ {$record->end_time}")
                    ->sortable(),
                TextColumn::make('quota')
                    ->label('建議人數')
                    ->getStateUsing(fn ($record) => "{$record->quota_min} ~ {$record->quota_max}")
                    ->sortable(),
                TextColumn::make('group_max')
                    ->label('預約上限（組數）')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('group_vip')
                    ->label('預約上限（vip人數）')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('啟用狀態')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('建立時間')
                    ->dateTime('Y年m月d日 H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('最後更新時間')
                    ->dateTime('Y年m月d日 H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
