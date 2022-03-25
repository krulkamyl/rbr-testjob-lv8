<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class LoggingApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        activity()->event('api-request')->log('[URL] => '.$request->url().' [METHOD] =>'. $request->method());
        return $next($request);
    }
}
