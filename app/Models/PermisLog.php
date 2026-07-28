<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermisLog extends Model
{
    protected $fillable = [
        'permis_id',
        'user_id',
        'action',
        'changements',
        'motif',
    ];

    protected $casts = [
        'changements' => 'array',
    ];

    public function permis()
    {
        return $this->belongsTo(Permis::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
