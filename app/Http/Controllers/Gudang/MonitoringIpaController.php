<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\Gudang\StokIpa;
use App\Models\Gudang\GudangStokIpaSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringIpaController extends Controller
{
    public function index(Request $request)
    {
        $query = StokIpa::with(['bahan.satuan']);

        // Filter berdasarkan IPA
        if ($request->filled('id_ipa')) {
            $query->where('id_ipa', $request->id_ipa);
        }

        // Pencarian nama bahan kimia
        if ($request->filled('search')) {
            $search = $request->search;

            $query->whereHas('bahan', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            });
        }

        $stok = $query
            ->orderBy('id_ipa')
            ->orderBy('id_bahan')
            ->paginate(20)
            ->withQueryString();

        // Ambil stok minimum sesuai IPA dan bahan
        $minimumStok = GudangStokIpaSetting::query()
            ->get()
            ->keyBy(fn ($item) => $item->id_ipa . '-' . $item->id_bahan);

        // Ringkasan stok seluruh IPA
        $semuaStok = StokIpa::query()->get();

        $semuaMinimum = GudangStokIpaSetting::query()
            ->get()
            ->keyBy(fn ($item) => $item->id_ipa . '-' . $item->id_bahan);

        $totalJenisStok = $semuaStok->count();

        $stokHabis = $semuaStok->filter(
            fn ($item) => (float) $item->stok <= 0
        )->count();

        $stokMenipis = $semuaStok->filter(function ($item) use ($semuaMinimum) {
            $key = $item->id_ipa . '-' . $item->id_bahan;
            $minimum = (float) optional($semuaMinimum->get($key))->stok_minimum;

            return (float) $item->stok > 0
                && (float) $item->stok <= $minimum
                && $minimum > 0;
        })->count();

        // Daftar IPA berdasarkan ID yang tersedia pada tabel stok
        $daftarIpa = DB::table('gudang_stok_ipa')
            ->select('id_ipa')
            ->distinct()
            ->orderBy('id_ipa')
            ->pluck('id_ipa');

        return view('gudang.stok', compact(
            'stok',
            'minimumStok',
            'daftarIpa',
            'totalJenisStok',
            'stokHabis',
            'stokMenipis'
        ));
    }
}