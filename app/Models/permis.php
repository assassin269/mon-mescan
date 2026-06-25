<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class permis extends Model
{
    protected $fillable = [
        'uuid',
        'user_id', // Ajouté
        'nom',
        'prenom',
        'date_de_naissance',
        'lieu_de_naissance',
        'domicile',
        'photo_du_conducteur',
        'numero_du_permis',
        'serie',
        'centre_d_emission',
        'date_d_emission',
        'nom_du_directeur_general',
        'categorie',
        'conditions_restrictives_d_usage', // Ajouté
        'mentions_additionnelles',          // Ajouté
    ];

    protected $casts = [
        'date_de_naissance' => 'date',
        'date_d_emission' => 'date',
        'categorie' => 'array',
    ];

    // Relation : Un permis appartient à un agent (User)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
