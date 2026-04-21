<?php

namespace App\Filament\Resources\ActivityReservationNormals\Schemas;

use App\Enums\ContactSex;
use App\Models\ActivitySessionNormal;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class ActivityReservationNormalForm
{
    public static function configure(Schema $schema): Schema
    {
        $currentUser = auth()->user();

        return $schema
            ->components([
                Select::make('activity_session_id')
                    ->label('團體導覽預約場次')
                    ->relationship(
                        name: 'activitySessionNormal',
                        modifyQueryUsing: fn (Builder $query) => $query
                            ->with([
                                'project',
                                'project.zone',
                            ])
                            ->withCount([
                                'bookedActivityReservations',
                            ])
                            ->when($currentUser->hasRole('venue_reservation_system_admin') && !empty($currentUser->project_id), function ($query) use ($currentUser) {
                                $query
                                    ->where('project_id', $currentUser->project_id);
                            })
                    )
                    ->searchable()
                    ->preload()
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->display_option_title}")
                    ->required()
                    ->live(),
                Grid::make([
                    'default' => 4, // 將這一列分成 4 格
                ])
                    ->schema([
                        TextInput::make('contact_name')
                            ->label('聯絡人姓名')
                            ->required(),
                        Radio::make('contact_sex')
                            ->label('聯絡人性別')
                            ->options(ContactSex::options())
                            ->required()
                            ->inline()
                            ->columnSpan(1),
                    ]),
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
                        $activitySession = ActivitySessionNormal::find($relatedId);

                        $values = range($activitySession->quota_min, $activitySession->quota_max);

                        // 3. 回傳動態文字
                        return array_combine($values, $values);
                    })
                    ->required(),
                Textarea::make('notes')
                    ->label('備註（選填）'),
                Textarea::make('status_notes')
                    ->label('未通過原因（選填）'),
                Select::make('status')
                    ->label('狀態')
                    ->options([
                        1 => '已核准',
                        2 => '待審核',
                        0 => '已取消',
                    ])
                    ->required()
                    ->default(1),
                TextEntry::make('submit_note')
                    ->hiddenLabel()
                    ->state(new HtmlString('<span class="text-red-600 dark:text-red-400 font-bold">※不會寄信給民眾/場館。</span>')),
            ])
            ->columns(1);
    }
}
