<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotAuth
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('login') || $request->is('register')) {
            return $next($request);
        }

        return redirect()->route('photos.index');
    }
}
