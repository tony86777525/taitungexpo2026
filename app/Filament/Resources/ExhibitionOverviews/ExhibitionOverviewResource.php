<?php

namespace App\Filament\Resources\ExhibitionOverviews;

use App\Enums\ProjectType;
use App\Filament\Resources\ExhibitionOverviews\Pages\CreateExhibitionOverview;
use App\Filament\Resources\ExhibitionOverviews\Pages\EditExhibitionOverview;
use App\Filament\Resources\ExhibitionOverviews\Pages\ListExhibitionOverviews;
use App\Filament\Resources\ExhibitionOverviews\Pages\ViewExhibitionOverview;
use App\Filament\Resources\ExhibitionOverviews\Schemas\ExhibitionOverviewForm;
use App\Filament\Resources\ExhibitionOverviews\Schemas\ExhibitionOverviewInfolist;
use App\Filament\Resources\ExhibitionOverviews\Tables\ExhibitionOverviewsTable;
use App\Models\ExhibitionOverview;
use App\Models\Project;
use BackedEnum;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExhibitionOverviewResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = '展覽概覽';

    protected static ?string $modelLabel = '展覽概覽';

    protected static UnitEnum|string|null $navigationGroup = 'Projects';

    protected static ?int $navigationSort = 100;

    public static function form(Schema $schema): Schema
    {
        return ExhibitionOverviewForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ExhibitionOverviewInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExhibitionOverviewsTable::configure($table);
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
            'index' => ListExhibitionOverviews::route('/'),
            'create' => CreateExhibitionOverview::route('/create'),
            'view' => ViewExhibitionOverview::route('/{record}'),
            'edit' => EditExhibitionOverview::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        // 這會影響列表、編輯頁面、刪除操作等
        return parent::getEloquentQuery()->where('type', ProjectType::EXHIBITION_OVERVIEW->value);
    }
}
