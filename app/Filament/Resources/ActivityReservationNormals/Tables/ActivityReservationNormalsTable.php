<?php

namespace App\Filament\Resources\ActivityReservationNormals\Tables;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivityReservationType;
use App\Models\ActivitySession;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActivityReservationNormalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('activitySession.project.display_type_and_venue_number_name')
                    ->label('計畫活動'),
                TextColumn::make('activitySession.display_info')
                    ->label('場次資訊'),
                TextColumn::make('display_contact_dear_name')
                    ->label('聯絡人')
                    ->searchable(),
                TextColumn::make('contact_phone')
                    ->label('聯絡電話')
                    ->searchable(),
                TextColumn::make('contact_email')
                    ->label('電子郵件')
                    ->searchable(),
                TextColumn::make('contact_group_name')
                    ->label('預約團體名稱')
                    ->searchable(),
                TextColumn::make('participants_quota')
                    ->label('預計參與人數')
                    ->searchable(),
                TextColumn::make('display_status')
                    ->label('狀態')
                    ->color(fn ($record) => $record->status->color()),
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
                SelectFilter::make('date')
                    ->label('選擇場次')
                    ->relationship('activitySessionNormal', 'date', fn (Builder $query) => $query
                        ->with([
                            'project',
                            'project.zone',
                        ])
                        ->withCount([
                            'bookedActivityReservations',
                        ])
                    )
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->project->display_type_and_venue_number_name}")
                    ->searchable() // 開啟搜尋功能
                    ->preload(),    // 進入頁面時就載入所有選項
                SelectFilter::make('status')
                    ->label('狀態')
                    ->options(ActivityReservationStatus::options()),
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
