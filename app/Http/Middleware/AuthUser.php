<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthUser
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
        if(auth()->guest()) {
            $notification = array(
                'message' => 'Authenticated Users only',
                'alert-type' => 'error'
            );
            return redirect('/')->with($notification);
        } elseif(auth()->user()->role == 'auth_user') {
            return $next($request);
        } else {
            if(auth()->check()) {
                auth()->logout();
                $notification = array(
                    'message' => 'Authenticated Users only',
                    'alert-type' => 'error'
                );
                return redirect('/')->with($notification);
            }
        }
    }
}
