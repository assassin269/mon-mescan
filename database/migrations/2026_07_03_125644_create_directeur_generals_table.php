<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('directeur_generals', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Ex: "SOILIHI Mohamed"
            $table->string('signature_path')->nullable(); // Lien vers l'image de sa signature
            $table->boolean('est_actif')->default(true); // Permet de savoir si c'est le directeur actuel
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('directeur_generals');
    }
};
