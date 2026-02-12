<?php

namespace App\Filament\Resources\ActivityReservationVips\Pages;

use App\Filament\Resources\ActivityReservationVips\ActivityReservationVipResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditActivityReservationVip extends EditRecord
{
    protected static string $resource = ActivityReservationVipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
