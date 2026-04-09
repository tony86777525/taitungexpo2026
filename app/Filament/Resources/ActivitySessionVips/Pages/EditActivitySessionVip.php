<?php

namespace App\Filament\Resources\ActivitySessionVips\Pages;

use App\Filament\Resources\ActivitySessionVips\ActivitySessionVipResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditActivitySessionVip extends EditRecord
{
    protected static string $resource = ActivitySessionVipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
