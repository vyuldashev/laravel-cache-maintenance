<?php

namespace Vyuldashev\LaravelCacheMaintenance;

use Illuminate\Foundation\Console\DownCommand as BaseDownCommand;
use Illuminate\Support\Facades\Cache;

class DownCommand extends BaseDownCommand
{
    public function handle(): void
    {
        Cache::forever('framework_down', $this->getDownFilePayload());

        $this->comment('Application is now in maintenance mode.');
    }
}
