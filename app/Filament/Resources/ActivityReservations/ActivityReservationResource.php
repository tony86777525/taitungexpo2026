<?php

namespace App\Filament\Resources\ActivityReservations;

use App\Filament\Resources\ActivityReservations\Pages\CreateActivityReservation;
use App\Filament\Resources\ActivityReservations\Pages\EditActivityReservation;
use App\Filament\Resources\ActivityReservations\Pages\ListActivityReservations;
use App\Filament\Resources\ActivityReservations\Pages\ViewActivityReservation;
use App\Filament\Resources\ActivityReservations\Schemas\ActivityReservationForm;
use App\Filament\Resources\ActivityReservations\Schemas\ActivityReservationInfolist;
use App\Filament\Resources\ActivityReservations\Tables\ActivityReservationsTable;
use App\Models\ActivityReservation;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActivityReservationResource extends Resource
{
    protected static ?string $model = ActivityReservation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = '活動場次預約報名';

    protected static ?string $modelLabel = '活動場次預約報名';

    protected static UnitEnum|string|null $navigationGroup = 'Activity Sessions';

    public static function form(Schema $schema): Schema
    {
        return ActivityReservationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ActivityReservationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActivityReservationsTable::configure($table);
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
            'index' => ListActivityReservations::route('/'),
            'create' => CreateActivityReservation::route('/create'),
            'view' => ViewActivityReservation::route('/{record}'),
            'edit' => EditActivityReservation::route('/{record}/edit'),
        ];
    }
}
