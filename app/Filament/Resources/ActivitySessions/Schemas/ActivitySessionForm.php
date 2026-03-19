<?php

namespace App\Filament\Resources\ActivitySessions\Schemas;

use App\Models\Activity;
use Closure;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActivitySessionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('activity_id')
                    ->label('活動')
                    ->relationship(
                        name: 'activity',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->project->display_name}")
                    ->live()
                    ->afterStateUpdated(function (string|int|null $state, Set $set) {
                        if (! $state) {
                            return;
                        }

                        // 讀取關聯資料
                        $activity = Activity::find($state);

                        if ($activity) {
                            // 將關聯資料設定到其他欄位
                            $set('start_time', $activity->activity_start_time);
                            $set('end_time', $activity->activity_end_time);
                        }
                    })
                    ->required(),
                DatePicker::make('date')
                    ->label('場次日期')
                    ->required()
                    ->minDate(function (Get $get) {
                        $activityId = $get('activity_id');
                        if (! $activityId) return null;

                        return Activity::find($activityId)?->activity_start_date;
                    })
                    ->maxDate(function (Get $get) {
                        $activityId = $get('activity_id');
                        if (! $activityId) return null;

                        return Activity::find($activityId)?->activity_end_date;
                    })
                    ->maxWidth('sm'),
                Grid::make(6)
                    ->schema([
                        TimePicker::make('start_time')
                            ->label('場次開始時段')
                            ->seconds(false)
                            ->required()
                            ->maxWidth('sm'),
                        TimePicker::make('end_time')
                            ->label('場次結束時段')
                            ->afterOrEqual('start_time')
                            ->seconds(false)
                            ->required()
                            ->maxWidth('sm'),
                        // 這裡就是集中顯示的動態文字
                        Placeholder::make('time_range_info')
                            ->label('') // 隱藏 Label
                            ->columnSpanFull()
                            ->content(function (Get $get) {
                                $activityId = $get('activity_id');
                                if (! $activityId) return '請先選擇活動';

                                // 這裡只會查詢一次
                                $activity = Activity::find($activityId);

                                if (! $activity) return '';

                                return "場次可選時間區間：{$activity->display_time_range}";
                            })
                    ]),
                Grid::make(6)
                    ->schema([
                        TextInput::make('quota_min')
                            ->label('建議人數下限')
                            ->required()
                            ->numeric()
                            ->default(25),
                        TextInput::make('quota_max')
                            ->label('建議人數上限')
                            ->afterOrEqual('quota_min')
                            ->required()
                            ->numeric()
                            ->default(40),
                    ]),
                TextInput::make('group_max')
                    ->label('預約組數上限')
                    ->required()
                    ->numeric()
                    ->default(1)
                    ->rules([
                        fn (Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                            $vip = (int) $get('group_vip');
                            $regular = (int) $get('group_regular');
                            $max = (int) $value;

                            if ($max !== ($vip + $regular)) {
                                $fail("預約組數上限必須等於 VIP 組數 ({$vip}) 與一般組數 ({$regular}) 的總和。");
                            }
                        },
                    ]),
                TextInput::make('group_vip')
                    ->label('預約組數上限（vip）')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('group_regular')
                    ->label('預約組數上限（一般）')
                    ->required()
                    ->numeric()
                    ->default(1),
                Toggle::make('is_active')
                    ->label('啟用狀態')
                    ->required()
                    ->default(1),
            ])
            ->columns(1);
    }
}
