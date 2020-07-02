<?php

namespace App\Http\Middleware;

use Closure;

class CheckForUserRank
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $level = 'level1')
    {
        // Check if the user is logged in
        if (!auth()->check()) {
            session()->flash('info','Please Log In');
            return redirect('/');
        }

        /**
         * Validate user rank, expected values are user, worker and manager
         */
        switch ($level) {
            case 'level1':
                if (auth()->user()->rank === 'user' 
                    || auth()->user()->rank === 'laborer'
                    || auth()->user()->rank === 'worker' 
                    || auth()->user()->rank === 'manager') {
                        $allow = true;
                }
                break;

            case 'level2':
                if (auth()->user()->rank === 'laborer'
                    || auth()->user()->rank === 'worker' 
                    || auth()->user()->rank === 'manager') {
                        $allow = true;
                }
                break;

            case 'level3':
                if (auth()->user()->rank === 'worker' 
                    || auth()->user()->rank === 'manager') {
                        $allow = true;
                }
                break;

            case 'level4':
                if (auth()->user()->rank === 'manager') {
                    $allow = true;
                }
                break;

            default:
                $allow = false;
                break;
        }

        if (!isset($allow) || !$allow) {
            session()->flash('info','Your Account Is Not Authorized For This Page, Contact Management');
            return redirect('/');
        }

        return $next($request);
    }
}
