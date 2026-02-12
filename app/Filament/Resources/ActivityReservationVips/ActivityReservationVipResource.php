<?php

namespace App\Filament\Resources\ActivityReservationVips;

use App\Enums\ActivityReservationType;
use App\Filament\Resources\ActivityReservationVips\Pages\CreateActivityReservationVip;
use App\Filament\Resources\ActivityReservationVips\Pages\EditActivityReservationVip;
use App\Filament\Resources\ActivityReservationVips\Pages\ListActivityReservationVips;
use App\Filament\Resources\ActivityReservationVips\Pages\ViewActivityReservationVip;
use App\Filament\Resources\ActivityReservationVips\Schemas\ActivityReservationVipForm;
use App\Filament\Resources\ActivityReservationVips\Schemas\ActivityReservationVipInfolist;
use App\Filament\Resources\ActivityReservationVips\Tables\ActivityReservationVipsTable;
use App\Models\ActivityReservation;
use BackedEnum;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActivityReservationVipResource extends Resource
{
    protected static ?string $model = ActivityReservation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = '活動場次預約報名(VIP)';

    protected static ?string $modelLabel = '活動場次預約報名(VIP)';

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
        // 這會影響列表、編輯頁面、刪除操作等
        return parent::getEloquentQuery()->where('type', ActivityReservationType::VIP->value);
    }
}
