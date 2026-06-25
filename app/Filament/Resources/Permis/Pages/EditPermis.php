<?php

namespace App\Filament\Resources\Permis\Pages;

use App\Filament\Resources\Permis\PermisResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPermis extends EditRecord
{
    protected static string $resource = PermisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
