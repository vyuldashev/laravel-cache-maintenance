<?php

namespace Vyuldashev\LaravelCacheMaintenance;

use Closure;
use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\IpUtils;

class CheckForMaintenanceMode extends Middleware
{
    public function handle($request, Closure $next)
    {
        if (Cache::has('framework_down')) {
            $data = Cache::get('framework_down');

            if (isset($data['allowed']) && IpUtils::checkIp($request->ip(), (array)$data['allowed'])) {
                return $next($request);
            }

            if ($this->inExceptArray($request)) {
                return $next($request);
            }

            throw new MaintenanceModeException($data['time'], $data['retry'], $data['message']);
        }

        return parent::handle($request, $next);
    }
}
