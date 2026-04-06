<?php

namespace App\Filament\Resources\ParticipationTypes;

use App\Filament\Resources\ParticipationTypes\Pages\CreateParticipationType;
use App\Filament\Resources\ParticipationTypes\Pages\EditParticipationType;
use App\Filament\Resources\ParticipationTypes\Pages\ListParticipationTypes;
use App\Filament\Resources\ParticipationTypes\Pages\ViewParticipationType;
use App\Filament\Resources\ParticipationTypes\Schemas\ParticipationTypeForm;
use App\Filament\Resources\ParticipationTypes\Schemas\ParticipationTypeInfolist;
use App\Filament\Resources\ParticipationTypes\Tables\ParticipationTypesTable;
use App\Models\ParticipationType;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ParticipationTypeResource extends Resource
{
    protected static ?string $model = ParticipationType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

//    protected static ?string $recordTitleAttribute = 'ParticipationType';

    protected static ?string $modelLabel = '報名資訊';

    protected static UnitEnum|string|null $navigationGroup = 'Activities';

    public static function form(Schema $schema): Schema
    {
        return ParticipationTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ParticipationTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ParticipationTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListParticipationTypes::route('/'),
            'create' => CreateParticipationType::route('/create'),
            'view' => ViewParticipationType::route('/{record}'),
            'edit' => EditParticipationType::route('/{record}/edit'),
        ];
    }
}
