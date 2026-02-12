<?php

namespace App\Filament\Resources\CurationNatures\Pages;

use App\Filament\Resources\CurationNatures\CurationNatureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCurationNatures extends ListRecords
{
    protected static string $resource = CurationNatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
