<?php

namespace App\Filament\Resources\PrivateSectorProjects\Pages;

use App\Filament\Resources\PrivateSectorProjects\PrivateSectorProjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPrivateSectorProjects extends ListRecords
{
    protected static string $resource = PrivateSectorProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
