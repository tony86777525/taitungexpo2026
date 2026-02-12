<?php

namespace App\Filament\Pages;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivityReservationType;
use App\Filament\Resources\ActivityReservations\ActivityReservationResource;
use App\Models\ActivityReservation;
use App\Models\ActivitySession;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Filament\Tables;

class DashBoard extends Page implements HasForms, HasTable
{
    use InteractsWithForms, InteractsWithTable;

    protected string $view = 'filament.pages.dashboard';

    protected static ?string $title = '2026台東博覽會-團體導覽預約申請';

    public function getBookedInfo(): array
    {
        $count = ActivityReservation::query()
            ->count();

        $pendingCount = ActivityReservation::query()
            ->where('status', ActivityReservationStatus::PENDING)
            ->count();

        $confirmedCount = ActivityReservation::query()
            ->where('status', ActivityReservationStatus::CONFIRMED)
            ->count();

        $cancelledCount = ActivityReservation::query()
            ->where('status', ActivityReservationStatus::CANCELLED)
            ->count();

        $joinCount = ActivityReservation::query()
            ->sum('participants_quota');

        $bookedVipCount = ActivityReservation::query()
            ->where('type', ActivityReservationType::VIP)
            ->count();

        $vipCount = ActivitySession::query()
            ->sum('group_vip');

        $unbookedVipCount = $vipCount - $bookedVipCount;

        return [$count, $pendingCount, $confirmedCount, $cancelledCount, $joinCount, $bookedVipCount, $unbookedVipCount];
    }

    /**
     * 這是 HasTable 介面要求的方法，定義預設表格（這裡設為全部預約）。
     */
    public function table(Table $table): Table
    {
        return $table
            ->query(ActivityReservation::query()->orderBy('id', 'desc'))
            ->heading(view('filament.common.table_heading', [
                'heading' => '預約資料總覽',
            ]))
            ->columns([
                Tables\Columns\TextColumn::make('activitySession.activity.project.zone.name_tw')->label('展區')
                    ->sortable(),
                Tables\Columns\TextColumn::make('activitySession.date')->label('日期')
                    ->sortable(),
                Tables\Columns\TextColumn::make('activitySession.activity.project.venue_number')->label('場館')
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
            ->recordUrl(
                // 指向該筆資料的編輯頁面
                fn (ActivityReservation $record): string => ActivityReservationResource::getUrl('edit', ['record' => $record]),
            )
            ->paginated(false);
    }
}
