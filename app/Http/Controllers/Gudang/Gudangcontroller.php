<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\Gudang\Bahan;
use App\Models\Gudang\Stok;
use App\Models\Ipa\Kimia\StokLog;
use Illuminate\Http\Request;

class Gudangcontroller extends Controller
{
    public function index()
    {
        $bahan = Bahan::with('satuan')->orderBy('nama_bahan')->get();
        $stok = Stok::with(['bahan.satuan'])->get();
        return view('gudang.gudang',compact(['bahan','stok']));
    }

            public function kartuStok($id)
        {
            $bahan = Bahan::with('satuan')->findOrFail($id);

            $stok = Stok::where('id_bahan', $id)
                ->value('stok') ?? 0;

            $logs = StokLog::with('user')
                ->where('id_bahan', $id)
                ->latest()
                ->get();

            return response()->json([
                'bahan' => $bahan,
                'stok' => $stok,
                'total_masuk' => $logs->sum('masuk'),
                'total_keluar' => $logs->sum('keluar'),
                'logs' => $logs
            ]);
        }
}
