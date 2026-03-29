<?php

namespace App\Filament\Resources\BrandTags\Pages;

use App\Filament\Resources\BrandTags\BrandTagsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBrandTags extends ListRecords
{
    protected static string $resource = BrandTagsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
