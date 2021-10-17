<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
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

    public function accessUsers(User $user) {
        return $user->hasAnyRoles(['super-admin','admin','moderator']);
    }

    public function manageUsers(User $user) {
        return $user->hasAnyRoles(['super-admin','admin']);
    }
}
