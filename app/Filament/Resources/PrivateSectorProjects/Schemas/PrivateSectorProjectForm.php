<?php

namespace App\Filament\Resources\PrivateSectorProjects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class PrivateSectorProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('executing_unit_id')
                    ->label('執行單位')
                    ->relationship(
                        name: 'executingUnit',
                        titleAttribute: 'name_zh_TW',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->required()
                    ->allowHtml(),
                TextInput::make('project_number')
                    ->label('計畫編號')
                    ->required(),
                TextInput::make('project_name_zh_TW')
                    ->label('計畫名稱（中）')
                    ->required(),
                TextInput::make('project_name_en')
                    ->label('計畫名稱（英）')
                    ->required(),
                Grid::make(6)
                    ->schema([
                        DatePicker::make('project_start_date')
                            ->label('執行開始日期')
                            ->required()
                            ->maxWidth('sm'),
                        DatePicker::make('project_end_date')
                            ->label('執行結束日期')
                            ->afterOrEqual('project_start_date')
                            ->required()
                            ->maxWidth('sm'),
                    ]),
                TextInput::make('project_location_zh_TW')
                    ->label('地點（中）')
                    ->required(),
                TextInput::make('project_location_en')
                    ->label('地點（英）')
                    ->required(),
                TextInput::make('map_link')
                    ->label('地圖連結')
                    ->url(),
                Select::make('projectCategories')
                    ->label('計劃性質')
                    ->relationship(
                        name: 'projectCategories',
                        titleAttribute: 'name_zh_TW',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->multiple()
                    ->preload(),
                Select::make('projectNatures')
                    ->label('計劃性質')
                    ->relationship(
                        name: 'projectNatures',
                        titleAttribute: 'name_zh_TW',
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
                            ->directory('private_sector_project-feature_images')
                            ->visibility('public')
                            ->image(),
                        TextInput::make('alt_text')
                            ->label('Alt文字'),
                    ])
                    ->orderColumn('sort_order')
                    ->defaultItems(0)
                    ->grid(3)
                    ->columnSpanFull(),
                FileUpload::make('thumbnail_url')
                    ->label('縮略圖')
                    ->disk('public')
                    ->directory('private_sector_project-thumbnails')
                    ->visibility('public')
                    ->image()
                    ->required(),
                Repeater::make('contents')
                    ->label('計畫內容')
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
                                    ->directory('private_sector_project_content-images')
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
                            ->directory('private_sector_project-images')
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
                        titleAttribute: 'name_zh_TW',
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
