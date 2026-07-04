<?php

namespace App\Filament\Resources\DirecteurGenerals\Pages;

use App\Filament\Resources\DirecteurGenerals\DirecteurGeneralResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDirecteurGeneral extends EditRecord
{
    protected static string $resource = DirecteurGeneralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
