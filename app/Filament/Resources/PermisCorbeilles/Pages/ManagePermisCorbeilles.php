<?php

namespace App\Filament\Resources\PermisCorbeilles\Pages;

use App\Filament\Resources\PermisCorbeilles\PermisCorbeilleResource;
use Filament\Resources\Pages\ManageRecords;

class ManagePermisCorbeilles extends ManageRecords
{
    protected static string $resource = PermisCorbeilleResource::class;

    // 💡 AJOUT : Le propre titre de la page
    protected static ?string $title = 'Corbeille des Permis';

    // 💡 MODIFICATION : On retire CreateAction pour laisser le tableau vide []
    protected function getHeaderActions(): array
    {
        return [];
    }
}
