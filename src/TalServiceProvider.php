<?php

namespace IAMProperty\LaravelTal;

use IAMProperty\LaravelTal\Engines\TalEngine;
use Illuminate\Support\ServiceProvider;

class TalServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app['view']->addExtension('tal', 'tal', function () {
            return new TalEngine($this->app['config']['view.compiled'], $this->app['config']['tal.output']);
        });
    }

    public function register()
    {
        $configPath = __DIR__ . '/../config/tal.php';
        $this->mergeConfigFrom($configPath, 'tal');

        if (function_exists('config_path')) {
            $this->publishes([$configPath => config_path('tal.php')], 'config');
        }
    }
}
