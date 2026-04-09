<?php

namespace App\Filament\Resources\HomeBanners\Schemas;

use App\Enums\MediaType;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;
use Filament\Schemas\Components\Utilities\Get;

class HomeBannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('media_type')
                    ->label('類型')
                    ->options(MediaType::class) // 直接傳入類名，Filament 會自動解析 label
                    ->default(MediaType::IMAGE->value)
                    ->live()
                    ->required(),
                FileUpload::make('media_url')
                    ->label('上傳影片')
                    ->visible(fn (Get $get) => $get('media_type') === MediaType::VIDEO)
                    ->disk('public')
                    ->directory('home-banner-media')
                    ->visibility('public')
                    ->acceptedFileTypes(['video/mp4', 'video/webm'])
                    ->validationMessages([
                        'mimetypes' => '僅支援 MP4/ＷebM 格式影片。',
                    ])
                    ->maxSize(102400)
                    ->placeholder('僅支援 MP4/ＷebM 格式<br>比例為 16:9')
                    ->required(),
                FileUpload::make('media_url')
                    ->label('上傳圖片')
                    ->visible(fn (Get $get) => $get('media_type') === MediaType::IMAGE)
                    ->disk('public')
                    ->directory('home-banner-media')
                    ->visibility('public')
                    ->image()
                    ->acceptedFileTypes(['image/webp'])
                    ->rules([
                        Rule::dimensions()
                            ->ratio(16 / 9),
                    ])
                    ->validationMessages([
                        'dimensions' => '圖片比例必須為 16:9。',
                        'mimetypes' => '僅支援 WebP 格式圖片。',
                    ])
                    ->placeholder('僅支援 WebP 格式<br>比例為 16:9')
                    ->required(),
                TextInput::make('name_tw')
                    ->label('文字（中）'),
                TextInput::make('name_en')
                    ->label('文字（英）'),
                TextInput::make('link')
                    ->label('連結')
                    ->url(),
                Toggle::make('is_active')
                    ->label('啟用狀態')
                    ->required()
                    ->default(1),
            ])
            ->columns(1);
    }
}
