<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Redirect;

class AdminMiddleware
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
        $user = Auth::guard('web')->user();
        $admin = Auth::guard('admin')->user();
        if (@$admin->role_id == 1 || @$user->role_id == 1 )
        {
            // dd(Auth::user()->role_id);
            return $next($request);
        }
        return redirect('/'); 
    }
}