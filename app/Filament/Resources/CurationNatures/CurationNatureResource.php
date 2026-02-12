<?php

namespace App\Filament\Resources\CurationNatures;

use App\Filament\Resources\CurationNatures\Pages\CreateCurationNature;
use App\Filament\Resources\CurationNatures\Pages\EditCurationNature;
use App\Filament\Resources\CurationNatures\Pages\ListCurationNatures;
use App\Filament\Resources\CurationNatures\Pages\ViewCurationNature;
use App\Filament\Resources\CurationNatures\Schemas\CurationNatureForm;
use App\Filament\Resources\CurationNatures\Schemas\CurationNatureInfolist;
use App\Filament\Resources\CurationNatures\Tables\CurationNaturesTable;
use App\Models\CurationNature;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CurationNatureResource extends Resource
{
    protected static ?string $model = CurationNature::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = '策展議題';

    protected static ?string $modelLabel = '策展議題';

    protected static UnitEnum|string|null $navigationGroup = 'Projects';

    protected static ?int $navigationSort = 150;

    public static function form(Schema $schema): Schema
    {
        return CurationNatureForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CurationNatureInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CurationNaturesTable::configure($table);
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
            'index' => ListCurationNatures::route('/'),
            'create' => CreateCurationNature::route('/create'),
            'view' => ViewCurationNature::route('/{record}'),
            'edit' => EditCurationNature::route('/{record}/edit'),
        ];
    }
}
