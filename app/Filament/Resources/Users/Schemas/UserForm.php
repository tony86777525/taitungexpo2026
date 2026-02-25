<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
//                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state)) // 自動雜湊
                    ->dehydrated(fn ($state) => filled($state)) // 僅在填寫時更新
                    ->required(fn (string $operation): bool => $operation === 'create') // 僅在建立時必填
                    ->maxLength(255),
                Select::make('roles')
                    ->label('身份')
                    ->relationship(
                        name: 'roles',
                        titleAttribute: 'name_tw',
                        modifyQueryUsing: fn (Builder $query) => $query->whereNotNull('name_tw')->orderBy('id'),
                    )
                    ->preload()
                    ->live()
                    ->required(),
                Select::make('project')
                    ->label('場館')
                    ->relationship(
                        name: 'project',
                        titleAttribute: 'project_name_tw',
                    )
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->venue_number}")
                    ->preload()
                    ->required(fn (Get $get): bool => $get('roles') === 4)
                    ->disabled(fn (Get $get): bool => $get('roles') !== 4),
            ])
            ->columns(1);
    }
}
