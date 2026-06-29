<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permis extends Model
{
    protected $table = 'permis';

    protected $fillable = [
        'uuid',
        'user_id',
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
        'conditions_restrictives_d_usage',
        'mentions_additionnelles',
    ];

    protected $casts = [
        'date_de_naissance' => 'date',
        'date_d_emission' => 'date',
        'categorie' => 'array',
    ];

    /**
     * Récupère les catégories sous forme de tableau simple avec leurs statuts
     */
    public function getCategoriesWithStatusAttribute(): array
    {
        if (empty($this->categorie)) {
            return [];
        }

        $categories = $this->categorie;

        // Si c'est un tableau de codes simples
        if (isset($categories[0]) && is_string($categories[0])) {
            $result = [];
            foreach ($categories as $code) {
                $result[] = [
                    'code' => $code,
                    'statut' => 'Permanent',
                    'date_expiration' => null
                ];
            }
            return $result;
        }

        // Si c'est le format du Repeater
        if (isset($categories[0]['categorie_id'])) {
            $result = [];
            foreach ($categories as $cat) {
                $result[] = [
                    'code' => $cat['categorie_id'],
                    'statut' => $cat['statut'] ?? 'Permanent',
                    'date_expiration' => $cat['date_d_expiration'] ?? null
                ];
            }
            return $result;
        }

        return [];
    }

    /**
     * Récupère uniquement les codes des catégories
     */
    public function getCategoriesCodesAttribute(): array
    {
        $categories = $this->getCategoriesWithStatusAttribute();
        return array_column($categories, 'code');
    }

    /**
     * Vérifie si une catégorie est temporaire
     */
    public function isCategoryTemporary($code): bool
    {
        $categories = $this->getCategoriesWithStatusAttribute();
        foreach ($categories as $cat) {
            if ($cat['code'] === $code) {
                return $cat['statut'] === 'Temporaire';
            }
        }
        return false;
    }

    /**
     * Récupère la date d'expiration d'une catégorie
     */
    public function getCategoryExpiration($code)
    {
        $categories = $this->getCategoriesWithStatusAttribute();
        foreach ($categories as $cat) {
            if ($cat['code'] === $code) {
                return $cat['date_expiration'] ?? null;
            }
        }
        return null;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
