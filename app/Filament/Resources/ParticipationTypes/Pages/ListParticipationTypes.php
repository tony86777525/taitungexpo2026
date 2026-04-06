<?php

namespace App\Filament\Resources\ParticipationTypes\Pages;

use App\Filament\Resources\ParticipationTypes\ParticipationTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListParticipationTypes extends ListRecords
{
    protected static string $resource = ParticipationTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
