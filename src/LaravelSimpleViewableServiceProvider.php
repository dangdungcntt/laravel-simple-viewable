<?php

namespace Nddcoder\LaravelSimpleViewable;

use Illuminate\Support\ServiceProvider;

class LaravelSimpleViewableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/simple-viewable.php' => config_path('simple-viewable.php'),
            ], 'config');

            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__.'/../migrations/create_views_table.php.stub' => database_path("/migrations/{$timestamp}_create_views_table.php"),
            ], 'migrations');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/simple-viewable.php', 'simple-viewable');

        // Register the main class to use with the facade
        $this->app->singleton('simple-viewable', function () {
            return new LaravelSimpleViewable;
        });
    }
}
