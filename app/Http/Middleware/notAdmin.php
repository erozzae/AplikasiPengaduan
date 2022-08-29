<?php

namespace App\Http\Middleware;

use Closure;

class notAdmin
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
        if (session()->get('user')['level'] == 'admin') {
            return back();
        }
        return $next($request);
    }
}
