<?php

namespace App\Filament\Resources\Activities\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class ActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('privateSectorProject')
                    ->label('民間參與計畫')
                    ->relationship(
                        name: 'privateSectorProject',
                        titleAttribute: 'project_name_zh_TW',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->requiredWithout('exhibitionOverview')
                    ->preload(),
                Select::make('exhibitionOverview')
                    ->label('展覽概覽')
                    ->relationship(
                        name: 'exhibitionOverview',
                        titleAttribute: 'project_name_zh_TW',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->requiredWithout('privateSectorProject')
                    ->preload(),
                TextInput::make('title_zh_TW')
                    ->label('活動標題（中）')
                    ->required(),
                TextInput::make('title_en')
                    ->label('活動標題（英）')
                    ->required(),
                Grid::make(6)
                    ->schema([
                        DatePicker::make('activity_start_date')
                            ->label('活動開始日期')
                            ->required()
                            ->maxWidth('sm'),
                        DatePicker::make('activity_end_date')
                            ->label('活動結束日期')
                            ->afterOrEqual('activity_start_date')
                            ->required()
                            ->maxWidth('sm'),
                    ]),
                Grid::make(6)
                    ->schema([
                        TimePicker::make('activity_start_time')
                            ->label('活動開始時間')
                            ->seconds(false)
                            ->required()
                            ->maxWidth('sm'),
                        TimePicker::make('activity_end_time')
                            ->label('活動結束時間')
                            ->afterOrEqual('activity_start_time')
                            ->seconds(false)
                            ->required()
                            ->maxWidth('sm'),
                    ]),
                TextInput::make('activity_location_zh_TW')
                    ->label('活動地點（中）')
                    ->required(),
                TextInput::make('activity_location_en')
                    ->label('活動地點（英）')
                    ->required(),
                TextInput::make('map_link')
                    ->label('地圖連結')
                    ->url(),
                RichEditor::make('registration_info_zh_TW')
                    ->label('報名資訊（中）')
                    ->required(),
                RichEditor::make('registration_info_en')
                    ->label('報名資訊（英）')
                    ->required(),
                RichEditor::make('tour_info_zh_TW')
                    ->label('導覽預約資訊（中）')
                    ->required(),
                RichEditor::make('tour_info_en')
                    ->label('導覽預約資訊（英）')
                    ->required(),
                Select::make('activityNatures')
                    ->label('活動性質')
                    ->relationship(
                        name: 'activityNatures',
                        titleAttribute: 'name_zh_TW',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->multiple()
                    ->preload(),
                Select::make('projectTypes')
                    ->label('計畫類型')
                    ->relationship(
                        name: 'projectTypes',
                        titleAttribute: 'name_zh_TW',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->multiple()
                    ->preload(),
                Repeater::make('contents')
                    ->label('活動內容')
                    ->relationship('contents')
                    ->schema([
                        TextInput::make('title_zh_TW')
                            ->label('標題（中）'),
                        TextInput::make('title_en')
                            ->label('標題（英）'),
                        RichEditor::make('content_zh_TW')
                            ->label('內文（中）')
                            ->required(),
                        RichEditor::make('content_en')
                            ->label('內文（英）')
                            ->required(),
                        TextInput::make('item_text_zh_TW')
                            ->label('項目文字（中）'),
                        TextInput::make('item_text_en')
                            ->label('項目文字（英）'),
                        Repeater::make('links')
                            ->label('連結按鈕')
                            ->relationship('links')
                            ->schema([
                                TextInput::make('name_zh_TW')
                                    ->label('連結按鈕（中）')
                                    ->required(),
                                TextInput::make('name_en')
                                    ->label('連結按鈕（英）')
                                    ->required(),
                                TextInput::make('url_zh_TW')
                                    ->label('連結（中）')
                                    ->url()
                                    ->required(),
                                TextInput::make('url_en')
                                    ->label('連結（英）')
                                    ->url()
                                    ->required(),
                            ])
                            ->defaultItems(0)
                            ->grid(3),
                        Repeater::make('images')
                            ->label('輪播圖片')
                            ->relationship('images')
                            ->schema([
                                FileUpload::make('url')
                                    ->label('圖片')
                                    ->disk('public')
                                    ->directory('activity_content-images')
                                    ->visibility('public')
                                    ->image()
                                    ->required(),
                                TextInput::make('alt_text')
                                    ->label('Alt文字'),
                            ])
                            ->orderColumn('sort_order')
                            ->defaultItems(0)
                            ->grid(3),
                    ])
                    ->defaultItems(0)
                    ->grid(1)
                    ->columnSpanFull(),
                Repeater::make('images')
                    ->label('活動相簿')
                    ->relationship('images')
                    ->schema([
                        FileUpload::make('url')
                            ->label('圖片')
                            ->disk('public')
                            ->directory('activity-images')
                            ->visibility('public')
                            ->image()
                            ->required(),
                        TextInput::make('alt_text')
                            ->label('Alt文字'),
                    ])
                    ->orderColumn('sort_order')
                    ->defaultItems(0)
                    ->grid(3)
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('啟用狀態')
                    ->required()
                    ->default(1),
            ])
            ->columns(1);
    }
}
