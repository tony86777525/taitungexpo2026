<?php

namespace App\Filament\Resources\ActivityReservationVips\Schemas;

use App\Enums\ActivitySessionType;
use App\Enums\ContactSex;
use App\Models\Project;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class ActivityReservationVipForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 場次資料
                Group::make()
                    ->relationship('activitySession')
                    ->statePath('activitySession')
                    ->schema([
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
                        TextInput::make('group_max')
                            ->label('可預約總組數')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->default(1),
                    ]),

                // 預約資料
                TextInput::make('contact_group_name')
                    ->label('預約團體名稱')
                    ->required(),
                Grid::make(['default' => 4])
                    ->schema([
                        TextInput::make('contact_name')
                            ->label('聯絡人')
                            ->required(),
                        Radio::make('contact_sex')
                            ->label('聯絡人性別')
                            ->options(ContactSex::options())
                            ->default(ContactSex::MAN)
                            ->required()
                            ->inline()
                            ->columnSpan(1),
                    ]),
                TextInput::make('contact_phone')
                    ->label('聯絡人電話')
                    ->required(),
                TextInput::make('contact_email')
                    ->label('聯絡信箱')
                    ->required(),
                TextInput::make('participants_quota')
                    ->label('預計參與人數')
                    ->integer()
                    ->minValue(1)
                    ->default(1)
                    ->required(),
                Textarea::make('notes')
                    ->label('預約備註（選填）'),

                TextEntry::make('divider')
                    ->hiddenLabel()
                    ->state(new HtmlString('<hr style="border-top: 1px solid #e5e7eb; margin: 20px 0;">')),


                TextInput::make('guide_leader_name')
                    ->label('導覽領隊人')
                    ->required(),
                TextInput::make('guide_leader_phone')
                    ->label('領隊人聯絡電話')
                    ->required(),
                TextInput::make('guide_leader_email')
                    ->label('領隊人聯絡信箱')
                    ->required(),

                // 場次資料
                Group::make()
                    ->relationship('activitySession')
                    ->statePath('activitySession')
                    ->schema([
                        Textarea::make('tour_venue_note')
                            ->label('預約注意事項（選填）')
                            ->helperText('※提供 VIP 團體之相關補充資訊，將顯示於預約確認信中，並同步副本寄送至所選場館及領隊人留存。'),
                        Hidden::make('is_active')
                            ->default(1),
                    ]),

                // 預約資料
                Textarea::make('vip_staff_only_notes')
                    ->label('內部備註（選填）')
                    ->helperText('※內部筆記欄，僅所選場館及貴賓管理團隊可視'),
                Select::make('status')
                    ->label('狀態')
                    ->options([
                        1 => '已核准',
                    ])
                    ->required()
                    ->default(1),
                TextEntry::make('submit_note')
                    ->hiddenLabel()
                    ->state(new HtmlString('<span class="text-red-600 dark:text-red-400 font-bold">※建議於登記預約時，先行與預計參訪場館確認參訪計畫，以利各場館提前安排。</span>')),
            ])
            ->columns(1);
    }
}
