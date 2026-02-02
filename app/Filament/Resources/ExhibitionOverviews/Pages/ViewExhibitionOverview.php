<?php

namespace App\Filament\Resources\ExhibitionOverviews\Pages;

use App\Filament\Resources\ExhibitionOverviews\ExhibitionOverviewResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewExhibitionOverview extends ViewRecord
{
    protected static string $resource = ExhibitionOverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
