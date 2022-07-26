<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $loginRole = auth()->user()->role;
        // dd($role, $loginRole);

        $roles = explode('|', $role);

        if (!in_array($loginRole, $roles)) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
