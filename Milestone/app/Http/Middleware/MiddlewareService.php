<?php

namespace App\Http\Middleware;

use Closure;

class MiddlewareService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        //$this->logger->info("Entering My Security Middleware in handle() at path: " . $path);

        $secureCheck = false;
        if ($request->is('/') || $request->is('login') || $request->is('dologin') ||
            $request->is('loggingservice'))
        {
            $secureCheck = true;
        }
        if (!$secureCheck){
            $secureCheck = true;
        }

        //$this->logger->info($secureCheck ? "Security Middleware in handle().....Needs Security" : "Security Middleware in handle().....No Security Required");

        if (!$secureCheck)
        {
            //$this->logger->info("Leaving My Security Middleware in handle() doing a redirect back to login");
            return redirect('/login');
        }
        return $next($request);
    }
}
