<?php

namespace App\Filament\Pages;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivitySessionType;
use App\Filament\Resources\ActivityReservationNormals\ActivityReservationNormalResource;
use App\Models\ActivityReservation;
use App\Models\ActivityReservationNormal;
use App\Models\ActivitySessionVip;
use Carbon\Carbon;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Filament\Tables;
use UnitEnum;
use BackedEnum;

class DashBoard extends Page implements HasForms, HasTable
{
    use InteractsWithForms, InteractsWithTable;

    protected string $view = 'filament.pages.dashboard';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $title = '2026台東博覽會-團體導覽預約申請';

    protected static UnitEnum|string|null $navigationGroup = 'Home';

    protected static ?int $navigationSort = 20;

    public function getBookedInfo(): array
    {
        $currentUser = auth()->user();

        $data = ActivityReservation::query()
            ->select(
                'activity_sessions.type AS type',
                'activity_reservations.status AS status',
                'activity_sessions.date AS date',
                'activity_reservations.participants_quota AS participants_quota',
            )
            ->rightJoin('activity_sessions', 'activity_reservations.activity_session_id', '=', 'activity_sessions.id')
            ->rightJoin('projects', 'projects.id', '=', 'activity_sessions.project_id')
            ->where('activity_sessions.is_active', true)
            ->where('projects.is_active', true)
            // 分場館預約系統管理者 只能看到所屬場館的內容
            ->when($currentUser->hasRole('venue_reservation_system_admin') && !empty($currentUser->project_id), function ($query) use ($currentUser) {
                $query
                    ->where('activity_sessions.project_id', $currentUser->project_id)
                    ->where('activity_sessions.type', ActivitySessionType::NORMAL);
            })
            ->get();

        $todayGroupCount = $data
            ->filter(function ($item) {
                return $item->date === Carbon::now()->format('Y-m-d')
                    && $item->status === ActivityReservationStatus::CONFIRMED;
            })
            ->count();

        $pendingCount = $data
            ->filter(function ($item) {
                return $item->status === ActivityReservationStatus::PENDING;
            })
            ->count();

        $confirmedCount = $data
            ->filter(function ($item) {
                return $item->status === ActivityReservationStatus::CONFIRMED;
            })
            ->count();

        $cancelledCount = $data
            ->filter(function ($item) {
                return $item->status === ActivityReservationStatus::CANCELLED;
            })
            ->count();

        $joinCount = $data
            ->filter(function ($item) {
                return $item->status === ActivityReservationStatus::CONFIRMED;
            })
            ->sum('participants_quota');

        $bookedVipCount = $data
            ->filter(function ($item) {
                return $item->status === ActivityReservationStatus::CONFIRMED
                    && $item->type === ActivitySessionType::VIP->value
                    && $item->date === Carbon::now()->format('Y-m-d');
            })
            ->count();

        $vipCount = ActivitySessionVip::query()
            ->rightJoin('projects', 'projects.id', '=', 'activity_sessions.project_id')
            ->where('activity_sessions.is_active', true)
            ->where('projects.is_active', true)
            ->where('activity_sessions.date', Carbon::now()->format('Y-m-d'))
            ->sum('group_max');

        $unbookedVipCount = $vipCount - $bookedVipCount;

        return [$todayGroupCount, $pendingCount, $confirmedCount, $cancelledCount, $joinCount, $bookedVipCount, $unbookedVipCount];
    }

    /**
     * 這是 HasTable 介面要求的方法，定義預設表格（這裡設為全部預約）。
     */
    public function table(Table $table): ?Table
    {
        $currentUser = auth()->user();

        $activityReservationNormalQuery = ActivityReservationNormal::query()
            ->select('activity_reservations.*')
            ->rightJoin('activity_sessions', 'activity_reservations.activity_session_id', '=', 'activity_sessions.id')
            ->where('status', ActivityReservationStatus::PENDING)
            ->when($currentUser->hasRole('venue_reservation_system_admin') && !empty($currentUser->project_id), function ($query) use ($currentUser) {
                $query->where('activity_sessions.project_id', $currentUser->project_id);
            })
            ->orderBy('activity_reservations.id', 'desc');

        return $table
            ->query(
                $activityReservationNormalQuery
            )
            ->heading(view('filament.common.table_heading', [
                'heading' => '【一般】待審核預約資料',
            ]))
            ->columns([
                Tables\Columns\TextColumn::make('activitySession.project.zone.name_tw')->label('展區')
                    ->sortable(),
                Tables\Columns\TextColumn::make('activitySession.date')->label('日期')
                    ->sortable(),
                Tables\Columns\TextColumn::make('activitySession.project.venue_number')->label('場館'),
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
                function (ActivityReservationNormal $record): string {
                    return ActivityReservationNormalResource::getUrl('approve', ['record' => $record]);
                }
            )
            ->paginated(false);
    }
}
