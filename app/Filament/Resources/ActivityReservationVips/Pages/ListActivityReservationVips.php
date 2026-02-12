<?php

namespace App\Filament\Resources\ActivityReservationVips\Pages;

use App\Filament\Resources\ActivityReservationVips\ActivityReservationVipResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListActivityReservationVips extends ListRecords
{
    protected static string $resource = ActivityReservationVipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
