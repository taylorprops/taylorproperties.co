<?php

namespace App\Http\Middleware;

use Closure;

class SetSessionSource
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if($request -> utm_source) {
            session(['utm_source' => '']);
            session(['utm_medium' => '']);
            session(['utm_campaign' => '']);
            session(['utm_source' => $request -> utm_source]);
            session(['utm_medium' => $request -> utm_medium]);
            session(['utm_campaign' => $request -> utm_campaign]);
        }

        return $next($request);
    }
}
