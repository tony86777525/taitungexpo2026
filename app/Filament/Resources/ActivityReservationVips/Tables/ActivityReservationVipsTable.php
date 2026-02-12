<?php

namespace App\Filament\Resources\ActivityReservationVips\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ActivityReservationVipsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('activitySession.activity.project.display_name')
                    ->label('計畫活動')
                    ->searchable(),
                TextColumn::make('activitySession.display_info')
                    ->label('場次資訊')
                    ->searchable(),
                TextColumn::make('contact_name')
                    ->label('聯絡人姓名')
                    ->sortable(),
                TextColumn::make('contact_phone')
                    ->label('聯絡電話')
                    ->sortable(),
                TextColumn::make('contact_email')
                    ->label('電子郵件')
                    ->sortable(),
                TextColumn::make('contact_group_name')
                    ->label('預約團體名稱')
                    ->sortable(),
                TextColumn::make('participants_quota')
                    ->label('預計參與人數')
                    ->sortable(),
                IconColumn::make('display_status')
                    ->label('狀態')
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
