<?php

namespace App\Filament\Resources\ActivityReservations\Schemas;

use App\Models\ActivitySession;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Database\Eloquent\Model;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class ActivityReservationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('activity_session_id')
                    ->label('活動預約場次')
                    ->relationship(
                        name: 'activitySession',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('activity_id')->orderBy('date')->orderBy('start_time'),
                    )
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->activity->title_zh_TW} - {$record->date} - {$record->start_time} ~ {$record->end_time}")
                    ->required()
                    ->reactive()
                    ->preload(),
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
                        // 1. 取得選擇的 product_id
                        $relatedId = $get('activity_session_id');

                        if (!$relatedId) {
                            return [];
                        }

                        // 2. 根據 ID 查詢資料庫取得關聯資料
                        $activitySession = ActivitySession::find($relatedId);

                        $values = range($activitySession->quota_min, $activitySession->quota_max);

                        // 3. 回傳動態文字
                        return array_combine($values, $values);
                    }),
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
