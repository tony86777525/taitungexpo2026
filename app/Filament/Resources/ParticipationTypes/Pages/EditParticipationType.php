<?php

namespace App\Filament\Resources\ParticipationTypes\Pages;

use App\Filament\Resources\ParticipationTypes\ParticipationTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditParticipationType extends EditRecord
{
    protected static string $resource = ParticipationTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
