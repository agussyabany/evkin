<?php

namespace App\Http\Controllers\Ipa\Kimia;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array'
        ]);

        DB::transaction(function() use ($request) {

            $idIpa = auth()->user()->ipa;
            $userId = auth()->id();

            // generate nomor transaksi
            $no = 'KLR-IPA-' . now()->format('YmdHis');

            // insert header
            $trx = DB::table('gudang_ipa_keluar')->insertGetId([
                'id_transaksi' => $no,
                'id_ipa'       => $idIpa,
                'user'         => $userId,
                'created_at'   => now(),
                'updated_at'   => now()
            ]);

            foreach ($request->items as $item) {

                // insert detail transaksi
                DB::table('gudang_ipatrx_keluar')->insert([
                    'id_transaksi' => $trx,
                    'id_bahan'     => $item['id_bahan'],
                    'id_satuan'    => $item['id_satuan'],
                    'jumlah'       => $item['jumlah'],
                    'id_ipa'       => $idIpa,
                    'user'         => $userId,
                    'created_at'   => now(),
                    'updated_at'   => now()
                ]);

                // kurangi stok IPA
                $stok = StokIpa::where('id_ipa', $idIpa)
                    ->where('id_bahan', $item['id_bahan'])
                    ->lockForUpdate()
                    ->first();

                if (!$stok || $stok->stok < $item['jumlah']) {
                    throw new \Exception("Stok tidak cukup untuk bahan ID " . $item['id_bahan']);
                }

                $stok->decrement('stok', $item['jumlah']);
            }

        });

        return response()->json([
            'message' => 'Bahan berhasil dikeluarkan dari gudang IPA'
        ]);
    }
}
