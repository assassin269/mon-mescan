<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\permis_controller;

// ============================================================
// PAGE D'ACCUEIL : REDIRIGE VERS LA PAGE DE CONNEXION
// ============================================================
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// ============================================================
// ROUTES D'AUTHENTIFICATION (gérées par Fortify)
// ============================================================
// La page de connexion est maintenant à la racine du site
// Mais on garde /login pour ceux qui veulent y accéder directement

// ============================================================
// ROUTES DU PERMIS
// ============================================================
Route::get('/verifier/{uuid}', [permis_controller::class, 'verifier'])->name('permis.verifier');
Route::get('/permis/pdf/{uuid}', [permis_controller::class, 'telechargerPDF'])->name('permis.pdf');

require __DIR__.'/settings.php';