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
    // Ambil IPA untuk kolom laporan.
    // GUDANG dan IT tidak ditampilkan sebagai IPA.
    $ipas = DB::table('ipas')
        ->whereNotIn('nama_ipa', ['GUDANG', 'IT'])
        ->orderBy('nama_ipa')
        ->get();

    // Ambil seluruh stok beserta data bahan
    $dataStok = StokIpa::with('bahan')->get();

    // Daftar bahan untuk baris laporan
    $bahans = $dataStok
        ->pluck('bahan')
        ->filter()
        ->unique('id')
        ->sortBy('nama_bahan')
        ->values();

    // Susun stok berdasarkan ID bahan dan ID IPA
    $stokMatrix = [];

    $minimumStok = GudangStokIpaSetting::query()
    ->get()
    ->keyBy(fn ($item) => $item->id_ipa . '-' . $item->id_bahan);

    foreach ($dataStok as $item) {
        $stokMatrix[$item->id_bahan][$item->id_ipa] =
            (float) $item->stok;
    }

$totalJenisBahan = $bahans->count();
$totalIpa = $ipas->count();

$stokHabis = 0;
$stokKritis = 0;

foreach ($dataStok as $item) {
    $key = $item->id_ipa . '-' . $item->id_bahan;
    $setting = $minimumStok->get($key);
    $jumlah = (float) $item->stok;

    if ($jumlah <= 0) {
        $stokHabis++;
    } elseif (
        $setting &&
        (float) $setting->stok_minimum > 0 &&
        $jumlah <= (float) $setting->stok_minimum
    ) {
        $stokKritis++;
    }
}

    return view('gudang.stok', compact(
         'ipas',
        'bahans',
        'stokMatrix',
        'minimumStok',
        'totalJenisBahan',
        'totalIpa',
        'stokHabis',
        'stokKritis'
    ));
    }
}