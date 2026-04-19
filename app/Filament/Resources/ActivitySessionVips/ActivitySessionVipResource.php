<?php

namespace App\Filament\Resources\ActivitySessionVips;

use App\Filament\Resources\ActivitySessionVips\Pages\CreateActivitySessionVip;
use App\Filament\Resources\ActivitySessionVips\Pages\EditActivitySessionVip;
use App\Filament\Resources\ActivitySessionVips\Pages\ListActivitySessionVips;
use App\Filament\Resources\ActivitySessionVips\Pages\ViewActivitySessionVip;
use App\Filament\Resources\ActivitySessionVips\Schemas\ActivitySessionVipForm;
use App\Filament\Resources\ActivitySessionVips\Schemas\ActivitySessionVipInfolist;
use App\Filament\Resources\ActivitySessionVips\Tables\ActivitySessionVipsTable;
use App\Models\ActivitySessionVip;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActivitySessionVipResource extends Resource
{
    protected static ?string $model = ActivitySessionVip::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

//    protected static ?string $recordTitleAttribute = 'ActivitySessionVip';

    protected static ?string $modelLabel = '【VIP】團體導覽預約場次';

    protected static UnitEnum|string|null $navigationGroup = 'Activity Sessions';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Schema $schema): Schema
    {
        return ActivitySessionVipForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ActivitySessionVipInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActivitySessionVipsTable::configure($table);
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
            'index' => ListActivitySessionVips::route('/'),
            'create' => CreateActivitySessionVip::route('/create'),
            'view' => ViewActivitySessionVip::route('/{record}'),
            'edit' => EditActivitySessionVip::route('/{record}/edit'),
        ];
    }
}
