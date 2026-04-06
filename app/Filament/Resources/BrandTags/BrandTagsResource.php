<?php

namespace App\Filament\Resources\BrandTags;

use App\Filament\Resources\BrandTags\Pages\CreateBrandTags;
use App\Filament\Resources\BrandTags\Pages\EditBrandTags;
use App\Filament\Resources\BrandTags\Pages\ListBrandTags;
use App\Filament\Resources\BrandTags\Pages\ViewBrandTags;
use App\Filament\Resources\BrandTags\Schemas\BrandTagsForm;
use App\Filament\Resources\BrandTags\Schemas\BrandTagsInfolist;
use App\Filament\Resources\BrandTags\Tables\BrandTagsTable;
use App\Models\BrandTag;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BrandTagsResource extends Resource
{
    protected static ?string $model = BrandTag::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

//    protected static ?string $recordTitleAttribute = '品牌分類';

    protected static ?string $modelLabel = '品牌分類';

    protected static UnitEnum|string|null $navigationGroup = 'Brands';

    protected static ?int $navigationSort = 200;

    public static function form(Schema $schema): Schema
    {
        return BrandTagsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BrandTagsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BrandTagsTable::configure($table);
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
            'index' => ListBrandTags::route('/'),
            'create' => CreateBrandTags::route('/create'),
            'view' => ViewBrandTags::route('/{record}'),
            'edit' => EditBrandTags::route('/{record}/edit'),
        ];
    }
}
