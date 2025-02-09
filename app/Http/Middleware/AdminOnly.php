<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login dan role_id adalah 1 (Admin)
        if (!Auth::check() || Auth::user()->role_id != 1) {
            return redirect('/')->withErrors(['access' => 'Anda tidak memiliki akses ke halaman ini.']);
        }

        return $next($request);
    }
}
