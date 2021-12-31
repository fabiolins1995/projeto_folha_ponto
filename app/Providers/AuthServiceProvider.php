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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
            Gate::define('Administrador', function ($user) {
                print_r($user);
                if ($user->name == 'joao') {
                    return true;
                }
                return false;
            });
            Gate::define('Usuário', function ($user) {
                if ($user->tipo == '0') {
                    return true;
                }
                return false;
            });
    }
}
