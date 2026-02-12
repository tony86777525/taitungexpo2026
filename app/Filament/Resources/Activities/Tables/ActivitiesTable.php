<?php

namespace App\Filament\Resources\Activities\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ActivitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('project')
                    ->label('計畫名稱')
                    ->getStateUsing(fn ($record) => $record->project->display_name),
                TextColumn::make('title_tw')
                    ->label('活動標題（中）')
                    ->searchable(),
                TextColumn::make('title_en')
                    ->label('活動標題（英）')
                    ->searchable(),
                TextColumn::make('activity_date')
                    ->label('活動日期')
                    ->getStateUsing(fn ($record) => "{$record->activity_start_date} ~ {$record->activity_end_date}"),
                TextColumn::make('activity_time')
                    ->label('活動時間')
                    ->getStateUsing(fn ($record) => "{$record->activity_start_time} ~ {$record->activity_end_time}"),
                TextColumn::make('activity_location_tw')
                    ->label('活動地點（中）')
                    ->searchable(),
                TextColumn::make('activity_location_en')
                    ->label('活動地點（英）')
                    ->searchable(),
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
