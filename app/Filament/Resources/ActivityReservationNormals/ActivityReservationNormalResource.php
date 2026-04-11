<?php

namespace App\Filament\Resources\ActivityReservationNormals;

use App\Filament\Resources\ActivityReservationNormals\Pages\ApproveActivityReservationNormal;
use App\Filament\Resources\ActivityReservationNormals\Pages\CreateActivityReservationNormal;
use App\Filament\Resources\ActivityReservationNormals\Pages\EditActivityReservationNormal;
use App\Filament\Resources\ActivityReservationNormals\Pages\ListActivityReservationNormals;
use App\Filament\Resources\ActivityReservationNormals\Pages\ViewActivityReservationNormal;
use App\Filament\Resources\ActivityReservationNormals\Schemas\ActivityReservationNormalForm;
use App\Filament\Resources\ActivityReservationNormals\Schemas\ActivityReservationNormalInfolist;
use App\Filament\Resources\ActivityReservationNormals\Tables\ActivityReservationNormalsTable;
use App\Models\ActivityReservationNormal;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ActivityReservationNormalResource extends Resource
{
    protected static ?string $model = ActivityReservationNormal::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

//    protected static ?string $recordTitleAttribute = 'ActivityReservationNormal';

    protected static ?string $modelLabel = '【一般】團體導覽預約申請';

    protected static UnitEnum|string|null $navigationGroup = 'Activity Sessions';

    public static function form(Schema $schema): Schema
    {
        return ActivityReservationNormalForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ActivityReservationNormalInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActivityReservationNormalsTable::configure($table);
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
            'index' => ListActivityReservationNormals::route('/'),
            'create' => CreateActivityReservationNormal::route('/create'),
            'view' => ViewActivityReservationNormal::route('/{record}'),
            'edit' => EditActivityReservationNormal::route('/{record}/edit'),
            'approve' => ApproveActivityReservationNormal::route('/{record}/approve'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->orderBy('id', 'desc');
    }
}
