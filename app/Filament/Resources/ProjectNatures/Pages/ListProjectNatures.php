<?php

namespace App\Filament\Resources\ProjectNatures\Pages;

use App\Filament\Resources\ProjectNatures\ProjectNatureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProjectNatures extends ListRecords
{
    protected static string $resource = ProjectNatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
