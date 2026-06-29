<?php

namespace App\Http\Controllers;

use App\Models\Permis;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

class permis_controller extends Controller
{
    public function verifier($uuid)
    {
        // On cherche le permis en base de données via son UUID
        $permis = Permis::where('uuid', $uuid)->firstOrFail();

        // Si le permis existe, on charge la page visuelle en lui passant les données
        return view('permis.pdf', compact('permis'));
    }

    // AJOUT DE LA MÉTHODE MANQUANTE POUR LE BOUTON FILAMENT
    public function telechargerPDF($uuid)
    {
        $permis = Permis::where('uuid', $uuid)->firstOrFail();

<<<<<<< HEAD
        return Pdf::view('permis.pdf', compact('permis'))
=======
       return Pdf::view('permis.pdf', compact('permis'))
>>>>>>> cbaf1742310436f51147576e4f4804fcd6eccfc6
            ->withBrowsershot(function ($browsershot) {
                $browsershot->noSandbox()
                    ->addChromiumArguments([
                        'disable-s etuid-sandbox',
                        'disable-dev-shm-usage',
                    ])
                    // Indique ici le chemin vers le vrai Google Chrome de ton Windows
                    ->setChromePath('C:\Program Files\Google\Chrome\Application\chrome.exe');
            })
            ->name('permis-' . strtolower($permis->nom) . '.pdf')
            ->download();
    }
}

function testPdf($uuid){
    $permis = Permis::where('uuid', $uuid)->firstOrFail();
    return Pdf::view('permis.pdf', compact('permis', 'qrCodeImage'))
        ->paperSize(210.0, 297.0) // On utilise une feuille A4 sur laquelle les cartes seront centrées
        ->name('permis-' . $permis->numero_du_permis . '.pdf');
}
