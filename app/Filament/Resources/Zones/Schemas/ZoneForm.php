<?php

namespace App\Filament\Resources\Zones\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ZoneForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->label('展區代碼')
                    ->required(),
                TextInput::make('name_tw')
                    ->label('展區名稱（中）')
                    ->required(),
                TextInput::make('name_en')
                    ->label('展區名稱（英）')
                    ->required(),
                Toggle::make('is_active')
                    ->label('啟用狀態')
                    ->required()
                    ->default(1),
            ])
            ->columns(1);
    }
}
