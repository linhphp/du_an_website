<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class checklogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->jurisdiction == 2) {
                return $next($request);
            }
            else {
                Auth::logout();

                return redirect()->route('login.admin');
            }
        }

        return redirect()->route('login.admin');
    }
}
