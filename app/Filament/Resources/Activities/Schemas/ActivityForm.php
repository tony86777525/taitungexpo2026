<?php

namespace App\Filament\Resources\Activities\Schemas;

use App\Models\Project;
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
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('project_id')
                    ->label('計畫')
                    ->relationship(
                        name: 'project',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->display_name}")
                    ->live() // 必須加這行，讓變更即時生效
                    ->afterStateUpdated(function (string|int|null $state, Set $set) {
                        if (! $state) {
                            return;
                        }

                        // 讀取關聯資料
                        $product = Project::find($state);

                        if ($product) {
                            // 將關聯資料設定到其他欄位
                            $set('activity_start_date', $product->project_start_date);
                            $set('activity_end_date', $product->project_end_date);
                            $set('activity_start_time', $product->project_start_time);
                            $set('activity_end_time', $product->project_end_time);
                        }
                    })
                    ->required(),
                TextInput::make('title_tw')
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
                            ->minDate(function (Get $get) {
                                // 取得選中的 project_id
                                $projectId = $get('project_id');
                                if (! $projectId) return null;

                                // 查詢該專案的開始日期
                                return Project::find($projectId)?->project_start_date;
                            })
                            ->maxDate(function (Get $get) {
                                $projectId = $get('project_id');
                                if (! $projectId) return null;

                                // 查詢該專案的結束日期
                                return Project::find($projectId)?->project_end_date;
                            })
                            ->maxWidth('sm'),
                        DatePicker::make('activity_end_date')
                            ->label('活動結束日期')
                            ->afterOrEqual('activity_start_date')
                            ->required()
                            ->minDate(function (Get $get) {
                                // 取得選中的 project_id
                                $projectId = $get('project_id');
                                if (! $projectId) return null;

                                // 查詢該專案的開始日期
                                return Project::find($projectId)?->project_start_date;
                            })
                            ->maxDate(function (Get $get) {
                                $projectId = $get('project_id');
                                if (! $projectId) return null;

                                // 查詢該專案的結束日期
                                return Project::find($projectId)?->project_end_date;
                            })
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
                TextInput::make('activity_location_tw')
                    ->label('活動地點（中）')
                    ->required(),
                TextInput::make('activity_location_en')
                    ->label('活動地點（英）')
                    ->required(),
                TextInput::make('map_link')
                    ->label('地圖連結')
                    ->url(),
                RichEditor::make('registration_info_tw')
                    ->label('報名資訊（中）')
                    ->required(),
                RichEditor::make('registration_info_en')
                    ->label('報名資訊（英）')
                    ->required(),
                RichEditor::make('tour_info_tw')
                    ->label('導覽預約資訊（中）')
                    ->required(),
                RichEditor::make('tour_info_en')
                    ->label('導覽預約資訊（英）')
                    ->required(),
                Select::make('activityNatures')
                    ->label('活動性質')
                    ->relationship(
                        name: 'activityNatures',
                        titleAttribute: 'name_tw',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->multiple()
                    ->preload(),
                Select::make('projectTypes')
                    ->label('計畫類型')
                    ->relationship(
                        name: 'projectTypes',
                        titleAttribute: 'name_tw',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->multiple()
                    ->preload(),
                Repeater::make('contents')
                    ->label('活動內容')
                    ->relationship('contents')
                    ->schema([
                        TextInput::make('title_tw')
                            ->label('標題（中）'),
                        TextInput::make('title_en')
                            ->label('標題（英）'),
                        RichEditor::make('content_tw')
                            ->label('內文（中）')
                            ->required(),
                        RichEditor::make('content_en')
                            ->label('內文（英）')
                            ->required(),
                        TextInput::make('item_text_tw')
                            ->label('項目文字（中）'),
                        TextInput::make('item_text_en')
                            ->label('項目文字（英）'),
                        Repeater::make('links')
                            ->label('連結按鈕')
                            ->relationship('links')
                            ->schema([
                                TextInput::make('name_tw')
                                    ->label('連結按鈕（中）')
                                    ->required(),
                                TextInput::make('name_en')
                                    ->label('連結按鈕（英）')
                                    ->required(),
                                TextInput::make('url_tw')
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
