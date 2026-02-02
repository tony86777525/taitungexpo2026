<?php

namespace App\Filament\Resources\ProjectNatures;

use App\Filament\Resources\ProjectNatures\Pages\CreateProjectNature;
use App\Filament\Resources\ProjectNatures\Pages\EditProjectNature;
use App\Filament\Resources\ProjectNatures\Pages\ListProjectNatures;
use App\Filament\Resources\ProjectNatures\Pages\ViewProjectNature;
use App\Filament\Resources\ProjectNatures\Schemas\ProjectNatureForm;
use App\Filament\Resources\ProjectNatures\Schemas\ProjectNatureInfolist;
use App\Filament\Resources\ProjectNatures\Tables\ProjectNaturesTable;
use App\Models\ProjectNature;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProjectNatureResource extends Resource
{
    protected static ?string $model = ProjectNature::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = '計畫性質';

    protected static ?string $modelLabel = '計畫性質';

    protected static UnitEnum|string|null $navigationGroup = 'Projects';

    public static function form(Schema $schema): Schema
    {
        return ProjectNatureForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProjectNatureInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectNaturesTable::configure($table);
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
            'index' => ListProjectNatures::route('/'),
            'create' => CreateProjectNature::route('/create'),
            'view' => ViewProjectNature::route('/{record}'),
            'edit' => EditProjectNature::route('/{record}/edit'),
        ];
    }
}
