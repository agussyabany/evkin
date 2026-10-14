<?php

namespace App\Http\Controllers\Ipa\Kimia;

use App\Http\Controllers\Controller;
use App\Models\Gudang\IpaKeluar;
use App\Models\Gudang\IpaTrxKeluar;
use App\Models\Gudang\StokIpa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gudang\StokIpaLog;
class IpaKeluarController extends Controller
{
    public function index()
    {
        $idIpa = auth()->user()->id_ipa;

        $stok = StokIpa::with(['bahan.satuan'])
            ->where('id_ipa', $idIpa)
            ->get();

        return view('ipa.gudangIpa', compact('stok'));
    }

    /**
     * Simpan transaksi bahan kimia keluar dari Gudang IPA
     */
    public function store(Request $request)
{
    $request->validate([
        'no_transaksi' => 'required|string',
        'items' => 'required|array|min:1',
        'items.*.id_bahan' => 'required|integer',
        'items.*.id_satuan' => 'required|integer',
        'items.*.jumlah' => 'required|numeric|min:0.01',
    ]);

    DB::beginTransaction();

    try {
        $user = auth()->user();
        $idIpa = $user->ipa;

        // Header transaksi
        $header = IpaKeluar::create([
            'id_transaksi' => $request->no_transaksi,
            'id_ipa'       => $idIpa,
            'user'         => $user->id,
        ]);

        // Detail transaksi dan pengurangan stok
        foreach ($request->items as $item) {
            $jumlah = (float) $item['jumlah'];

            $stok = StokIpa::where('id_ipa', $idIpa)
                ->where('id_bahan', $item['id_bahan'])
                ->lockForUpdate()
                ->first();

            if (!$stok) {
                throw new \Exception('Stok bahan tidak ditemukan.');
            }

            if ($jumlah > $stok->stok) {
                $bahan = $stok->bahan
                    ? $stok->bahan->nama_bahan
                    : 'Bahan ID ' . $item['id_bahan'];

                throw new \Exception(
                    "Stok {$bahan} tidak mencukupi. " .
                    "Stok tersedia: {$stok->stok}"
                );
            }

            // Simpan detail transaksi
            IpaTrxKeluar::create([
                'id_transaksi' => $request->no_transaksi,
                'id_bahan'     => $item['id_bahan'],
                'id_satuan'    => $item['id_satuan'],
                'jumlah'       => $jumlah,
                'id_ipa'       => $idIpa,
                'user'         => $user->id,
            ]);

            // Catat saldo sebelum dan sesudah pengeluaran
            $stokAwal = (float) $stok->stok;
            $stokAkhir = $stokAwal - $jumlah;

            $stok->stok = $stokAkhir;
            $stok->save();

            // Catat kartu stok IPA
            StokIpaLog::create([
                'id_ipa'       => $idIpa,
                'id_bahan'     => $item['id_bahan'],
                'jenis'        => 'keluar',
                'awal'         => $stokAwal,
                'jumlah'       => $jumlah,
                'akhir'        => $stokAkhir,
                'id_transaksi' => $request->no_transaksi,
                'user_id'      => $user->id,
            ]);
        }

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Transaksi bahan kimia keluar berhasil disimpan.',
            'no_transaksi' => $request->no_transaksi,
        ]);

    } catch (\Throwable $e) {
        DB::rollBack();

        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
        ], 422);
    }
}

   public function transaksiKeluar()
{
    $idIpa = auth()->user()->ipa;

    $transaksi = \App\Models\Gudang\IpaKeluar::with([
        'detail',
        'userRelasi'
    ])
        ->where('id_ipa', $idIpa)
        ->orderByDesc('created_at')
        ->get();

    return view('ipa.transaksiKeluar', compact('transaksi'));
}

public function detailKeluar($id)
{
    $idIpa = auth()->user()->ipa;

    $transaksi = \App\Models\Gudang\IpaKeluar::with([
        'detail.bahan.satuan',
        'detail.satuan'
    ])
        ->where('id_ipa', $idIpa)
        ->where('id_transaksi', $id)
        ->firstOrFail();

    return response()->json([
        'transaksi' => $transaksi,
        'detail' => $transaksi->detail
    ]);
}

public function batalKeluar($id)
{
    try {
        DB::transaction(function () use ($id) {

            $user = auth()->user();
            $idIpa = $user->ipa;

            // Cari transaksi milik IPA yang sedang login
            $transaksi = IpaKeluar::where('id_ipa', $idIpa)
                ->where('id_transaksi', $id)
                ->lockForUpdate()
                ->firstOrFail();

            // Cegah pembatalan ganda
            if ($transaksi->status === 'batal') {
                throw new \RuntimeException(
                    'Transaksi ini sudah dibatalkan.'
                );
            }

            // Ambil detail transaksi
            $details = IpaTrxKeluar::where(
                'id_transaksi',
                $transaksi->id_transaksi
            )->get();

            if ($details->isEmpty()) {
                throw new \RuntimeException(
                    'Detail transaksi tidak ditemukan.'
                );
            }

            foreach ($details as $detail) {

                // Kunci stok IPA
                $stok = StokIpa::where('id_ipa', $idIpa)
                    ->where('id_bahan', $detail->id_bahan)
                    ->lockForUpdate()
                    ->first();

                if (!$stok) {
                    throw new \RuntimeException(
                        'Data stok IPA tidak ditemukan untuk bahan ID ' .
                        $detail->id_bahan
                    );
                }

                // Saldo sebelum pengembalian
                $stokAwal = (float) $stok->stok;

                // Jumlah yang dikembalikan
                $jumlahKembali = (float) $detail->jumlah;

                // Saldo setelah pengembalian
                $stokAkhir = $stokAwal + $jumlahKembali;

                // Update stok
                $stok->stok = $stokAkhir;
                $stok->save();

                // Catat pembatalan ke kartu stok
                StokIpaLog::create([
                    'id_ipa'       => $idIpa,
                    'id_bahan'     => $detail->id_bahan,
                    'jenis'        => 'pembatalan',
                    'awal'         => $stokAwal,
                    'jumlah'       => $jumlahKembali,
                    'akhir'        => $stokAkhir,
                    'id_transaksi' => $transaksi->id_transaksi,
                    'user_id'      => $user->id,
                ]);
            }

            // Tandai transaksi dibatalkan
            $transaksi->status = 'batal';
            $transaksi->save();
        });

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dibatalkan. Stok telah dikembalikan.'
        ]);

    } catch (\Throwable $e) {

        $statusCode = $e instanceof
            \Illuminate\Database\Eloquent\ModelNotFoundException
                ? 404
                : 422;

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], $statusCode);
    }
}

public function kartuStok(Request $request, $id_bahan)
{
    $idIpa = auth()->user()->ipa;

    $request->validate([
        'tanggal_awal'  => 'nullable|date',
        'tanggal_akhir' => 'nullable|date|after_or_equal:tanggal_awal',
    ]);

    $bahan = \App\Models\Gudang\Bahan::findOrFail($id_bahan);

    $query = StokIpaLog::with('userRelasi')
        ->where('id_ipa', $idIpa)
        ->where('id_bahan', $id_bahan);

    if ($request->filled('tanggal_awal')) {
        $query->whereDate('created_at', '>=', $request->tanggal_awal);
    }

    if ($request->filled('tanggal_akhir')) {
        $query->whereDate('created_at', '<=', $request->tanggal_akhir);
    }

    $logs = $query
        ->orderBy('created_at')
        ->orderBy('id')
        ->get();

    $stokSekarang = \App\Models\Gudang\StokIpa::where('id_ipa', $idIpa)
        ->where('id_bahan', $id_bahan)
        ->value('stok') ?? 0;

    return view('ipa.kartu-stok', compact(
        'bahan',
        'logs',
        'stokSekarang'
    ));
}


}
