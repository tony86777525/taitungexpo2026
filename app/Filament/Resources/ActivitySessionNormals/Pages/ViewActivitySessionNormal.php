<?php

namespace App\Filament\Resources\ActivitySessionNormals\Pages;

use App\Filament\Resources\ActivitySessionNormals\ActivitySessionNormalResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewActivitySessionNormal extends ViewRecord
{
    protected static string $resource = ActivitySessionNormalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
