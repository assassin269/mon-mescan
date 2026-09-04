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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (array_key_exists('motif_modif', $data)) {
            request()->merge(['motif_modif' => $data['motif_modif']]);
            unset($data['motif_modif']);
        }

        return $data;
    }
}
