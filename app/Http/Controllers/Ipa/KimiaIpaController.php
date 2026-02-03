<?php

namespace App\Http\Controllers\Ipa;

use App\Http\Controllers\Controller;
use App\Models\Gudang\Bahan;
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
        $idIPa = Auth::user()->ipa;
        $bahan = Bahan::with('satuan')->orderBy('nama_bahan')->get();
        $stok = StokIpa::with(['bahan.satuan'])->where('id_ipa',$idIPa)->get();
        return view('ipa.gudangIpa',compact(['stok','bahan']));
    }
}
