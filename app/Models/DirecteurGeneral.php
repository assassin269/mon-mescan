<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirecteurGeneral extends Model
{
    protected $fillable = [
        'nom',
        'signature_path',
        'est_actif',
    ];

    protected $casts = [
        'est_actif' => 'boolean',
    ];
}
