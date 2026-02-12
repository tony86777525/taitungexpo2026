<?php

namespace App\Filament\Resources\CurationNatures\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CurationNatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_tw'),
                TextInput::make('name_en'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
