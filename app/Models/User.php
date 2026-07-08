<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\PasskeyUser;
use Laravel\Fortify\PasskeyAuthenticatable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable implements PasskeyUser, FilamentUser
{
    use HasFactory, Notifiable, PasskeyAuthenticatable, TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'directeur_general_id',
    ];

    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Contrôle l'accès au panel Filament
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Seuls les admins, directeurs et agents peuvent accéder au panel
        return in_array($this->role, ['admin', 'directeur', 'agent']);
    }

    /**
     * Vérifier si l'utilisateur est admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Vérifier si l'utilisateur est directeur général
     */
    public function isDirecteur(): bool
    {
        return $this->role === 'directeur';
    }

    /**
     * Vérifier si l'utilisateur est agent/employé
     */
    public function isAgent(): bool
    {
        return $this->role === 'agent';
    }

    /**
     * Un directeur a plusieurs employés (agents)
     */
    public function employes()
    {
        return $this->hasMany(User::class, 'directeur_general_id');
    }

    /**
     * Un employé appartient à un directeur
     */
    public function directeurGeneral()
    {
        return $this->belongsTo(DirecteurGeneral::class, 'directeur_general_id');
    }

    /**
     * Un utilisateur a plusieurs permis
     */
    public function permis()
    {
        return $this->hasMany(Permis::class);
    }

    /**
     * Récupérer tous les utilisateurs que ce directeur peut voir
     */
    public function getUsersVisibles()
    {
        if ($this->isAdmin()) {
            // L'admin voit tous les utilisateurs
            return User::all();
        }

        if ($this->isDirecteur()) {
            // Le directeur voit ses employés + lui-même
            return User::where('directeur_general_id', $this->directeur_general_id)
                        ->orWhere('id', $this->id)
                        ->get();
        }

        if ($this->isAgent()) {
            // L'agent ne voit que lui-même
            return User::where('id', $this->id)->get();
        }

        return collect();
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }
}
