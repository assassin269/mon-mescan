<?php

namespace App\Observers;

use App\Models\Permis;
use App\Models\PermisLog;
class PermisObserver
{
    /**
     * Handle the Permis "created" event.
     */
    public function created(Permis $permis): void
    {
        PermisLog::create([
            'permis_id' => $permis->id,
            'user_id' => auth()->id(),
            'action' => 'ajouter',
        ]);
    }

    /**
     * Handle the Permis "updated" event.
     */
    public function updated(Permis $permis): void
    {
        $changements= [];
        foreach ($permis->getDirty() as $champ => $nouvelleValeur) {
            // On stocke l'ancienne et la nouvelle valeur
            $changements[$champ] = [
                'avant' => $permis->getOriginal($champ),
                'apres' => $nouvelleValeur
            ];
        }
        PermisLog::create([
            'permis_id' => $permis->id,
            'user_id' => auth()->id(),
            'action' => 'modifier',
            'changements' => $changements,
            'motif' => $permis->motif_modif ?? request()->input('motif_modif') // On verra comment ajouter ce champ dans Filament
        ]);
    }

    /**
     * Handle the Permis "deleted" event.
     */
    public function deleted(Permis $permis): void
    {
        PermisLog::create([
            'permis_id' => $permis->id,
            'user_id' => auth()->id(),
            'action' => 'supprimer',
            'motif' => $permis->motif_temporaire?? null,
        ]);
    }

    /**
     * Handle the Permis "restored" event.
     */
    public function restored(Permis $permis): void
    {
        //
    }

    /**
     * Handle the Permis "force deleted" event.
     */
    public function forceDeleted(Permis $permis): void
    {
        //
    }
}
