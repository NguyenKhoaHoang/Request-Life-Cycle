<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProductPermission
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
        if (!$this->isAdmin()) {
            return redirect()->route('home');
        }
        echo 'product permission checked';
        return $next($request);
    }

    public function isAdmin()
    {
        return false;
    }
}
