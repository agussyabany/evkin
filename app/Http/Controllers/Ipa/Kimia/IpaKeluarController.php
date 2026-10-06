<?php

namespace App\Http\Controllers\Ipa\Kimia;

use App\Http\Controllers\Controller;
use App\Models\Gudang\IpaKeluar;
use App\Models\Gudang\IpaTrxKeluar;
use App\Models\Gudang\StokIpa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            $idIpa = $user->id_ipa;

            /*
            |--------------------------------------------------------------------------
            | Header transaksi
            |--------------------------------------------------------------------------
            */

            $header =IpaKeluar::create([
                'id_transaksi' => $request->no_transaksi,
                'id_ipa'       => $idIpa,
                'user'         => $user->id,
            ]);

            /*
            |--------------------------------------------------------------------------
            | Detail transaksi
            |--------------------------------------------------------------------------
            */

            foreach ($request->items as $item) {

                $jumlah = (float) $item['jumlah'];

                // Cari stok IPA
                $stok = StokIpa::where('id_ipa', $idIpa)
                    ->where('id_bahan', $item['id_bahan'])
                    ->lockForUpdate()
                    ->first();

                if (!$stok) {
                    throw new \Exception(
                        'Stok bahan tidak ditemukan.'
                    );
                }

                /*
                |--------------------------------------------------------------------------
                | Cek stok
                |--------------------------------------------------------------------------
                */

                if ($jumlah > $stok->stok) {

                    $bahan = $stok->bahan
                        ? $stok->bahan->nama_bahan
                        : 'Bahan ID ' . $item['id_bahan'];

                    throw new \Exception(
                        "Stok {$bahan} tidak mencukupi. " .
                        "Stok tersedia: {$stok->stok}"
                    );
                }

                /*
                |--------------------------------------------------------------------------
                | Simpan detail transaksi
                |--------------------------------------------------------------------------
                */

                IpaTrxKeluar::create([
                    'id_transaksi' => $request->no_transaksi,
                    'id_bahan'     => $item['id_bahan'],
                    'id_satuan'    => $item['id_satuan'],
                    'jumlah'       => $jumlah,
                    'id_ipa'       => $idIpa,
                    'user'         => $user->id,
                ]);

                /*
                |--------------------------------------------------------------------------
                | Kurangi stok IPA
                |--------------------------------------------------------------------------
                */

                $stok->stok = $stok->stok - $jumlah;
                $stok->save();
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


}
