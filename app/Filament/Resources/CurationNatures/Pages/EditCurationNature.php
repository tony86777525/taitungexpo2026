<?php

namespace App\Filament\Resources\CurationNatures\Pages;

use App\Filament\Resources\CurationNatures\CurationNatureResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCurationNature extends EditRecord
{
    protected static string $resource = CurationNatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
