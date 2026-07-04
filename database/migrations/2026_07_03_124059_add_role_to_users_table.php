<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // On ajoute la colonne 'role'. Par défaut, un utilisateur créé sera un 'agent'.
            $table->string('role')->default('agent')->after('email');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Si on fait marche arrière, on supprime la colonne proprement
            $table->dropColumn('role');
        });
    }
};
