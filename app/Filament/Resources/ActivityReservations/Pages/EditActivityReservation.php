<?php

namespace App\Filament\Resources\ActivityReservations\Pages;

use App\Filament\Resources\ActivityReservations\ActivityReservationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditActivityReservation extends EditRecord
{
    protected static string $resource = ActivityReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
