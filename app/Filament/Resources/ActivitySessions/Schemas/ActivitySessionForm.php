<?php

namespace App\Filament\Resources\ActivitySessions\Schemas;

use App\Models\Activity;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Tables\Grouping\Group;
use Illuminate\Database\Eloquent\Builder;

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
                        titleAttribute: 'title_zh_TW',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->required()
                    ->reactive()
                    ->preload(),
                DatePicker::make('date')
                    ->label('預約日期')
                    ->required()
                    ->helperText(function (Get $get) {
                        // 1. 取得選擇的 product_id
                        $activityId = $get('activity_id');

                        if (!$activityId) {
                            return '請先選擇活動';
                        }

                        // 2. 根據 ID 查詢資料庫取得關聯資料
                        $activity = Activity::find($activityId);

                        // 3. 回傳動態文字
                        return $activity ? "活動期間：{$activity->activity_start_date} - {$activity->activity_end_date}" : '';
                    })
                    ->maxWidth('sm'),
                Grid::make(6)
                    ->schema([
                        TimePicker::make('start_time')
                            ->label('預約開始時段')
                            ->seconds(false)
                            ->required()
                            ->maxWidth('sm'),
                        TimePicker::make('end_time')
                            ->label('預約結束時段')
                            ->afterOrEqual('start_time')
                            ->seconds(false)
                            ->required()
                            ->maxWidth('sm'),
                        // 這裡就是集中顯示的動態文字
                        TextEntry::make('-')
                            ->label('') // 隱藏 Label 讓它看起來像 helperText
                            ->columnSpanFull()
                            ->state(function (Get $get) {
                                $activityId = $get('activity_id');
                                if (! $activityId) return '請先選擇活動';

                                // 這裡只會查詢一次
                                $activity = Activity::find($activityId);

                                if (! $activity) return '';

                                // 使用 Html 字串或是直接回傳文字
                                return "活動時間：{$activity->activity_start_time} 至 {$activity->activity_end_time}";
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
                    ->default(1),
                TextInput::make('group_vip')
                    ->label('預約組數上限（vip）')
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
