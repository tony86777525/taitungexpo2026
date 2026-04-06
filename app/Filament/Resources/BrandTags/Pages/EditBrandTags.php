<?php

namespace App\Filament\Resources\BrandTags\Pages;

use App\Filament\Resources\BrandTags\BrandTagsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBrandTags extends EditRecord
{
    protected static string $resource = BrandTagsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
