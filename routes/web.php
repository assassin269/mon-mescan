<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\permis_controller;


Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});
Route::get('/verifier/{uuid}', [permis_controller::class, 'verifier'])->name('permis.verifier');
Route::get('/permis/telecharger/{uuid}', [permis_controller::class, 'telecharger'])->name('permis.telecharger');

require __DIR__.'/settings.php';

// Route pour générer et télécharger le PDF avec Spatie
Route::get('/permis/pdf/{uuid}', [permis_controller::class, 'telechargerPDF'])->name('permis.pdf');
Route::get('/permis/test-pdf/{uuid}', [permis_controller::class, 'testPdf'])->name('permis.test-pdf');
