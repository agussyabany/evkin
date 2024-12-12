<?php

namespace App\Http\Controllers\Admin\Utama;

use App\Http\Controllers\Controller;
use App\Models\Utama\Peneltian;
use App\Models\Utama\PengawasFisik;
use App\Models\Utama\PerencanaanTek\Perencanaantek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class PpController extends Controller
{
    public function index ()
    {

        $startYear = 2024;
        $endYear = 2024;

        // Panggil fungsi helper
        $bulan = generateMonths($startYear, $endYear);
        return view ('admin.utama.pp',compact('bulan'));
    }

    public function store (Request $request)
    {
        //$user = Auth::user('id');
        $rab = $request->input('rab');
        $pengawasan = $request->input('pengawasan');
        $data = $request->input('data');
        $period = $request->input('periode');
        

        // Insert data into the 'barang' table
        Perencanaantek::insert([
            'rab'=> $rab,
            'bulanTahun' => $period,
            'dept' =>1,
            'user' =>1,
            'status'=>0,
            'update' =>0,
            'tabel'=>1
        ]);

        PengawasFisik::insert([
            'pengawasan'=> $pengawasan,
            'bulanTahun' => $period,
            'dept' =>1,
            'user' =>1,
            'status'=>0,
            'update' =>0,
            'tabel'=>2
        ]);

        Peneltian::insert([
            'data'=> $data,
            'bulanTahun' => $period,
            'dept' =>1,
            'user' =>1,
            'status'=>0,
            'update' =>0,
            'tabel'=>3
        ]);


       
        return redirect('/perencanaanPenelitian');
    }
}
