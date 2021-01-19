<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ToShortUrlProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('to_short_url','App\Services\ToShortUrl');
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
