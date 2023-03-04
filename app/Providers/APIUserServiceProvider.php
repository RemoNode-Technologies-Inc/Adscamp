<?php

namespace App\Providers;

use App\Services\UserService\UserService;
use Illuminate\Support\ServiceProvider;

class APIUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserService::class, function($app){
            return new UserService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
