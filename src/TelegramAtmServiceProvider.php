<?php

namespace Amohamed\TelegramAtm;

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
            __DIR__ . '/../config/telegramatm.php' => config_path('telegramatm.php'),
        ], 'config');

        // Publish migration files
        if (!class_exists('CreateTelegramSessionsTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_telegram_sessions_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_telegram_sessions_table.php'),
            ], 'migrations');
        }
    }


    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/telegramatm.php', 'telegramatm');

        // Register the main class to use with the facade
        $this->app->singleton('telegramatm', function () {
            return new TelegramAtmService;
        });
    }
}
