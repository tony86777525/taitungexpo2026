<?php

namespace App\Filament\Resources\ActivitySessionNormals\Pages;

use App\Filament\Resources\ActivitySessionNormals\ActivitySessionNormalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListActivitySessionNormals extends ListRecords
{
    protected static string $resource = ActivitySessionNormalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
