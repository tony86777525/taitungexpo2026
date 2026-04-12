<?php

namespace App\Filament\Resources\ActivityReservationNormals\Pages;

use App\Filament\Resources\ActivityReservationNormals\ActivityReservationNormalResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewActivityReservationNormal extends ViewRecord
{
    protected static string $resource = ActivityReservationNormalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
