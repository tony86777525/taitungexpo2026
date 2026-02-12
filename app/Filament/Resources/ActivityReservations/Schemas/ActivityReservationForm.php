<?php

namespace App\Filament\Resources\ActivityReservations\Schemas;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivityReservationType;
use App\Models\Activity;
use App\Models\ActivityReservation;
use App\Models\ActivitySession;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Database\Eloquent\Model;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\DB;

class ActivityReservationForm
{
    public static function configure(Schema $schema): Schema
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
                Hidden::make('type')
                    ->default(ActivityReservationType::NORMAL->value),
//                // 1. 父級下拉選單
//                Select::make('activity_id')
//                    ->label('計畫活動')
//                    ->relationship('activitySession', 'activity.project.venue_number')
////                    ->options($activities->pluck('project.venue_number', 'id'))
////                    ->default(1)
//                    ->required()
//                    ->live() // 即時更新
//                    ->afterStateUpdated(fn (Set $set) => $set('activity_session_id', null)), // 選擇國家後清空城市
                // 2. 子級下拉選單
                Select::make('activity_session_id')
                    ->label('活動場次')
                    ->options(function (Get $get) use ($activitySessions, $activityReservationCounts) {
//                        $activitySessions->filter(function ($activitySession) use ($get) {
//                            return $activitySession->activity_id === $get('activity_id');
//                        });

                        return $activitySessions->mapWithKeys(function ($activitySession) use ($activityReservationCounts) {
                            $currentNormalGroupCount = $activityReservationCounts->first(function ($count) use ($activitySession) {
                                return $activitySession->id === $count->activity_session_id && $count->type === ActivityReservationType::NORMAL->value;
                            })?->count ?? 0;

                            if (!$activitySession->canBookNormalGroup($currentNormalGroupCount)) {
                                return [];
                            }

                            return [$activitySession->id => "{$activitySession->activity->project->venue_number} - {$activitySession->display_date} - {$activitySession->display_time_range}(剩餘{$currentNormalGroupCount}/{$activitySession->normal_group_count})"];
                        });
                    })
                    ->required()
                    ->live(),
//                    ->disabled(fn (Get $get) => ! $get('activity_id')),
                TextInput::make('contact_name')
                    ->label('聯絡人姓名')
                    ->required(),
                TextInput::make('contact_phone')
                    ->label('聯絡電話')
                    ->required(),
                TextInput::make('contact_email')
                    ->label('電子郵件')
                    ->required(),
                TextInput::make('contact_group_name')
                    ->label('預約團體名稱')
                    ->required(),
                Select::make('participants_quota')
                    ->label('預計參與人數')
                    ->options(function (Get $get) {
                        $relatedId = $get('activity_session_id');

                        if (!$relatedId) {
                            return [];
                        }

                        // 2. 根據 ID 查詢資料庫取得關聯資料
                        $activitySession = ActivitySession::find($relatedId);

                        $values = range($activitySession->quota_min, $activitySession->quota_max);

                        // 3. 回傳動態文字
                        return array_combine($values, $values);
                    })
                    ->required(),
                Textarea::make('notes')
                    ->label('備註（選填）'),
                Select::make('status')
                    ->label('狀態')
                    ->options([
                        1 => '已核准',
                        2 => '待審核',
                        0 => '已取消',
                    ])
                    ->required()
                    ->default(1),
            ])
            ->columns(1);
    }
}
