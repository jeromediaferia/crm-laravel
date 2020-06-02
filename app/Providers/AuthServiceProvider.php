<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Création d'une règle isAdmin pour vérifier si l'user est bien un Admin
        Gate::define('isAdmin', function($user){
           return $user->role === 1;
        });

        // Création d'une règle isEditor pour vérifier si l'user est bien un Editeur
        Gate::define('isEditor', function($user){
           return $user->role === 2;
        });
    }
}
