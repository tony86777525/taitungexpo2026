<?php

namespace App\Filament\Resources\PrivateSectorProjects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PrivateSectorProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('executingUnit.name_zh_TW')
                    ->label('執行單位')
                    ->searchable(),
                TextColumn::make('project_number')
                    ->label('計畫編號')
                    ->searchable(),
                TextColumn::make('project_name_zh_TW')
                    ->label('計畫名稱（中）')
                    ->searchable(),
                TextColumn::make('project_name_en')
                    ->label('計畫名稱（英）')
                    ->searchable(),
                TextColumn::make('project_date')
                    ->label('執行日期')
                    ->getStateUsing(fn ($record) => "{$record->project_start_date} ~ {$record->project_end_date}"),
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
