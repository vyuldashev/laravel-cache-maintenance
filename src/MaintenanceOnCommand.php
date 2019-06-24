<?php

namespace Vyuldashev\LaravelCacheMaintenance;

use Illuminate\Foundation\Console\DownCommand as BaseDownCommand;
use Illuminate\Support\Facades\Cache;

class MaintenanceOnCommand extends BaseDownCommand
{
    protected $signature = 'maintenance:on {--message= : The message for the maintenance mode}
                                 {--retry= : The number of seconds after which the request may be retried}
                                 {--allow=* : IP or networks allowed to access the application while in maintenance mode}';

    public function handle(): void
    {
        Cache::forever('framework_down', $this->getDownFilePayload());

        $this->comment('Application is now in maintenance mode.');
    }
}
