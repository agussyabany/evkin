<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\App\Models\Ipa\Kimia\Permintaan;
use App\Models\Gudang\Stok;
use App\Models\Ipa\Kimia\Permintaan as KimiaPermintaan;

class DashboardGudangController extends Controller
{
    public function index()
    {
        // Ringkasan persediaan gudang utama
        $totalJenisBahan = Stok::count();

        // Ringkasan permintaan
        $totalPermintaan = KimiaPermintaan::count();

        // Status 0: maknanya belum dikonfirmasi
        $permintaanStatus0 = KimiaPermintaan::where('status', 0)->count();

        // Status 5: diterima IPA
        $permintaanDiterima = KimiaPermintaan::where('status', 5)->count();

        // Permintaan terbaru
        $permintaanTerbaru = KimiaPermintaan::with('ipa')
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();

        return view('gudang.dashboard', compact(
            'totalJenisBahan',
            'totalPermintaan',
            'permintaanStatus0',
            'permintaanDiterima',
            'permintaanTerbaru'
        ));
    }
}