<?php

namespace App\Providers;

use App\Policies\OauthClientPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Observation' => 'App\Policies\ObservationPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\OauthClient' => 'App\Policies\OauthClientPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('view', [OauthClientPolicy::class, 'view']);

        //
    }
}
