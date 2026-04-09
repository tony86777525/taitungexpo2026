<?php

namespace App\Filament\Resources\ActivitySessionVips\Pages;

use App\Filament\Resources\ActivitySessionVips\ActivitySessionVipResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListActivitySessionVips extends ListRecords
{
    protected static string $resource = ActivitySessionVipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
