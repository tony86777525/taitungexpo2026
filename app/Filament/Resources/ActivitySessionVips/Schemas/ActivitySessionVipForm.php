<?php

namespace App\Filament\Resources\ActivitySessionVips\Schemas;

use App\Enums\ActivitySessionType;
use App\Models\Project;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActivitySessionVipForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('type')
                    ->default(ActivitySessionType::VIP),
                Select::make('project_id')
                    ->label('計畫')
                    ->relationship(
                        name: 'project',
                        titleAttribute: 'id',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->display_type_and_venue_number_name}")
                    ->live()
                    ->afterStateUpdated(function (string|int|null $state, Set $set) {
                        if (! $state) {
                            return;
                        }

                        // 讀取關聯資料
                        $project = Project::find($state);

                        if ($project) {
                            // 將關聯資料設定到其他欄位
                            $set('start_time', $project->project_start_time);
                            $set('end_time', $project->project_end_time);
                        }
                    })
                    ->required(),
                DatePicker::make('date')
                    ->label('場次日期')
                    ->required()
                    ->minDate(function (Get $get) {
                        $projectId = $get('project_id');
                        if (!$projectId) return null;

                        return Project::find($projectId)?->project_start_date;
                    })
                    ->maxDate(function (Get $get) {
                        $projectId = $get('project_id');
                        if (! $projectId) return null;

                        return Project::find($projectId)?->project_end_date;
                    })
                    ->maxWidth('sm'),
                Section::make(function (Get $get) {
                    $projectId = $get('project_id');
                    if (! $projectId) return '選擇場次時段（請先選擇計畫）';

                    // 這裡只會查詢一次
                    $project = Project::find($projectId);

                    if (!$project) return '';

                    return "選擇場次時段（場次可選時段：{$project->display_time_range}）";
                })
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
                    ])
                    ->columns(6),
                Grid::make(6)
                    ->schema([
                        TextInput::make('quota_min')
                            ->label('建議人數下限')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->default(25),
                        TextInput::make('quota_max')
                            ->label('建議人數上限')
                            ->afterOrEqual('quota_min')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->default(40),
                    ]),
                TextInput::make('group_max')
                    ->label('可預約總組數')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->default(1),
                Textarea::make('tour_venue_note')
                    ->label('團體導覽場館備註')
                    ->required()
                    ->helperText('(※提供各場館導覽預約相關補充資訊，將顯示於報名頁面及確認信中)'),
                TextInput::make('contact_name')
                    ->label('單位/聯絡人')
                    ->required(),
                TextInput::make('contact_phone')
                    ->label('聯絡電話')
                    ->required(),
                TextInput::make('contact_email')
                    ->label('聯絡信箱')
                    ->required(),
                Toggle::make('is_active')
                    ->label('啟用狀態')
                    ->required()
                    ->default(1),
            ])
            ->columns(1);
    }
}
