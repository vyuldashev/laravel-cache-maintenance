<?php

namespace Vyuldashev\LaravelCacheMaintenance;

use Illuminate\Support\ServiceProvider;

class LaravelCacheMaintenanceServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MaintenanceOffCommand::class,
                MaintenanceOnCommand::class,
            ]);
        }
    }
}
