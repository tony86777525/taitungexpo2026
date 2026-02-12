<?php

namespace App\Filament\Resources\Units\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UnitForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_tw')
                    ->label('單位名稱（中）')
                    ->required(),
                TextInput::make('name_en')
                    ->label('單位名稱（英）')
                    ->required(),
                FileUpload::make('image_url')
                    ->label('單位圖檔')
                    ->disk('public')
                    ->directory('unit_image')
                    ->visibility('public')
                    ->image()
                    ->required(),
                TextInput::make('link')
                    ->label('單位連結')
                    ->url(),
                Toggle::make('is_active')
                    ->label('啟用狀態')
                    ->required()
                    ->default(1),
            ])
            ->columns(1);
    }
}
