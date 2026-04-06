<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rule;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_tw')
                    ->label('品牌名稱（中）')
                    ->required(),
                TextInput::make('name_en')
                    ->label('品牌名稱（英）')
                    ->required(),
                TextInput::make('url')
                    ->label('品牌連結')
                    ->url(),
                RichEditor::make('description_tw')
                    ->label('品牌介紹（中）')
                    ->extraInputAttributes(['class' => 'custom-rich-editor'])
                    ->toolbarButtons([
                        ['bold', 'italic', 'underline', 'strike', 'link'],
                        ['alignStart', 'alignCenter', 'alignEnd'],
                        ['bulletList', 'orderedList'],
                        ['undo', 'redo'],
                    ])
                    ->required(),
                RichEditor::make('description_en')
                    ->label('品牌介紹（英）')
                    ->extraInputAttributes(['class' => 'custom-rich-editor'])
                    ->toolbarButtons([
                        ['bold', 'italic', 'underline', 'strike', 'link'],
                        ['alignStart', 'alignCenter', 'alignEnd'],
                        ['bulletList', 'orderedList'],
                        ['undo', 'redo'],
                    ])
                    ->required(),
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
                Select::make('tags')
                    ->label('品牌分類')
                    ->relationship(
                        name: 'tags',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->display_all_name)
                    ->multiple()
                    ->preload()
                    ->maxItems(1),
                FileUpload::make('thumbnail_url')
                    ->label('縮略圖')
                    ->disk('public')
                    ->directory('brand-thumbnails')
                    ->visibility('public')
                    ->image()
                    ->acceptedFileTypes(['image/webp'])
                    ->rules([
                        Rule::dimensions()
                            ->maxWidth(706)
                            ->maxHeight(706)
                            ->ratio(1),
                    ])
                    ->validationMessages([
                        'dimensions' => '圖片尺寸必須為 706x706 px以內 且比例為 1:1。',
                        'mimetypes' => '僅支援 WebP 格式圖片。',
                    ])
                    ->placeholder('僅支援 WebP 格式<br>尺寸必須為 706x706 px以內<br>比例為 1:1')
                    ->required(),
                Repeater::make('contents')
                    ->label('商品介紹')
                    ->relationship('contents')
                    ->schema([
                        TextInput::make('title_tw')
                            ->label('標題（中）'),
                        TextInput::make('title_en')
                            ->label('標題（英）'),
                        RichEditor::make('content_tw')
                            ->label('內文（中）')
                            ->extraInputAttributes(['class' => 'custom-rich-editor'])
                            ->toolbarButtons([
                                ['bold', 'italic', 'underline', 'strike', 'link'],
                                ['alignStart', 'alignCenter', 'alignEnd'],
                                ['bulletList', 'orderedList'],
                                ['undo', 'redo'],
                            ])
                            ->required(),
                        RichEditor::make('content_en')
                            ->label('內文（英）')
                            ->extraInputAttributes(['class' => 'custom-rich-editor'])
                            ->toolbarButtons([
                                ['bold', 'italic', 'underline', 'strike', 'link'],
                                ['alignStart', 'alignCenter', 'alignEnd'],
                                ['bulletList', 'orderedList'],
                                ['undo', 'redo'],
                            ])
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
                                    ->directory('brand_content-images')
                                    ->visibility('public')
                                    ->image()
                                    ->acceptedFileTypes(['image/webp'])
                                    ->rules([
                                        Rule::dimensions()
                                            ->maxWidth(968)
                                            ->maxHeight(726),
//                                            ->ratio(4/3),
                                    ])
                                    ->validationMessages([
                                        'dimensions' => '圖片尺寸必須為 968x726 px以內 且比例為 4:3。',
                                        'mimetypes' => '僅支援 WebP 格式圖片。',
                                    ])
                                    ->placeholder('僅支援 WebP 格式<br>尺寸必須為 968x726 px以內<br>比例為 4:3')
                                    ->required(),
                                TextInput::make('alt_text')
                                    ->label('Alt文字'),
                            ])
                            ->orderColumn('sort_order')
                            ->defaultItems(0)
                            ->maxItems(2)
                            ->grid(2),
                    ])
                    ->defaultItems(0)
                    ->grid(1)
                    ->columnSpanFull(),
                Repeater::make('images')
                    ->label('品牌相簿')
                    ->relationship('images')
                    ->schema([
                        FileUpload::make('url')
                            ->label('圖片')
                            ->disk('public')
                            ->directory('brand-images')
                            ->visibility('public')
                            ->image()
                            ->acceptedFileTypes(['image/webp'])
                            ->validationMessages([
                                'mimetypes' => '僅支援 WebP 格式圖片。',
                            ])
                            ->placeholder('僅支援 WebP 格式<br>尺寸建議為 626x469 px<br>比例為 4:3')
                            ->required(),
                        TextInput::make('alt_text')
                            ->label('Alt文字'),
                    ])
                    ->orderColumn('sort_order')
                    ->defaultItems(0)
                    ->maxItems(10)
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
