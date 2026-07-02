<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Pastikan user udah login dulu
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Cek apakah role user sesuai dengan role yang diminta di route
        if (Auth::user()->role !== $role) {
            // Kalau misal user biasa maksa buka URL admin, kita lempar kode 403 (Forbidden)
            return abort(403, 'Akses ditolak ! Halaman ini khusus ' . $role);
        }

        return $next($request);
    }
}