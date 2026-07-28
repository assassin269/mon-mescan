<?php

namespace App\Filament\Resources\PermisLogs\Pages;

use App\Filament\Resources\PermisLogs\PermisLogResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePermisLogs extends ManageRecords
{
    protected static string $resource = PermisLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
