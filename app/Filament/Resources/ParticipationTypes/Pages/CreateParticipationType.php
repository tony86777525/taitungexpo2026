<?php

namespace App\Filament\Resources\ParticipationTypes\Pages;

use App\Filament\Resources\ParticipationTypes\ParticipationTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateParticipationType extends CreateRecord
{
    protected static string $resource = ParticipationTypeResource::class;
}
