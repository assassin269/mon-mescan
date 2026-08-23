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
        Schema::table('permis_logs', function (Blueprint $table) {
        // On rend permis_id nullable
        $table->foreignId('permis_id')->nullable()->change();

        // On ajoute la colonne pour stocker le vrai N° de permis
        $table->string('numero_du_permis_sauvegarde')->nullable()->after('permis_id');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::table('permis_logs', function (Blueprint $table) {
$table->dropColumn('numero_du_permis_sauvegarde');
          });
    }
};
