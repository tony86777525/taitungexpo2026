<?php

namespace App\Filament\Resources\Activities\Widgets;

use App\Models\Activity;
use App\Models\ActivityReservation;
use App\Models\Project;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActivityWidget extends TableWidget
{
    public function table(Table $table): Table
    {
        $projects = Project::query()
            ->with([
                'zone',
            ])
            ->get();

        $options = $projects->pluck('venue_number', 'id');

        return $table
            ->query(fn (): Builder => Activity::query())
            ->heading('預約量能總覽')
            ->columns([
                // 使用 ViewColumn 並指定一個 Blade 視圖路徑
                ViewColumn::make('activity_details')
                    ->label('')
                    ->view('filament.common.table_column_activity'),
            ])
            ->paginated(false)
            ->filters([
                SelectFilter::make('date')
                    ->label('選擇日期')
                    ->relationship('activitySessions', 'date') // 關聯名稱, 顯示的欄位名
                    ->searchable() // 開啟搜尋功能
                    ->preload(),    // 進入頁面時就載入所有選項
                SelectFilter::make('venue_number')
                    ->label('選擇展區')
                    ->relationship('project', 'project_name_tw', fn (Builder $query) => $query->orderBy('id')) // 關聯名稱, 顯示的欄位名
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->venue_number}")
                    ->searchable() // 開啟搜尋功能
                    ->preload(),    // 進入頁面時就載入所有選項
                SelectFilter::make('zone')
                    ->label('選擇場館')
                    ->relationship('project', 'project_name_tw', fn (Builder $query) => $query->orderBy('id')) // 關聯名稱, 顯示的欄位名
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->venue_number}")
                    ->searchable() // 開啟搜尋功能
                    ->preload(),    // 進入頁面時就載入所有選項
            ], layout: FiltersLayout::AboveContent)
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
