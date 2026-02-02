<?php

namespace App\Filament\Resources\ExhibitionOverviews\Pages;

use App\Filament\Resources\ExhibitionOverviews\ExhibitionOverviewResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditExhibitionOverview extends EditRecord
{
    protected static string $resource = ExhibitionOverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
