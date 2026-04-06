<?php

namespace App\Filament\Resources\BrandTags\Pages;

use App\Filament\Resources\BrandTags\BrandTagsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBrandTags extends ViewRecord
{
    protected static string $resource = BrandTagsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
