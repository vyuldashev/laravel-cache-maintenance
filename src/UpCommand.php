<?php

namespace Vyuldashev\LaravelCacheMaintenance;

use Illuminate\Foundation\Console\UpCommand as BaseUpCommand;
use Illuminate\Support\Facades\Cache;

class UpCommand extends BaseUpCommand
{
    public function handle(): void
    {
        Cache::forget('framework_down');

        $this->info('Application is now live.');
    }
}
