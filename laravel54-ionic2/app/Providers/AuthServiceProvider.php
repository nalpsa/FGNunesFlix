<?php

namespace FGNunesFlix\Providers;

use FGNunesFlix\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'FGNunesFlix\Model' => 'FGNunesFlix\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        \Gate::define(  'admin', function ($user){
           return $user->role == User::ROLE_ADMIN;
        });

        //
    }
}
