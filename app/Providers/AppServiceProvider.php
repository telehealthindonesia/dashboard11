<?php

namespace App\Providers;

use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('update-post', function (User $user, File $file) {
            return $user->id === $file->user_id;
        });

        Paginator::useBootstrapFour();
    }
}
