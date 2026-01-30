<?php

namespace App\Filament\Resources\PrivateSectorProjects;

use App\Filament\Resources\PrivateSectorProjects\Pages\CreatePrivateSectorProject;
use App\Filament\Resources\PrivateSectorProjects\Pages\EditPrivateSectorProject;
use App\Filament\Resources\PrivateSectorProjects\Pages\ListPrivateSectorProjects;
use App\Filament\Resources\PrivateSectorProjects\Pages\ViewPrivateSectorProject;
use App\Filament\Resources\PrivateSectorProjects\Schemas\PrivateSectorProjectForm;
use App\Filament\Resources\PrivateSectorProjects\Schemas\PrivateSectorProjectInfolist;
use App\Filament\Resources\PrivateSectorProjects\Tables\PrivateSectorProjectsTable;
use App\Models\PrivateSectorProject;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PrivateSectorProjectResource extends Resource
{
    protected static ?string $model = PrivateSectorProject::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = '民間參與計畫';

    protected static ?string $modelLabel = '民間參與計畫';

    protected static UnitEnum|string|null $navigationGroup = 'Projects';

    public static function form(Schema $schema): Schema
    {
        return PrivateSectorProjectForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PrivateSectorProjectInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PrivateSectorProjectsTable::configure($table);
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
            'index' => ListPrivateSectorProjects::route('/'),
            'create' => CreatePrivateSectorProject::route('/create'),
            'view' => ViewPrivateSectorProject::route('/{record}'),
            'edit' => EditPrivateSectorProject::route('/{record}/edit'),
        ];
    }
}
