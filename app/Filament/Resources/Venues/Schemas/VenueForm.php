<?php

namespace App\Filament\Resources\Venues\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;

class VenueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('zone_id')
                    ->relationship(
                        name: 'zone',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query->orderBy('id'),
                    )
//                    ->searchable()
                    ->preload(),
                TextInput::make('code')
                    ->required(),
                TextInput::make('location'),
                Toggle::make('is_active')
                    ->onIcon(Heroicon::Check)
                    ->onColor('success')
                    ->offColor('danger')
                    ->offIcon(Heroicon::XMark)
                    ->default(1)
            ])
            ->columns(1);
    }
}
