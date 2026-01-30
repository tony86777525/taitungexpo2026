<?php

namespace App\Filament\Resources\PrivateSectorProjects\Pages;

use App\Filament\Resources\PrivateSectorProjects\PrivateSectorProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPrivateSectorProject extends EditRecord
{
    protected static string $resource = PrivateSectorProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
