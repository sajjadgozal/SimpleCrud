<?php

namespace sajjadgozal\SimpleCrud;

use Illuminate\Support\ServiceProvider;

class SimpleCrudServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'SimpleCrud');
        $this->publishes([
            __DIR__.'/../resources/' => base_path('resources/'),
            __DIR__.'/../config/crud.php' => config_path('crud.php')
        ]);
    }
}
