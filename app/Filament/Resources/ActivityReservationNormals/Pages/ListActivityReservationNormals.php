<?php

namespace App\Filament\Resources\ActivityReservationNormals\Pages;

use App\Filament\Resources\ActivityReservationNormals\ActivityReservationNormalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListActivityReservationNormals extends ListRecords
{
    protected static string $resource = ActivityReservationNormalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
