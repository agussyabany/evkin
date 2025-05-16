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
       // Tahun
    if ($request->has('tahun')) {
        Session::put('tahun', $request->tahun);
    }
    if (!Session::has('tahun')) {
        Session::put('tahun', date('Y'));
    }

    // Bulan Awal
    if ($request->has('bulan_awal')) {
        Session::put('bulan_awal', str_pad($request->bulan_awal, 2, '0', STR_PAD_LEFT));
    }
    if (!Session::has('bulan_awal')) {
        Session::put('bulan_awal', '01'); // Default Januari
    }

    // Bulan Akhir
    if ($request->has('bulan_akhir')) {
        Session::put('bulan_akhir', str_pad($request->bulan_akhir, 2, '0', STR_PAD_LEFT));
    }
    if (!Session::has('bulan_akhir')) {
        Session::put('bulan_akhir', '12'); // Default Desember
    }

    return $next($request);
    }
}
