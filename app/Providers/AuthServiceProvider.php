<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\AdminsPolicy;
use App\Policies\RolesPolicy;
use App\Policies\UsersPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => RolesPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //Access
        Gate::define('accessRoles', [RolesPolicy::class, 'accessRoles']);
        Gate::define('accessUsers', [UsersPolicy::class, 'accessUsers']);
        Gate::define('accessAdmins', [AdminsPolicy::class, 'accessAdmins']);
        //Manage
        Gate::define('manageRoles', [RolesPolicy::class, 'manageRoles']);
        Gate::define('manageUsers', [UsersPolicy::class, 'manageUsers']);
        Gate::define('manageAdmins', [AdminsPolicy::class, 'manageAdmins']);
    }
}
