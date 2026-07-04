<?php

namespace App\Filament\Resources\DirecteurGenerals\Pages;

use App\Filament\Resources\DirecteurGenerals\DirecteurGeneralResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDirecteurGenerals extends ListRecords
{
    protected static string $resource = DirecteurGeneralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
