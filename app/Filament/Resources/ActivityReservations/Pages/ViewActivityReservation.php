<?php

namespace App\Filament\Resources\ActivityReservations\Pages;

use App\Filament\Resources\ActivityReservations\ActivityReservationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewActivityReservation extends ViewRecord
{
    protected static string $resource = ActivityReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
