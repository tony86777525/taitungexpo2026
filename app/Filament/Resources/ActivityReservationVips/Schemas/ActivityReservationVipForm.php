<?php

namespace App\Filament\Resources\ActivityReservationVips\Schemas;

use App\Models\ActivitySessionVip;
use App\Models\User;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Utilities\Get;
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
                Select::make('activity_session_id')
                    ->label('團體導覽預約場次')
                    ->relationship(
                        name: 'activitySessionVip',
                        modifyQueryUsing: fn (Builder $query) => $query
                            ->with([
                                'project',
                                'project.zone',
                            ])
                            ->withCount([
                                'bookedActivityReservations',
                            ])
                    )
                    ->searchable()
                    ->preload()
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->display_option_title}")
                    ->required()
                    ->live(),
                TextInput::make('guide_leader_name')
                    ->label('導覽領隊人')
                    ->required(),
                TextInput::make('guide_leader_contact')
                    ->label('領隊人聯絡方式')
                    ->required(),
                TextInput::make('contact_name')
                    ->label('vip團體聯絡人')
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
                        $activitySession = ActivitySessionVip::find($relatedId);

                        $values = range($activitySession->quota_min, $activitySession->quota_max);

                        // 3. 回傳動態文字
                        return array_combine($values, $values);
                    })
                    ->required(),
                Textarea::make('notes')
                    ->label('備註（選填）'),
//                Textarea::make('status_notes')
//                    ->label('未通過原因（選填）'),
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
