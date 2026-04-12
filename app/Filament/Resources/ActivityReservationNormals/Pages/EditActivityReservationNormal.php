<?php

namespace App\Filament\Resources\ActivityReservationNormals\Pages;

use App\Filament\Resources\ActivityReservationNormals\ActivityReservationNormalResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditActivityReservationNormal extends EditRecord
{
    protected static string $resource = ActivityReservationNormalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
