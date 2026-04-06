<?php

namespace App\Filament\Resources\ProjectTypes;

use App\Filament\Resources\ProjectTypes\Pages\CreateProjectType;
use App\Filament\Resources\ProjectTypes\Pages\EditProjectType;
use App\Filament\Resources\ProjectTypes\Pages\ListProjectTypes;
use App\Filament\Resources\ProjectTypes\Pages\ViewProjectType;
use App\Filament\Resources\ProjectTypes\Schemas\ProjectTypeForm;
use App\Filament\Resources\ProjectTypes\Schemas\ProjectTypeInfolist;
use App\Filament\Resources\ProjectTypes\Tables\ProjectTypesTable;
use App\Models\ProjectType;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProjectTypeResource extends Resource
{
    protected static ?string $model = ProjectType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $modelLabel = '計畫類型';

    protected static UnitEnum|string|null $navigationGroup = 'Activities';

    protected static ?string $recordTitleAttribute = 'ProjectType';

    public static function form(Schema $schema): Schema
    {
        return ProjectTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProjectTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectTypesTable::configure($table);
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
            'index' => ListProjectTypes::route('/'),
            'create' => CreateProjectType::route('/create'),
            'view' => ViewProjectType::route('/{record}'),
            'edit' => EditProjectType::route('/{record}/edit'),
        ];
    }
}
