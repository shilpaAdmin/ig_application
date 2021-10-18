<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if (\Auth::user()->is_admin == 1) {
            return $next($request);
        } else {
            \Auth::logout();
            return redirect()->route('admin.login');
        }
        // return redirect('home');
    }
}
