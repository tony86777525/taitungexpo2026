<?php

namespace App\Filament\Resources\ActivityReservationVips;

use App\Filament\Resources\ActivityReservationVips\Pages\CreateActivityReservationVip;
use App\Filament\Resources\ActivityReservationVips\Pages\EditActivityReservationVip;
use App\Filament\Resources\ActivityReservationVips\Pages\ListActivityReservationVips;
use App\Filament\Resources\ActivityReservationVips\Pages\ViewActivityReservationVip;
use App\Filament\Resources\ActivityReservationVips\Schemas\ActivityReservationVipForm;
use App\Filament\Resources\ActivityReservationVips\Schemas\ActivityReservationVipInfolist;
use App\Filament\Resources\ActivityReservationVips\Tables\ActivityReservationVipsTable;
use App\Models\ActivityReservationVip;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ActivityReservationVipResource extends Resource
{
    protected static ?string $model = ActivityReservationVip::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

//    protected static ?string $recordTitleAttribute = 'ActivityReservationVip';

    protected static ?string $modelLabel = '【VIP】團體導覽預約申請';

    protected static UnitEnum|string|null $navigationGroup = 'Activity Sessions';

    public static function form(Schema $schema): Schema
    {
        return ActivityReservationVipForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ActivityReservationVipInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActivityReservationVipsTable::configure($table);
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
            'index' => ListActivityReservationVips::route('/'),
            'create' => CreateActivityReservationVip::route('/create'),
            'view' => ViewActivityReservationVip::route('/{record}'),
            'edit' => EditActivityReservationVip::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->orderBy('id', 'desc');
    }
}
