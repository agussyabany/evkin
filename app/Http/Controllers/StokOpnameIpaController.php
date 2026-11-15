<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StokOpnameIpa;
use App\Models\StokOpnameIpaDetail;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;

class StokOpnameIpaController extends Controller
{
    public function index()
    {
        $idIpa = auth()->user()->ipa;

        $opname = StokOpnameIpa::with('petugas')
            ->where('id_ipa', $idIpa)
            ->latest()
            ->get();

        return view('stok-opname-ipa.index', compact('opname'));
    }

    public function create()
    {
        $idIpa = auth()->user()->ipa;

        $bahan = DB::table('gudang_stok_ipa as stok')
            ->join('gudang_bahan as bahan', 'bahan.id', '=', 'stok.id_bahan')
            ->where('stok.id_ipa', $idIpa)
            ->select(
                'bahan.id',
                'bahan.nama_bahan',
                'stok.stok'
            )
            ->orderBy('bahan.nama_bahan')
            ->get();

        return view('stok-opname-ipa.create', compact('bahan'));
    }


public function store(Request $request)
{
    $user = auth()->user();
    $idIpa = $user->ipa;

    // Validasi input
    $validated = $request->validate([
        'periode' => 'required|date_format:Y-m',
        'tanggal_opname' => 'required|date',
        'stok_fisik' => 'required|array|min:1',
        'stok_fisik.*' => 'required|numeric|min:0',
        'catatan' => 'nullable|string|max:1000',
    ]);

    // Simpan periode sebagai tanggal pertama setiap bulan
    $periode = Carbon::createFromFormat(
        'Y-m',
        $validated['periode']
    )->startOfMonth()->toDateString();

    $tanggalOpname = $validated['tanggal_opname'];

    DB::transaction(function () use (
        $validated,
        $user,
        $idIpa,
        $periode,
        $tanggalOpname
    ) {

        // 1. Cek apakah periode sudah pernah diopname
        $sudahAda = DB::table('stok_opname_ipa')
            ->where('id_ipa', $idIpa)
            ->where('periode', $periode)
            ->exists();

        if ($sudahAda) {
            throw ValidationException::withMessages([
                'periode' => 'Stok opname untuk IPA ini pada periode tersebut sudah pernah dibuat.'
            ]);
        }

        // 2. Ambil dan kunci seluruh saldo stok IPA
        $stokList = DB::table('gudang_stok_ipa')
            ->where('id_ipa', $idIpa)
            ->orderBy('id_bahan')
            ->lockForUpdate()
            ->get();

        if ($stokList->isEmpty()) {
            throw ValidationException::withMessages([
                'stok_fisik' => 'Belum terdapat data stok pada gudang IPA ini.'
            ]);
        }

        // 3. Pastikan semua bahan yang memiliki saldo diinput
        $idBahanDatabase = $stokList
            ->pluck('id_bahan')
            ->map(fn ($id) => (string) $id)
            ->sort()
            ->values()
            ->all();

        $idBahanInput = collect(array_keys($validated['stok_fisik']))
            ->map(fn ($id) => (string) $id)
            ->sort()
            ->values()
            ->all();

        if ($idBahanDatabase !== $idBahanInput) {
            throw ValidationException::withMessages([
                'stok_fisik' => 'Data bahan tidak sesuai dengan daftar stok IPA. Silakan muat ulang halaman.'
            ]);
        }

        // 4. Buat nomor opname
        $noOpname = 'SO-IPA' . $idIpa . '-' .
            Carbon::parse($periode)->format('Ym');

        $now = now();

        // 5. Buat header opname
        $opnameId = DB::table('stok_opname_ipa')
            ->insertGetId([
                'no_opname' => $noOpname,
                'id_ipa' => $idIpa,
                'periode' => $periode,
                'tanggal_opname' => $tanggalOpname,
                'user_id' => $user->id,
                'catatan' => $validated['catatan'] ?? null,
                'posted_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

        // 6. Proses setiap bahan
        foreach ($stokList as $stok) {

            $stokSistem = round((float) $stok->stok, 2);

            $stokFisik = round(
                (float) $validated['stok_fisik'][$stok->id_bahan],
                2
            );

            $selisih = round($stokFisik - $stokSistem, 2);

            // Simpan detail opname
            DB::table('stok_opname_ipa_detail')
                ->insert([
                    'stok_opname_id' => $opnameId,
                    'id_bahan' => $stok->id_bahan,
                    'stok_sistem' => $stokSistem,
                    'stok_fisik' => $stokFisik,
                    'selisih' => $selisih,
                    'keterangan' => null,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);

            // Jika tidak ada selisih, tidak perlu update saldo/log
            if ($selisih == 0) {
                continue;
            }

            // 7. Update saldo stok IPA
            DB::table('gudang_stok_ipa')
                ->where('id', $stok->id)
                ->update([
                    'stok' => $stokFisik,
                    'updated_at' => $now,
                ]);

            // 8. Catat log transaksi
            DB::table('gudang_stok_ipa_log')
                ->insert([
                    'id_ipa' => $idIpa,
                    'id_bahan' => $stok->id_bahan,
                    'jenis' => $selisih > 0 ? 'masuk' : 'keluar',
                    'awal' => $stokSistem,
                    'jumlah' => abs($selisih),
                    'akhir' => $stokFisik,
                    'id_transaksi' => $opnameId,
                    'user_id' => $user->id,
                    'referensi_tipe' => 'stok_opname',
                    'keterangan' => 'Penyesuaian stok berdasarkan hasil stok opname ' . $noOpname,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
        }
    });

    return redirect()
        ->route('stok-opname-ipa.index')
        ->with('success', 'Stok opname berhasil diposting.');
}

}