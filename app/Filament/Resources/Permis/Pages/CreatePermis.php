<?php

namespace App\Filament\Resources\Permis\Pages;

use App\Filament\Resources\Permis\PermisResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePermis extends CreateRecord
{
    protected static string $resource = PermisResource::class;

    // La fonction est maintenant BIEN PLACÉE à l'intérieur de la classe !
    protected function getRedirectUrl(): string
    {
        // Redirige l'agent directement vers ta page de succès/scan avec l'UUID du permis créé
        return route('permis.verifier', ['uuid' => $this->record->uuid]);
    }
}
