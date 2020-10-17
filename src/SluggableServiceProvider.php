<?php

namespace IFrankSmith\Sluggable;

use Illuminate\Support\ServiceProvider;

class SluggableServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            \dirname(__DIR__) . '/config/sluggable.php' => config_path('sluggable.php'),
        ], 'config');
    }


    public function register()
    {
        $this->mergeConfigFrom(
            \dirname(__DIR__) . '/config/sluggable.php',
            'sluggable'
        );
    }
}
