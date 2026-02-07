<?php

namespace App\Filament\Pages;

use App\Enums\ActivityReservationStatus;
use App\Models\ActivityReservation;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Summarizers\Count;

class DashBoard extends Page implements HasForms, HasTable
{
    use InteractsWithForms, InteractsWithTable;

    protected string $view = 'filament.pages.dashboard';

    protected static ?string $title = '2026台東博覽會-團體導覽預約申請';

    /**
     * 這是 HasTable 介面要求的方法，定義預設表格（這裡設為全部預約）。
     */
    public function table(Table $table): Table
    {
        return $table
            ->query(ActivityReservation::query())
            ->heading(view('filament.common.table_heading', [
                'heading' => '預約資料總覽',
            ]))
            ->columns([
                Tables\Columns\TextColumn::make('activitySession.activity.current_project.venue.zone.name')->label('展區')
                    ->sortable(),
                Tables\Columns\TextColumn::make('activitySession.date')->label('日期')
                    ->sortable(),
                Tables\Columns\TextColumn::make('activitySession.activity.current_project.venue.name')->label('場館')
                    ->sortable(),
                Tables\Columns\TextColumn::make('time')->label('時段')
                    ->getStateUsing(fn ($record) => "{$record->activitySession->start_time} ~ {$record->activitySession->end_time}")
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_group_name')->label('團體')
                    ->sortable(),
                Tables\Columns\TextColumn::make('participants_quota')->label('人數')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')->label('狀態')
                    ->getStateUsing(fn ($record) => "{$record->status->label()}")
                    ->sortable()
                    ->color(fn ($record) => $record->status->color()),
            ])
            ->paginated(false);
    }

    /**
     * 為了相容 View 中的呼叫，回傳預設表格。
     */
    public function getAllReservationsTable(): Table
    {
        return $this->getTable();
    }

    /**
     * 待審核預約表格
     */
    public function getPendingReservationsTable(): Table
    {
        return Table::make($this)
            ->query(ActivityReservation::query())
            ->heading(view('filament.common.table_heading', [
                'heading' => '2026 台東博覽會｜團體導覽管理系統',
            ]))
            ->paginated(false);
    }
}
