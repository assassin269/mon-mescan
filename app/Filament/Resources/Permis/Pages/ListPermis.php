<?php

namespace App\Filament\Resources\Permis\Pages;

use App\Filament\Resources\Permis\PermisResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPermis extends ListRecords
{
    protected static string $resource = PermisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
