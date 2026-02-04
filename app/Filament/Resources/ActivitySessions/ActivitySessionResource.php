<?php

namespace App\Filament\Resources\ActivitySessions;

use App\Filament\Resources\ActivitySessions\Pages\CreateActivitySession;
use App\Filament\Resources\ActivitySessions\Pages\EditActivitySession;
use App\Filament\Resources\ActivitySessions\Pages\ListActivitySessions;
use App\Filament\Resources\ActivitySessions\Pages\ViewActivitySession;
use App\Filament\Resources\ActivitySessions\Schemas\ActivitySessionForm;
use App\Filament\Resources\ActivitySessions\Schemas\ActivitySessionInfolist;
use App\Filament\Resources\ActivitySessions\Tables\ActivitySessionsTable;
use App\Models\ActivitySession;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActivitySessionResource extends Resource
{
    protected static ?string $model = ActivitySession::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = '活動場次';

    protected static ?string $modelLabel = '活動場次';

    protected static UnitEnum|string|null $navigationGroup = 'Activity Sessions';

    public static function form(Schema $schema): Schema
    {
        return ActivitySessionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ActivitySessionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActivitySessionsTable::configure($table);
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
            'index' => ListActivitySessions::route('/'),
            'create' => CreateActivitySession::route('/create'),
            'view' => ViewActivitySession::route('/{record}'),
            'edit' => EditActivitySession::route('/{record}/edit'),
        ];
    }
}
