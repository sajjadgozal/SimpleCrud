<?php

namespace sajjadgozal\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class SimpleCrudProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'todolist');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/Crud'),
        ]);
    }
}
