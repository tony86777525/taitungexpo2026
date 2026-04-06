<?php

namespace App\Filament\Resources\HomeBanners;

use App\Filament\Resources\HomeBanners\Pages\CreateHomeBanner;
use App\Filament\Resources\HomeBanners\Pages\EditHomeBanner;
use App\Filament\Resources\HomeBanners\Pages\ListHomeBanners;
use App\Filament\Resources\HomeBanners\Pages\ViewHomeBanner;
use App\Filament\Resources\HomeBanners\Schemas\HomeBannerForm;
use App\Filament\Resources\HomeBanners\Schemas\HomeBannerInfolist;
use App\Filament\Resources\HomeBanners\Tables\HomeBannersTable;
use App\Models\HomeBanner;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeBannerResource extends Resource
{
    protected static ?string $model = HomeBanner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

//    protected static ?string $recordTitleAttribute = 'HomeBanner';

    protected static ?string $modelLabel = '首圖輪播';

    protected static UnitEnum|string|null $navigationGroup = 'Home';

    protected static ?int $navigationSort = 10;

    public static function form(Schema $schema): Schema
    {
        return HomeBannerForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HomeBannerInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeBannersTable::configure($table);
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
            'index' => ListHomeBanners::route('/'),
            'create' => CreateHomeBanner::route('/create'),
            'view' => ViewHomeBanner::route('/{record}'),
            'edit' => EditHomeBanner::route('/{record}/edit'),
        ];
    }
}
