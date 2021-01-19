<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserCodeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('user_code','App\Services\GetUserByToken');
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
