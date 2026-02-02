<?php

namespace App\Filament\Resources\ProjectNatures\Pages;

use App\Filament\Resources\ProjectNatures\ProjectNatureResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectNature extends ViewRecord
{
    protected static string $resource = ProjectNatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
