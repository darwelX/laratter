<?php

namespace App\Providers;

use App\User;
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Gate es la definicion de una compuerta o acceso
        // se utiliza para definir un metodo que me permita saber si entre dos usuarios se guiguen mutuamente
        Gate::define('dms', function(User $user, User $other){
            return $user->isFollowing($other) && $other->isFollowing($user);
        });
        //
    }
}
