<?php

namespace App\Http\Controllers\Ipa;

use App\Http\Controllers\Controller;
use App\Models\Gudang\Bahan;
use App\Models\Gudang\GudangStokIpaSetting;
use App\Models\Gudang\Stok;
use App\Models\Gudang\StokIpa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    return view('ipa.gudangIpa', compact('stok', 'minimumStok'));
    }
}
