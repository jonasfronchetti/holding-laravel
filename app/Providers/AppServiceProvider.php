<?php

namespace App\Providers;

use Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //        $this->register();
        //
        //        Gate::define('permission_access', function ($user){});
        //        Gate::define('role_access', function ($user){});
        //        Gate::define('editor', function ($user){});
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
