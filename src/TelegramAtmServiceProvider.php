<?php

namespace TelegramAtm;

use Illuminate\Support\ServiceProvider;
use Amohamed\TelegramAtm\Facades\TelegramBotService;

class TelegramAtmServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__.'/../config/telegramatm.php' => config_path('telegramatm.php'),
        ]);

        //table migration to create telegram_sessions table
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/telegramatm.php', 'telegramatm');

        // Register the main class to use with the facade
        $this->app->singleton('telegramatm', function () {
            return new TelegramBotService;
        });
    }
}