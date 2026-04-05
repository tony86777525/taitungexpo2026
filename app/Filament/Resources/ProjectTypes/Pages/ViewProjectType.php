<?php

namespace App\Filament\Resources\ProjectTypes\Pages;

use App\Filament\Resources\ProjectTypes\ProjectTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectType extends ViewRecord
{
    protected static string $resource = ProjectTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
