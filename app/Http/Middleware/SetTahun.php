<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class SetTahun
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kalau ada query tahun di URL, simpan ke session
        if ($request->has('tahun')) {
            Session::put('tahun', $request->tahun);
        }

        // Kalau session belum punya 'tahun', isi dengan tahun sekarang
        if (!Session::has('tahun')) {
            Session::put('tahun', date('Y'));
        }
        return $next($request);
    }
}
