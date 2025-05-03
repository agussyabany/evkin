<?php

namespace App\Http\Controllers\Admin\Utama;

use App\Http\Controllers\Controller;
use App\Models\Utama\Peneltian;
use App\Models\Utama\PengawasFisik;
use App\Models\Utama\PerencanaanTek\Perencanaantek;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class PpController extends Controller
{
    public function index ()
    {

        $yearNow = Carbon::now()->year;
        $startYear =  $yearNow;
        $endYear =  $yearNow;
        $bulan = generateMonths($startYear, $endYear);
         
        $perencanaan = Perencanaantek::orderBy('id', 'ASC')->get();
        $rencanaSum = Perencanaantek::sum('rab');
        $rencanaNow = Perencanaantek::select('rab')->orderBy('id', 'DESC')->first();
        $rab = $rencanaNow->rab;


        $pengawasan = PengawasFisik::orderBy('id', 'ASC')->get();
        $awasSum = PengawasFisik::sum('pengawasan');
        $awasNow = PengawasFisik::select('pengawasan')->orderBy('id', 'DESC')->first();
        $awas = $awasNow->pengawasan;

        $penelitian = Peneltian::orderBy('id', 'ASC')->get();
        $telitiSum = Peneltian::sum('data');
        $telitiNow = Peneltian::select('data')->orderBy('id', 'DESC')->first();
        $teliti= $telitiNow->data;
        return view ('admin.utama.pp',compact('bulan','perencanaan','pengawasan','penelitian','rencanaSum','rab','awasSum','awas','telitiSum','teliti'));
    }

    public function store (Request $request)
    {
        //return $request;
        
        $rab = $request->input('rab');
        $pengawasan = $request->input('pengawasan');
        $data = $request->input('data');
        $period = $request->input('periode');
        

        Perencanaantek::create([
            'rab' => $rab,
            'bulanTahun' => $period,
            'dept' => 1,
            'user' => 1,
            'status' => 0,
            'update' => 0,
            'tabel' => 1,
        ]);

        PengawasFisik::create([
            'pengawasan'=> $pengawasan,
            'bulanTahun' => $period,
            'dept' =>1,
            'user' =>1,
            'status'=>0,
            'update' =>0,
            'tabel'=>2
        ]);

        Peneltian::create([
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
