<?php

namespace App\Filament\Resources\Tags\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_zh_TW')
                    ->label('消息分類（中）')
                    ->required(),
                TextInput::make('name_en')
                    ->label('消息分類（英）')
                    ->required(),
                Toggle::make('is_active')
                    ->label('啟用狀態')
                    ->required()
                    ->default(1),
            ])
            ->columns(1);
    }
}
