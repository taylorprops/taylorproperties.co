<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

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

            // clear session vars
            session(['utm_source' => '']);
            session(['utm_medium' => '']);
            session(['utm_campaign' => '']);

            if($request -> hasCookie('utm_source')) {
                // use utm_source from cookie set in the past 60 days
                session(['utm_source' => $request -> cookie('utm_source')]);

            } else {
                // use new utm_source
                session(['utm_source' => $request -> utm_source]);
                // create new cookie
                $sixty_days = 86400;
                Cookie::queue('utm_source', $request -> utm_source, $sixty_days);

            }

            session(['utm_medium' => $request -> utm_medium]);
            session(['utm_campaign' => $request -> utm_campaign]);

        }

        return $next($request);
    }
}
