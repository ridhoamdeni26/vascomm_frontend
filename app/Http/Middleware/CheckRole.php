<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->session()->has('user.token');
        $isAdmin = $request->session()->get('user.role');

        if ($isAdmin !== 'admin' || !$token) {
            return redirect()->route('login')->with('error', 'Maaf silahkan login sebagai admin');
        }

        if (!$token) {
            return redirect()->route('login')->with('error', 'Anda perlu login untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
