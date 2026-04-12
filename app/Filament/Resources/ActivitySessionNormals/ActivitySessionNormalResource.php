<?php

namespace App\Filament\Resources\ActivitySessionNormals;

use App\Filament\Resources\ActivitySessionNormals\Pages\CreateActivitySessionNormal;
use App\Filament\Resources\ActivitySessionNormals\Pages\CreateBatchActivitySessionNormal;
use App\Filament\Resources\ActivitySessionNormals\Pages\EditActivitySessionNormal;
use App\Filament\Resources\ActivitySessionNormals\Pages\ListActivitySessionNormals;
use App\Filament\Resources\ActivitySessionNormals\Pages\ViewActivitySessionNormal;
use App\Filament\Resources\ActivitySessionNormals\Schemas\ActivitySessionNormalForm;
use App\Filament\Resources\ActivitySessionNormals\Schemas\ActivitySessionNormalInfolist;
use App\Filament\Resources\ActivitySessionNormals\Tables\ActivitySessionNormalsTable;
use App\Models\ActivitySessionNormal;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActivitySessionNormalResource extends Resource
{
    protected static ?string $model = ActivitySessionNormal::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

//    protected static ?string $recordTitleAttribute = 'ActivitySessionNormal';

    protected static ?string $modelLabel = '【一般】團體導覽預約場次';

    protected static UnitEnum|string|null $navigationGroup = 'Activity Sessions';

    public static function form(Schema $schema): Schema
    {
        return ActivitySessionNormalForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ActivitySessionNormalInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActivitySessionNormalsTable::configure($table);
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
            'index' => ListActivitySessionNormals::route('/'),
            'create' => CreateActivitySessionNormal::route('/create'),
            'create_batch' => CreateBatchActivitySessionNormal::route('/create_batch'),
            'view' => ViewActivitySessionNormal::route('/{record}'),
            'edit' => EditActivitySessionNormal::route('/{record}/edit'),
        ];
    }
}
