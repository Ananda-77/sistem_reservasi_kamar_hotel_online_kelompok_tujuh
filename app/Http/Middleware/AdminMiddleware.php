<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return response()->json([
                'error' => 'Anda belum login!',
                'session' => session()->all(),
                'user' => Auth::user(),
            ], 403);
        }
        if (Auth::user()->role !== 'admin') {
            return response()->json([
                'error' => 'Akses hanya untuk admin!',
                'role' => Auth::user()->role,
                'session' => session()->all(),
                'user' => Auth::user(),
            ], 403);
        }
        return $next($request);
    }
} 