<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolesPolicy
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

    public function accessRoles(User $user) {
        return $user->hasAnyRoles(['super-admin','admin','moderator']);
    }

    public function manageRoles(User $user) {
        return $user->hasAnyRoles(['super-admin','admin']);
    }
}
