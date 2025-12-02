<?php

namespace Smartcode\TurboKit;

use Illuminate\Support\ServiceProvider;

class TurboKitServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register config
        $this->mergeConfigFrom(__DIR__.'/../config/turbokit.php', 'turbokit');

        // Register main class as singleton
        $this->app->singleton('turbokit', function () {
            return new TurboKit;
        });
    }

    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/turbokit.php' => config_path('turbokit.php'),
        ], 'config');

        // Load commands, migrations etc.
        if ($this->app->runningInConsole()) {
            $this->commands([
                Tools\Artisan\OptimizeCommand::class,
                Tools\Artisan\AnalyzeCommand::class,
            ]);
        }
    }
}
  
