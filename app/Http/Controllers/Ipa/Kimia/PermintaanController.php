<?php

namespace App\Http\Controllers\Ipa\Kimia;

use App\Http\Controllers\Controller;
use App\Models\Gudang\Stok;
use App\Models\Ipa\Kimia\Permintaan;
use App\Models\Ipa\Kimia\PermintaanDetail;
use App\Models\Ipa\Kimia\PermintaanLog;
use App\Models\Ipa\Kimia\StokLog;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermintaanController extends Controller
{
    private function draft()
    {
        return Permintaan::firstOrCreate(
            ['user_id'=>auth()->id(), 'status'=>0],
            [
                'id_ipa'=>auth()->user()->ipa,
                'no_permintaan'=>'PR-'.now()->format('YmdHis')
            ]
        );
    }

    public function index()
    {
        $stok = Stok::with('bahan.satuan')->get();
        $permintaan = Permintaan::with('details.bahan.satuan.statusRelasi.user')
            ->where('user_id', auth()->id())
            ->where('status', 0)
            ->first();

        return view('ipa.kimia',compact('stok','permintaan'));
    }

    

    public function addCart(Request $request)
{
    $permintaan = $this->draft();

    PermintaanDetail::firstOrCreate(
        [
            'permintaan_id' => $permintaan->id,
            'id_bahan' => $request->bahan_id
        ],
        [
            'qty' => 0,
            'kg'  => 0
        ]
    );

    return response()->json(['success' => true]);
}

public function getDraft()
{
    $permintaan = $this->draft();

    return response()->json([
        'no_permintaan' => $permintaan->no_permintaan
    ]);
}

public function updateCart(Request $request)
{
    $permintaan = $this->draft();

    PermintaanDetail::where('permintaan_id', $permintaan->id)
        ->where('id_bahan', $request->bahan_id)
        ->update([
            'qty' => $request->qty,
        ]);

    return response()->json(['success' => true]);
}

public function deleteCart(Request $request)
{
    $permintaan = $this->draft();

    PermintaanDetail::where('permintaan_id', $permintaan->id)
        ->where('id_bahan', $request->bahan_id)
        ->delete();

    return response()->json(['success' => true]);
}

public function submit(Request $request)
{
    $permintaan = Permintaan::where('no_permintaan', $request->no_permintaan)
        ->where('status', 0)
        ->firstOrFail();

    $permintaan->update([
        'status' => 1
    ]);

    PermintaanLog::create([
            'permintaan_id' => $permintaan->id,
            'status'        => 1,
            'user_id'       => auth()->id(),
            'id_ipa'        => auth()->user()->ipa,
            'id_jabatan'    => auth()->user()->jabatan
        ]);

    return response()->json(['success' => true]);
}

public function destroyDraft($id)
{
    $permintaan = Permintaan::where('id', $id)
        ->where('status', 0)
        ->where('user_id', auth()->id())
        ->first();

    if ($permintaan) {
        $permintaan->details()->delete();
        $permintaan->delete();
    }

    return response()->json(['success'=>true]);
}

public function kirim(Request $request, $id)
{
    
    DB::transaction(function () use ($request, $id) {

        $permintaan = Permintaan::with('details')->findOrFail($id);

        foreach ($request->items as $item) {

            $detail = PermintaanDetail::findOrFail($item['detail_id']);

            $stokGudang = Stok::where('id_bahan', $detail->id_bahan)
                ->lockForUpdate() // 🔒 PENTING (anti race condition)
                ->first();

            $stokAwal = $stokGudang->stok;
            $realisasi = min($item['qty'], $stokAwal);

            // 1️⃣ LOG STOK
            StokLog::create([
                'id_bahan'      => $detail->id_bahan,
                'awal'     => $stokAwal,
                'keluar'   => $realisasi,
                'akhir'    => $stokAwal - $realisasi,
                'permintaan_id'=> $permintaan->id,
                'user_id'       => auth()->id(),
            ]);

            // 2️⃣ UPDATE STOK GUDANG
            $stokGudang->update([
                'stok' => $stokAwal - $realisasi
            ]);

            // 3️⃣ UPDATE DETAIL PERMINTAAN
            $detail->update([
                'real' => $realisasi,
                'ket' => $realisasi < $detail->qty
                    ? 'Stok Kurang'
                    : 'Sesuai'
            ]);
        }

        // 4️⃣ UPDATE STATUS PERMINTAAN
        $permintaan->update([
            'status' => 4
        ]);

        // 5️⃣ LOG STATUS
        PermintaanLog::create([
            'permintaan_id' => $permintaan->id,
            'status'        => 4,
            'user_id'       => auth()->id(),
            'id_ipa'        => auth()->user()->id_ipa,
            'id_jabatan'    => auth()->user()->jabatan
        ]);
    });

    return response()->json([
        'message' => 'Barang Siap dikirim'
    ]);
}

            public function suratJalan($id)
{
    $permintaan = Permintaan::with([
        'details.bahan.satuan',
        'ipa',
        'user',
        'logs.user',
        'logs.statusRelasi'
    ])->findOrFail($id);

    // Ambil penandatangan dari LOG
    $asmenIpa = $permintaan->logs
        ->where('status', 2) // DISSETUJUI ASMEN IPA
        ->last();

    $asmenGudang = $permintaan->logs
        ->where('status', 3) // DISSETUJUI ASMEN GUDANG
        ->last();

    $petugasGudang = $permintaan->logs
        ->whereIn('status', [4,5]) // DIMUAT / DIKIRIM
        ->last();

    $pdf = Pdf::loadView('gudang.surat_jalan', [
        'permintaan'     => $permintaan,
        'asmenIpa'       => $asmenIpa,
        'asmenGudang'    => $asmenGudang,
        'petugasGudang'  => $petugasGudang,
    ])->setPaper('A4', 'portrait');

    return $pdf->stream(
        'Surat-Jalan-'.$permintaan->no_permintaan.'.pdf'
    );
}


}
