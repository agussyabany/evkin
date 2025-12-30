<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\Gudang\GudangMasuk;
use App\Models\Gudang\GudangTrxMasuk;
use Illuminate\Http\Request;

class LaporanMasukController extends Controller
{
    public function index ()
    {
        $transaksi= GudangMasuk::get();
        return view('gudang.masuk',compact(['transaksi']));
    }

    public function detail($id)
{
    $header = GudangMasuk::findOrFail($id);

    $detail = GudangTrxMasuk::with(['bahan.satuan'])
        ->where('id_masuk', $id)
        ->get();

    return response()->json([
        'header' => $header,
        'detail' => $detail
    ]);
}
}
