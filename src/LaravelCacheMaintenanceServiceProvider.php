<?php

namespace Vyuldashev\LaravelCacheMaintenance;

use Illuminate\Support\ServiceProvider;

class LaravelCacheMaintenanceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('command.down', static function () {
            return new DownCommand();
        });

        $this->app->singleton('command.up', static function () {
            return new UpCommand();
        });
    }
}
