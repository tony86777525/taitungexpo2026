<?php

namespace App\Filament\Resources\PrivateSectorProjects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
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
                TextColumn::make('project_name_zh_TW')
                    ->label('計畫名稱（中）')
                    ->searchable(),
                TextColumn::make('project_name_en')
                    ->label('計畫名稱（英）')
                    ->searchable(),
                TextColumn::make('project_date')
                    ->label('執行日期')
                    ->date('Y年m月d日')
                    ->sortable(),
//                TextColumn::make('project_location_zh_TW')
//                    ->label('地點（中）')
//                    ->searchable(),
//                TextColumn::make('project_location_en')
//                    ->label('地點（英）')
//                    ->searchable(),
//                TextColumn::make('map_link')
//                    ->label('地圖連結')
//                    ->searchable(),
//                ImageColumn::make('featured_image_url')
//                    ->label('主視覺')
//                    ->disk('public'),
//                ImageColumn::make('thumbnail_url')
//                    ->label('縮略圖')
//                    ->disk('public'),
                IconColumn::make('is_active')
                    ->label('開關')
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
