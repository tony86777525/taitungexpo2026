<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
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
                TextInput::make('title_tw')
                    ->label('消息標題（中）')
                    ->required(),
                TextInput::make('title_en')
                    ->label('消息標題（英）')
                    ->required(),
                DatePicker::make('published_at')
                    ->label('日期')
                    ->required()
                    ->maxWidth('sm'),
                Select::make('tags')
                    ->label('消息分類')
                    ->relationship(
                        name: 'tags',
                        titleAttribute: 'name_tw',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->multiple()
                    ->preload()
                    ->maxItems(1),
                FileUpload::make('thumbnail_url')
                    ->label('縮略圖')
                    ->disk('public')
                    ->directory('article-thumbnails')
                    ->visibility('public')
                    ->image()
                    ->required(),
                Repeater::make('contents')
                    ->label('消息內容')
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
                                    ->directory('article_content-images')
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
                    ->label('相簿')
                    ->relationship('images')
                    ->schema([
                        FileUpload::make('url')
                            ->label('圖片')
                            ->disk('public')
                            ->directory('article-images')
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
