<?php

namespace Hbl\Weather;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
//    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Weather::class, function(){
            return new Weather(config('services.weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');
    }

    public function provides()
    {
        return [Weather::class, 'weather'];
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->publishes([
            __DIR__.'/config/weather.php' => config_path('weather.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
}