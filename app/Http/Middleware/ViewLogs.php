<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewLogs
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated and has the 'superadmin' role
        if (Auth::check() && Auth::user()->hasRole('superadmin')) {
            return $next($request);
        }

        abort(403, 'Akses Ditolak');
    }
}