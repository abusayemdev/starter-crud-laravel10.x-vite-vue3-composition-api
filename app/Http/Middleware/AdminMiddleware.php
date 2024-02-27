<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AdminMiddleware
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

            if ($user->account_type === "admin") {
                return $next($request);
            } elseif($user->account_type === "user") {
                return redirect()->route('dashboard');
            }

        }else {
            return redirect()->route('admin.admin-login');
        }
        
        
    }
}
