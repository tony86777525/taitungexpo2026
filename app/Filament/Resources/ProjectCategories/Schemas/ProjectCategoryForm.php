<?php

namespace App\Filament\Resources\ProjectCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_tw')
                    ->label('計畫性質（中）')
                    ->required(),
                TextInput::make('name_en')
                    ->label('計畫性質（英）')
                    ->required(),
                Toggle::make('is_active')
                    ->label('啟用狀態')
                    ->required()
                    ->default(1),
            ])
            ->columns(1);
    }
}
