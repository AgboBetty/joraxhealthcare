<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckForUserStatus
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
        // Check if the user is logged in
        if (auth()->check()) {

            if (auth()->user()->blocked == true) {
                Auth::logout();
                session()->flash('warning','Your Account Is Blocked, Contact Management');
                return redirect('/');
            }
        }

        return $next($request);
    }
}
