<?php

namespace App\Filament\Resources\DirecteurGeneralResource\Pages;

use App\Filament\Resources\DirecteurGeneralResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDirecteurGeneral extends EditRecord
{
    protected static string $resource = DirecteurGeneralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

