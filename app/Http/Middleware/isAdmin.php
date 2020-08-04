<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user_role = Auth::user()->roles()->pluck('title');
        if (!$user_role->contains('مدیر')) {
            return redirect('/login');
        }
        return $next($request);
    }
}
