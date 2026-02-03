<?php

namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\Gudang\Bahan;
use App\Models\Gudang\Stok;
use Illuminate\Http\Request;

class Gudangcontroller extends Controller
{
    public function index()
    {
        $bahan = Bahan::with('satuan')->orderBy('nama_bahan')->get();
        $stok = Stok::with(['bahan.satuan'])->get();
        return view('gudang.gudang',compact(['bahan','stok']));
    }
}
