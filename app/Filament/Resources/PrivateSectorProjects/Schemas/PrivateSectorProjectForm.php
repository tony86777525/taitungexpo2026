<?php

namespace App\Filament\Resources\PrivateSectorProjects\Schemas;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use App\Enums\ProjectType;

class PrivateSectorProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('type')
                    ->default(ProjectType::PRIVATE_SECTOR_PROJECT->value),
                Select::make('zone_id')
                    ->label('展區')
                    ->relationship(
                        name: 'zone',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->display_name}")
                    ->required()
                    ->allowHtml(),
                Select::make('executing_unit_id')
                    ->label('執行單位')
                    ->relationship(
                        name: 'executingUnit',
                        titleAttribute: 'name_tw',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->required()
                    ->allowHtml(),
                TextInput::make('project_number')
                    ->label('計畫編號')
                    ->required(),
                TextInput::make('project_name_tw')
                    ->label('計畫名稱（中）')
                    ->required(),
                TextInput::make('project_name_en')
                    ->label('計畫名稱（英）')
                    ->required(),
                Grid::make(6)
                    ->schema([
                        DatePicker::make('project_start_date')
                            ->label('計畫開始日期')
                            ->required()
                            ->maxWidth('sm'),
                        DatePicker::make('project_end_date')
                            ->label('計畫結束日期')
                            ->afterOrEqual('project_start_date')
                            ->required()
                            ->maxWidth('sm'),
                    ]),
                TextInput::make('project_location_tw')
                    ->label('地點（中）')
                    ->required(),
                TextInput::make('project_location_en')
                    ->label('地點（英）')
                    ->required(),
                TextInput::make('map_link')
                    ->label('地圖連結')
                    ->url(),
                Select::make('projectCategories')
                    ->label('計劃分類')
                    ->relationship(
                        name: 'projectCategories',
                        titleAttribute: 'name_tw',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->multiple()
                    ->preload(),
                Select::make('projectNatures')
                    ->label('計劃性質')
                    ->relationship(
                        name: 'projectNatures',
                        titleAttribute: 'name_tw',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->multiple()
                    ->preload(),
                Repeater::make('featured_images')
                    ->label('主視覺')
                    ->relationship('featuredImages')
                    ->schema([
                        FileUpload::make('url')
                            ->label('圖片')
                            ->disk('public')
                            ->directory('project-feature_images')
                            ->visibility('public')
                            ->image(),
                        TextInput::make('alt_text')
                            ->label('Alt文字'),
                    ])
                    ->orderColumn('sort_order')
                    ->defaultItems(0)
                    ->maxItems(5)
                    ->grid(3)
                    ->columnSpanFull(),
                FileUpload::make('thumbnail_url')
                    ->label('縮略圖')
                    ->disk('public')
                    ->directory('project-thumbnails')
                    ->visibility('public')
                    ->image()
                    ->required(),
                Repeater::make('contents')
                    ->label('計畫內容')
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
                                    ->directory('project_content-images')
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
                    ->label('計畫相簿')
                    ->relationship('images')
                    ->schema([
                        FileUpload::make('url')
                            ->label('圖片')
                            ->disk('public')
                            ->directory('project-images')
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
                Select::make('units')
                    ->label('單位')
                    ->relationship(
                        name: 'units',
                        titleAttribute: 'name_tw',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->multiple()
                    ->preload(),
                Toggle::make('is_active')
                    ->label('啟用狀態')
                    ->required()
                    ->default(1),
            ])
            ->columns(1);
    }
}
