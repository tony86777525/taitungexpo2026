<?php

namespace App\Filament\Resources\ActivityReservations\Pages;

use App\Filament\Resources\ActivityReservations\ActivityReservationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListActivityReservations extends ListRecords
{
    protected static string $resource = ActivityReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
