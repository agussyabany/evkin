<?php

namespace App\Http\Controllers\Ipa\Kimia;

use App\Http\Controllers\Controller;
use App\Models\Ipa\Kimia\Permintaan;
use App\Models\Ipa\Kimia\PermintaanDetail;
use App\Models\Ipa\Kimia\PermintaanLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
        public function index()
        {
            $idIpa = Auth::user()->ipa;
            if (Auth::user()->hasAnyRole(['gudang'])) {
               $permintaan = Permintaan::with('ipa')->get(); 
            }else{
                $permintaan = Permintaan::with('ipa')->where('id_ipa',$idIpa)->get();
            }
            
            return view('ipa.permintaan',compact(['permintaan']));
        }

            public function detail($id)
        {
            
            $header = Permintaan::with(['statusRelasi','ipa'])->findOrFail($id);

            $detail = PermintaanDetail::with(['bahan.satuan','bahan.stokGudang','keterangans'])
                ->where('permintaan_id', $id)
                ->get();

            return response()->json([
                'header' => $header,
                'detail' => $detail
            ]);
        }

        public function approve(Request $request, $id)
    {
        // $request->validate([
        //     'status' => 'required|intger'
        // ]);

        DB::transaction(function () use ($request, $id) {

            $permintaan = Permintaan::findOrFail($id);
            // 1️⃣ Update status permintaan
            $permintaan->update([
                'status' => $request->status
            ]);

            // 2️⃣ Simpan log approval
            PermintaanLog::create([
                'permintaan_id' => $permintaan->id,
                'status'        => $request->status,
                'user_id'       => auth()->id(),
                'id_ipa'        => auth()->user()->ipa, // ⬅️ PENTING
                'id_jabatan'    => auth()->user()->jabatan
            ]);
        });

        return redirect()->back()
            ->with('success', 'Permintaan berhasil disetujui Asmen IPA');
    }
}
