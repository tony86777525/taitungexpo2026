<?php

namespace App\Filament\Resources\ActivityReservationVips\Pages;

use App\Filament\Resources\ActivityReservationVips\ActivityReservationVipResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewActivityReservationVip extends ViewRecord
{
    protected static string $resource = ActivityReservationVipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
