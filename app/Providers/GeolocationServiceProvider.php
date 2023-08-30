<?php

namespace App\Providers;

use App\services\Geolocation\geolocation;
use App\services\map\map;
use App\services\satellite\satellite;
use Illuminate\Support\ServiceProvider;

class GeolocationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(geolocation::class, function ($app){
            $map = new map();
            $satellite = new satellite();

            return new geolocation($map, $satellite);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
