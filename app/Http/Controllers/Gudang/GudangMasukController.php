<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\Gudang\Bahan;
use App\Models\Gudang\GudangMasuk;
use App\Models\Gudang\GudangTrxMasuk;
use App\Models\Gudang\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GudangMasukController extends Controller
{
    public function noTransaksi()
    {
        $tgl = date('Ymd');

        $last = GudangMasuk::whereDate('created_at', now()->toDateString())
            ->orderByDesc('id')
            ->first();

        $urut = $last ? ((int)substr($last->no_transaksi, -3)) + 1 : 1;

        return response()->json([
            'no_transaksi' => 'GD-' . $tgl . '-' . str_pad($urut, 3, '0', STR_PAD_LEFT)
        ]);
    }

    // =============================
    // TAMBAH ITEM (AUTO HEADER)
    // =============================
    public function addItem(Request $request)
    {
        DB::beginTransaction();
        try {

            // 🔹 BUAT HEADER JIKA BELUM ADA
            if (!$request->id_masuk) {
                $idMasuk = GudangMasuk::insertGetId([
                    'no_transaksi' => $request->no_transaksi,
                    'faktur' => $request->faktur,
                    'tgl_faktur' => $request->tglSurat,
                    'supplier' => $request->supplier,
                    'status' => 0,
                    'user' => auth()->user()->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } else {
                $idMasuk = $request->id_masuk;
            }

            // 🔹 AMBIL DATA BAHAN
            $bahan = Bahan::with('satuan')->find($request->id_bahan);

                if (!$bahan || !$bahan->satuan) {
                    throw new \Exception('Satuan bahan tidak ditemukan');
                }

            // 🔹 HITUNG TOTAL KG
            $totalKg = $request->jumlah * $bahan->ukuran;

            // 🔹 SIMPAN DETAIL
            $detailId = GudangTrxMasuk::insertGetId([
                'id_masuk' => $idMasuk,
                'id_bahan' => $request->id_bahan,
                'jumlah' => $request->jumlah,
                'status' => 1,
                'user' => auth()->user()->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'id_masuk' => $idMasuk,
                'detail_id' => $detailId,
                'nama_bahan' => $bahan->nama_bahan,
                'satuan' => $bahan->satuan->nama_satuan,
                'total_kg'=>$totalKg
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
           return response()->json([
            'success' => false,
            'error' => $e->getMessage(),
            'line' => $e->getLine()
    ]);
        }
    }

     // =============================
    // DELETE ITEM (DETAIL)
    // =============================

            public function deleteItem($id)
        {
            DB::beginTransaction();
            try {

                // pastikan item ada
                $item = GudangTrxMasuk::find($id);
                if (!$item) {
                    throw new \Exception('Item tidak ditemukan');
                }

                // hapus item
                $item->delete();

                DB::commit();
                return response()->json(['success' => true]);

            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'error' => $e->getMessage()
                ]);
            }
        }

    // ==========================
    // FINALISASI + UPDATE STOK
    // ==========================
    public function finalisasi($id)
{
    DB::beginTransaction();
    try {

        $header = GudangMasuk::findOrFail($id);

        // cegah double final
        if ($header->status == 1) {
            return response()->json(['success' => false, 'msg' => 'Sudah difinalisasi']);
        }

        $items = GudangTrxMasuk::where('id_masuk', $id)->get();

        foreach ($items as $i) {

            $stok = Stok::where('id_bahan', $i->id_bahan)->first();

            if ($stok) {
                // 🔄 UPDATE
                $stok->stok += $i->jumlah;
                $stok->save();
            } else {
                // ➕ INSERT BARU
                Stok::create([
                    'id_bahan' => $i->id_bahan,
                    'stok' => $i->jumlah
                ]);
            }
        }

        $header->update(['status' => 1]);

        DB::commit();
        return response()->json(['success' => true]);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'success' => false,
            'error' => $e->getMessage()
        ]);
    }
}


    // ==========================
    // FINALISASI + UPDATE STOK
    // ==========================
        public function cancel($id)
        {
            DB::beginTransaction();
            try {

                $trx = GudangMasuk::find($id);

                // hanya hapus jika masih draft
                if ($trx && $trx->status == 0) {
                    GudangTrxMasuk::where('id_masuk', $id)->delete();
                    $trx->delete();
                }

                DB::commit();
                return response()->json(['success' => true]);

            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'error' => $e->getMessage()
                ]);
            }
        }
}
