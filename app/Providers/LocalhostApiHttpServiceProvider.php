<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class LocalhostApiHttpServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Http::macro('localhostApi', function () {
            return Http::baseUrl(config('app.url').'/api')->withHeaders(
                [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ]
            );
        });
    }
}
