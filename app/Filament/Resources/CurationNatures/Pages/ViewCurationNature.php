<?php

namespace App\Filament\Resources\CurationNatures\Pages;

use App\Filament\Resources\CurationNatures\CurationNatureResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCurationNature extends ViewRecord
{
    protected static string $resource = CurationNatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
