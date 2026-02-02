<?php

namespace App\Filament\Resources\ProjectNatures\Pages;

use App\Filament\Resources\ProjectNatures\ProjectNatureResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProjectNature extends EditRecord
{
    protected static string $resource = ProjectNatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
