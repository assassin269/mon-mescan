<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Lien vers la table directeur_generals
            $table->foreignId('directeur_general_id')
                  ->nullable()
                  ->after('role')
                  ->constrained('directeur_generals')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['directeur_general_id']);
            $table->dropColumn('directeur_general_id');
        });
    }
};
