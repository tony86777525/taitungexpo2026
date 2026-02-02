<?php

namespace App\Filament\Resources\ExhibitionOverviews\Pages;

use App\Filament\Resources\ExhibitionOverviews\ExhibitionOverviewResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExhibitionOverviews extends ListRecords
{
    protected static string $resource = ExhibitionOverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
