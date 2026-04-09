<?php

namespace App\Filament\Resources\ActivitySessionNormals\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ActivitySessionNormalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->columns([
                TextColumn::make('project.display_type_and_venue_number_name')
                    ->label('計畫')
                    ->searchable(),
                TextColumn::make('display_date')
                    ->label('場次日期')
                    ->sortable(),
                TextColumn::make('display_time_range')
                    ->label('場次時段')
                    ->sortable(),
                TextColumn::make('quota')
                    ->label('建議人數')
                    ->getStateUsing(fn ($record) => "{$record->quota_min} ~ {$record->quota_max}")
                    ->sortable(),
                TextColumn::make('group_max')
                    ->label('可預約總組數')
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
            ->modifyQueryUsing(fn (Builder $query) => $query
                ->orderBy('sort_order', 'asc') // 第一排序條件
                ->orderBy('id', 'desc') // 第二排序條件
            )
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
