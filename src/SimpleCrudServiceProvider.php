<?php

namespace sajjadgozal\SimpleCrud ;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SimpleCrudServiceProvider extends ServiceProvider{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot(){
        $this->mergeConfigFrom(
            __DIR__.'/config/crud.php', 'SimpleCrud'
        );
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'sg');

        $this->publishes([
            __DIR__.'/config/crud.php' => config_path('crud'),
        ]);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}