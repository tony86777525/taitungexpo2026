<?php

namespace App\Filament\Resources\ActivityReservations\Pages;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivityReservationType;
use App\Filament\Resources\ActivityReservations\ActivityReservationResource;
use App\Models\ActivityReservation;
use App\Models\ActivitySession;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ApproveActivityReservation extends EditRecord
{
    protected static string $resource = ActivityReservationResource::class;

    protected static ?string $title = '審核預約';

    protected function resolveRecord(int | string $key): Model
    {
        return ActivityReservation::findOrFail($key);
    }

    public function getBreadcrumbs(): array
    {
        return [
            url('/admin') => 'Dashboard',
            $this->getTitle(),
        ];
    }

    public function form(Schema $schema): Schema
    {
        $activitySessions = ActivitySession::query()
            ->with([
                'activity',
                'activity.project',
                'activity.project.zone'
            ])
            ->where(DB::raw('group_max - group_vip'), '>', 0)
            ->get();

        $activityReservationCounts = ActivityReservation::query()
            ->select('activity_session_id', 'type', DB::raw('count(*) as count'))
            ->where('status', ActivityReservationStatus::CONFIRMED->value)
            ->groupBy('activity_session_id', 'type')
            ->get();

        return $schema
            ->components([
                TextEntry::make('type')
                    ->label('預約類型')
                    ->getStateUsing(fn ($record) => $record->type->label() ?? '-'),
                TextEntry::make('activity_info')
                    ->label('活動場次')
                    ->getStateUsing(function ($record) use ($activityReservationCounts) {
                        $isVip = $record->type === ActivityReservationType::VIP;

                        $currentType = $isVip === true ? ActivityReservationType::VIP : ActivityReservationType::NORMAL;

                        $activitySession = $record->activitySession;

                        $currentGroupCount = $activityReservationCounts->first(function ($count) use ($activitySession, $currentType) {
                            return $activitySession->id === $count->activity_session_id && $count->type === $currentType;
                        })?->count ?? 0;

                        if (
                            $isVip === true && $activitySession->canBookVipGroup($currentGroupCount)
                        ) {
                            $denominator = $activitySession->vip_group_count;
                            return "{$record->activitySession->display_info}(剩餘{$currentGroupCount}/{$denominator})" ?? '-';
                        } elseif ($isVip === false && $activitySession->canBookNormalGroup($currentGroupCount)) {
                            $denominator = $activitySession->normal_group_count;
                            return "{$record->activitySession->display_info}(剩餘{$currentGroupCount}/{$denominator})" ?? '-';
                        }

                        return "{$activitySession->activity->project->venue_number} - {$record->activitySession->display_info}(報名已額滿)" ?? '-';
                    }),
                TextInput::make('contact_name')
                    ->label('聯絡人姓名')
                    ->disabled(),
                TextInput::make('contact_phone')
                    ->label('聯絡電話')
                    ->disabled(),
                TextInput::make('contact_email')
                    ->label('電子郵件')
                    ->disabled(),
                TextInput::make('contact_group_name')
                    ->label('預約團體名稱')
                    ->disabled(),
                TextInput::make('participants_quota')
                    ->label('預計參與人數')
                    ->disabled(),
                Textarea::make('notes')
                    ->label('備註（選填）')
                    ->disabled(),
                Select::make('status')
                    ->label('狀態')
                    ->options(ActivityReservationStatus::options())
                    ->required(),
            ])
            ->columns(1);
    }
}
