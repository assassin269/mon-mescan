<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirecteurGeneral extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'signature_path',
        'est_actif',
    ];

    protected $casts = [
        'est_actif' => 'boolean',
    ];

    /**
     * Relation : Un directeur général peut être associé à plusieurs utilisateurs
     */
    public function users()
    {
        return $this->hasMany(User::class, 'directeur_general_id');
    }

    /**
     * Récupérer le directeur général actif
     */
    public static function actif()
    {
        return self::where('est_actif', true)->first();
    }
}
