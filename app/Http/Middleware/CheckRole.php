<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $userRoleId = auth()->user()->role_id;

        if (in_array($userRoleId, $roles)) {
            return $next($request);
        }

        if (auth()->user()->role_id === 1) {
            return redirect('/fpanel/dashboard');
        } else if (auth()->user()->role_id === 2) {
            return redirect('/upanel/dashboard');
        } else {
            abort(403, 'Unauthorized access');
        }
    }
}
