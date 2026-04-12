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
            CreateAction::make()
                ->label('單筆新增'),
            CreateAction::make('create_batch')
                ->label('批次新增')
                ->url(ActivitySessionNormalResource::getUrl('create_batch')),
        ];
    }
}
