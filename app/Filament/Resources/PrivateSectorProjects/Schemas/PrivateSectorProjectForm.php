<?php

namespace App\Filament\Resources\PrivateSectorProjects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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
                    ->allowHtml(),
                TextInput::make('project_name_zh_TW')
                    ->label('計畫名稱（中）')
                    ->required(),
                TextInput::make('project_name_en')
                    ->label('計畫名稱（英）')
                    ->required(),
                DatePicker::make('project_date')
                    ->label('執行日期')
                    ->required()
                    ->maxWidth('sm'),
                TextInput::make('project_location_zh_TW')
                    ->label('地點（中）'),
                TextInput::make('project_location_en')
                    ->label('地點（英）'),
                TextInput::make('map_link')
                    ->label('地圖連結'),
                FileUpload::make('featured_image_url')
                    ->label('主視覺')
                    ->disk('public')
                    ->directory('private_sector_project-featured_image')
                    ->visibility('public')
                    ->image()
                    ->required(),
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
                        TextInput::make('title')
                            ->label('標題')
                            ->required(),
                        RichEditor::make('content')
                            ->label('內文')
                            ->required(),
                        Repeater::make('links')
                            ->label('連結')
                            ->relationship('links')
                            ->schema([
                                TextInput::make('名稱')
                                    ->label('name')
                                    ->required(),
                                TextInput::make('網址')
                                    ->label('url')
                                    ->required(),
                            ])
                            ->defaultItems(0)
                            ->grid(3),
                        Repeater::make('images')
                            ->label('計畫相簿')
                            ->relationship('images')
                            ->schema([
                                FileUpload::make('url')
                                    ->label('Image')
                                    ->disk('public')
                                    ->directory('private_sector_project_content-images')
                                    ->visibility('public')
                                    ->image()
                                    ->required(),
                                TextInput::make('alt_text')
                                    ->label('Alt Text')
                                    ->nullable(),
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
                            ->label('Image')
                            ->disk('public')
                            ->directory('private_sector_project-images')
                            ->visibility('public')
                            ->image()
                            ->required(),
                        TextInput::make('alt_text')
                            ->label('Alt Text')
                            ->nullable(),
                    ])
                    ->orderColumn('sort_order')
                    ->defaultItems(0)
                    ->grid(1)
                    ->columnSpanFull(),
                Select::make('participatingUnits')
                    ->label('單位')
                    ->relationship(
                        name: 'participatingUnits',
                        titleAttribute: 'name_zh_TW',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->multiple()
                    ->preload(),
                Toggle::make('is_active')
                    ->label('開關')
                    ->required()
                    ->default(1),
            ])
            ->columns(1);
    }
}
