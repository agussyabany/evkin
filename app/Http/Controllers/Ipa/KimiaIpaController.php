<?php

namespace App\Http\Controllers\Ipa;

use App\Http\Controllers\Controller;
use App\Models\Gudang\Bahan;
use App\Models\Gudang\GudangStokIpaSetting;
use App\Models\Gudang\Stok;
use App\Models\Gudang\StokIpa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gudang\StokIpaLog;
use Carbon\Carbon;

class KimiaIpaController extends Controller
{
    public function index()
    {
        $stok = Stok::with(['bahan.satuan'])->get();
        return view('ipa.kimia',compact(['stok']));
    }
    public function ipaGudang()
{
    $idIpa = auth()->user()->ipa;

    $stok = StokIpa::with(['bahan.satuan'])
        ->where('id_ipa', $idIpa)
        ->get();

    // Ambil batas minimum berdasarkan IPA dan bahan
    $minimumStok = GudangStokIpaSetting::where('id_ipa', $idIpa)
        ->pluck('stok_minimum', 'id_bahan');

    // Masukkan stok_minimum ke setiap item stok
    $stok->each(function ($item) use ($minimumStok) {
        $item->stok_minimum = (float) ($minimumStok[$item->id_bahan] ?? 0);
    });

    return view('ipa.gudangIpa', compact('stok', 'minimumStok'));
}

    public function printStokIpa()
    {
        $idIpa = auth()->user()->ipa;

        $stok = StokIpa::with(['bahan.satuan'])
            ->where('id_ipa', $idIpa)
            ->orderBy('id_bahan')
            ->get();

        return view('ipa.print-stok', [
            'stok' => $stok,
            'idIpa' => $idIpa,
            'tanggalCetak' => now(),
        ]);
    }

    public function kartuStokIpa(Request $request)
{
    $idIpa = auth()->user()->ipa;

    // Daftar bahan yang tersedia di gudang IPA milik user
    $bahans = Bahan::whereIn(
        'id',
        StokIpa::where('id_ipa', $idIpa)
            ->select('id_bahan')
    )
    ->with('satuan')
    ->orderBy('nama_bahan')
    ->get();

    $bahanTerpilih = null;
    $logs = collect();

    $tanggalAwal = $request->tanggal_awal;
    $tanggalAkhir = $request->tanggal_akhir;

    // Jika pengguna sudah memilih bahan dan periode
    if (
        $request->filled('id_bahan') &&
        $request->filled('tanggal_awal') &&
        $request->filled('tanggal_akhir')
    ) {
        $request->validate([
            'id_bahan' => ['required', 'integer'],
            'tanggal_awal' => ['required', 'date'],
            'tanggal_akhir' => [
                'required',
                'date',
                'after_or_equal:tanggal_awal'
            ],
        ]);

        // Pastikan bahan memang terdaftar pada IPA pengguna
        $stokIpa = StokIpa::where('id_ipa', $idIpa)
            ->where('id_bahan', $request->id_bahan)
            ->first();

        if (!$stokIpa) {
            abort(403, 'Bahan tidak tersedia pada gudang IPA Anda.');
        }

        $bahanTerpilih = Bahan::with('satuan')
            ->findOrFail($request->id_bahan);

        // Ambil riwayat mutasi sesuai IPA, bahan, dan periode
        $logs = StokIpaLog::with(['bahan', 'userRelasi'])
            ->where('id_ipa', $idIpa)
            ->where('id_bahan', $request->id_bahan)
            ->whereBetween('created_at', [
                Carbon::parse($tanggalAwal)->startOfDay(),
                Carbon::parse($tanggalAkhir)->endOfDay(),
            ])
            ->orderBy('created_at')
            ->orderBy('id')
            ->get();
    }

    return view('ipa.kartu-stok-ipa', compact(
        'bahans',
        'bahanTerpilih',
        'logs',
        'tanggalAwal',
        'tanggalAkhir'
    ));
}
public function printKartuStok(Request $request, $id_bahan)
{
    $idIpa = auth()->user()->ipa;

    $request->validate([
        'tanggal_awal' => 'nullable|date',
        'tanggal_akhir' => 'nullable|date|after_or_equal:tanggal_awal',
    ]);

    // Pastikan bahan merupakan stok IPA pengguna
    $stokIpa = StokIpa::where('id_ipa', $idIpa)
        ->where('id_bahan', $id_bahan)
        ->firstOrFail();

    $bahan = Bahan::with('satuan')
        ->findOrFail($id_bahan);

    // Ambil riwayat mutasi
    $query = StokIpaLog::with('userRelasi')
        ->where('id_ipa', $idIpa)
        ->where('id_bahan', $id_bahan);

    if ($request->filled('tanggal_awal')) {
        $query->whereDate(
            'created_at',
            '>=',
            $request->tanggal_awal
        );
    }

    if ($request->filled('tanggal_akhir')) {
        $query->whereDate(
            'created_at',
            '<=',
            $request->tanggal_akhir
        );
    }

    $logs = $query
        ->orderBy('created_at')
        ->orderBy('id')
        ->get();

    $stokSekarang = $stokIpa->stok ?? 0;

    $tanggalAwal = $request->tanggal_awal;
    $tanggalAkhir = $request->tanggal_akhir;
    $tanggalCetak = now();

    return view('ipa.print-kartu-stok', compact(
        'bahan',
        'logs',
        'stokSekarang',
        'tanggalAwal',
        'tanggalAkhir',
        'tanggalCetak'
    ));
}
}
