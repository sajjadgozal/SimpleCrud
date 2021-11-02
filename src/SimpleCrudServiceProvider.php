<?php

namespace sajjadgozal\SimpleCrud;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SimpleCrudServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'SimpleCrud');

        $this->publishes([
            __DIR__.'/../resources/' => base_path('resources/'),
            __DIR__.'/../config/crud.php' => config_path('crud.php')
        ]);
    }
}
