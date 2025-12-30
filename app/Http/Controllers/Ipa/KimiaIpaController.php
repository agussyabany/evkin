<?php

namespace App\Http\Controllers\Ipa;

use App\Http\Controllers\Controller;
use App\Models\Gudang\Stok;
use Illuminate\Http\Request;

class KimiaIpaController extends Controller
{
    public function index()
    {
        $stok = Stok::with(['bahan.satuan'])->get();
        return view('ipa.kimia',compact(['stok']));
    }
}
