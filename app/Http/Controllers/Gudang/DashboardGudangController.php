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

            // Notifikasi permintaan belum dikonfirmasi
            $jumlahNotifikasi = KimiaPermintaan::where('status', 2)->count();

            // Status 5: diterima IPA
            $permintaanDiterima = KimiaPermintaan::where('status', 5)->count();

            // Permintaan terbaru
            $permintaanTerbaru = KimiaPermintaan::with('ipa')
                ->where('status', '!=', 0)
                ->orderByDesc('created_at')
                ->limit(10)
                ->get();

            return view('gudang.dashboard', compact(
                'totalJenisBahan',
                'totalPermintaan',
                'jumlahNotifikasi',
                'permintaanDiterima',
                'permintaanTerbaru'
            ));
        }
}