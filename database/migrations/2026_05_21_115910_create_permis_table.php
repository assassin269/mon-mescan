<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permis', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

        // Liaison avec l'agent/utilisateur qui crée le permis
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        // 1. Informations du Titulaire
        $table->string('nom');
        $table->string('prenom');
        $table->date('date_de_naissance');
        $table->string('lieu_de_naissance');
        $table->string('domicile');
        $table->string('photo_du_conducteur')->nullable();

        // 2. Informations Administratives du Titre
        $table->string('numero_du_permis')->unique();
        $table->string('serie');
        $table->string('centre_d_emission');
        $table->date('date_d_emission');
        $table->string('nom_du_directeur_general');

        // 3. Détails des Droits à Conduire (Saisis par l'agent : choix, statut, expiration...)
        $table->json('categorie');

        // 4. Mentions Spécifiques
        $table->text('conditions_restrictives_d_usage')->nullable();
        $table->text('mentions_additionnelles')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permis');
    }
};
