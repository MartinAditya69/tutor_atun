<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BackEndMiddleware
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
        if(!session()->has('admin')){
            return redirect()->route('wp-admin.loginAdmin')->with([
                'error'=>'Silahkan Login dulu'
            ]);
        }
        return $next($request);
    }
}
