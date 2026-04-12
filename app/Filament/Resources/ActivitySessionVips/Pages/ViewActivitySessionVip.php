<?php

namespace App\Filament\Resources\ActivitySessionVips\Pages;

use App\Filament\Resources\ActivitySessionVips\ActivitySessionVipResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewActivitySessionVip extends ViewRecord
{
    protected static string $resource = ActivitySessionVipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
