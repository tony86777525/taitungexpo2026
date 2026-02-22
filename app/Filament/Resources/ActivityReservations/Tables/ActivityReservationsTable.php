<?php

namespace App\Filament\Resources\ActivityReservations\Tables;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivityReservationType;
use App\Models\ActivitySession;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActivityReservationsTable
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
                TextColumn::make('display_type')
                    ->label('預約類型')
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
            ->filters([
                SelectFilter::make('date')
                    ->label('選擇場次')
                    ->relationship('activitySession', 'date') // 關聯名稱, 顯示的欄位名
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->display_info} - {$record->activity->project->venue_number}")
                    ->indicator(function (array $data): ?string {
                        if (! $data['value']) {
                            return null;
                        }

                        // 根據選中的 ID 找出該筆資料
                        $record = ActivitySession::find($data['value']);

                        if (!$record) {
                            return null;
                        }

                        // 這裡回傳你想要顯示在篩選器標籤上的自定義文字
                        return "{$record->activity->project->venue_number}";
                    })
                    ->searchable() // 開啟搜尋功能
                    ->preload(),    // 進入頁面時就載入所有選項
                SelectFilter::make('status')
                    ->label('狀態')
                    ->options(ActivityReservationStatus::options()),
                SelectFilter::make('type')
                    ->label('預約類型')
                    ->options(ActivityReservationType::options()),
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
