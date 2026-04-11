<?php

namespace App\Filament\Resources\ActivityReservationVips\Pages;

use App\Filament\Resources\ActivityReservationVips\ActivityReservationVipResource;
use App\Services\MailService;
use Filament\Resources\Pages\CreateRecord;

class CreateActivityReservationVip extends CreateRecord
{
    protected static string $resource = ActivityReservationVipResource::class;

    protected function afterCreate(): void
    {
        $this->record->load([
            'activitySession',
            'activitySession',
            'activitySession.project',
            'activitySession.project.zone',
        ]);

        MailService::SendMailWhenCreateActivityReservationVip($this->record);
    }
}
