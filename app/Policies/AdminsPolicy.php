<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function accessAdmins(User $user) {
        return $user->hasAnyRoles(['super-admin','admin','moderator','developer']);
    }

    public function manageAdmins(User $user) {
        return $user->hasAnyRoles(['super-admin','admin']);
    }
}
