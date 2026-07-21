<?php

namespace App\Policies;
use App\Models\Permis;
use App\Models\User;

class PermisPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user): bool{
        return true;
    }

    public function delete(User $user, Permis $permis): bool{
        return true;
    }
}
