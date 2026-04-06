<?php

namespace App\Filament\Resources\ParticipationTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class ParticipationTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_tw')
                    ->label('報名資訊（中）')
                    ->required(),
                TextInput::make('name_en')
                    ->label('報名資訊（英）')
                    ->required(),
                TextInput::make('link_name_tw')
                    ->label('報名連結文字（中）'),
                TextInput::make('link_name_en')
                    ->label('報名連結文字（英）')
                    ->required(fn (Get $get): bool => filled($get('link_name_tw'))),
                Toggle::make('is_active')
                    ->label('啟用狀態')
                    ->required()
                    ->default(1),
            ])
            ->columns(1);
    }
}
