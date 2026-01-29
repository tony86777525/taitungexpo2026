<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DateTimePicker::make('published_at')
                    ->required()
                    ->maxWidth('sm'),
                FileUpload::make('featured_image_url')
                    ->disk('public')
                    ->directory('article-featured_image')
                    ->visibility('public')
                    ->image()
                    ->required(),
                FileUpload::make('thumbnail_url')
                    ->disk('public')
                    ->directory('article-thumbnails')
                    ->visibility('public')
                    ->image()
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Repeater::make('contents')
                    ->relationship('contents')
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->required(),
                        TextInput::make('content')
                            ->label('Content')
                            ->required(),
                        Repeater::make('links')
                            ->relationship('links')
                            ->label('links')
                            ->schema([
                                TextInput::make('name')
                                    ->label('name')
                                    ->required(),
                                TextInput::make('url')
                                    ->label('url')
                                    ->required(),
                            ])
                            ->defaultItems(0)
                            ->grid(3),
                        Repeater::make('images')
                            ->relationship('images')
                            ->label('images')
                            ->schema([
                                FileUpload::make('url')
                                    ->label('Image')
                                    ->disk('public')
                                    ->directory('article-content-images')
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
                Select::make('tags')
                    ->relationship(
                        name: 'tags',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->multiple()
                    ->preload()
                    ->maxItems(3),
                Repeater::make('images')
                    ->relationship('images')
                    ->schema([
                        FileUpload::make('url')
                            ->label('Image')
                            ->disk('public')
                            ->directory('article-images')
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
                Toggle::make('is_active')
                    ->required()
                    ->default(1),
            ])
            ->columns(1);
    }
}
