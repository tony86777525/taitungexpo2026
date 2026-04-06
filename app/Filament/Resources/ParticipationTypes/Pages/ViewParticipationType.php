<?php

namespace App\Filament\Resources\ParticipationTypes\Pages;

use App\Filament\Resources\ParticipationTypes\ParticipationTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewParticipationType extends ViewRecord
{
    protected static string $resource = ParticipationTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
