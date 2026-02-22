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
            CreateAction::make()
                ->label('新增一般預約'),
            CreateAction::make('create_vip')
                ->label('新增VIP預約')
                ->url(ActivityReservationResource::getUrl('create_vip')),
        ];
    }
}
