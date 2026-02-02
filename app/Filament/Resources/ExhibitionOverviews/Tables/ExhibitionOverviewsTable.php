<?php

namespace App\Filament\Resources\ExhibitionOverviews\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExhibitionOverviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo_url')
                    ->label('LOGO')
                    ->disk('public'),
                TextColumn::make('venue.code')
                    ->label('場館編號')
                    ->searchable(),
                TextColumn::make('project_name_zh_TW')
                    ->label('計畫名稱（中）')
                    ->searchable(),
                TextColumn::make('project_name_en')
                    ->label('計畫名稱（英）')
                    ->searchable(),
                TextColumn::make('project_date')
                    ->label('活動日期')
                    ->getStateUsing(fn ($record) => "{$record->project_start_date} ~ {$record->project_end_date}"),
                TextColumn::make('project_time')
                    ->label('活動時間')
                    ->getStateUsing(fn ($record) => "{$record->project_start_time} ~ {$record->project_end_time}"),
                TextColumn::make('project_location_zh_TW')
                    ->label('計畫地點（中）')
                    ->searchable(),
                TextColumn::make('project_location_en')
                    ->label('計畫地點（英）')
                    ->searchable(),
                TextColumn::make('map_link')
                    ->label('地圖連結')
                    ->openUrlInNewTab()
                    ->placeholder('-'),
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
