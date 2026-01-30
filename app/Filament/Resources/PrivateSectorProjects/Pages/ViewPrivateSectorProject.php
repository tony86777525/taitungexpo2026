<?php

namespace App\Filament\Resources\PrivateSectorProjects\Pages;

use App\Filament\Resources\PrivateSectorProjects\PrivateSectorProjectResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPrivateSectorProject extends ViewRecord
{
    protected static string $resource = PrivateSectorProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
