<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Evkin\Keuangan;
use App\Models\Evkin\Operasional;
use App\Models\Evkin\Pelayanan;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function utama ()
    {
        $on = 1;
        return view('mobile',compact(['on']));
    }
    public function kinerja ()
    {
        // $on = 1;
        // $terDistirbusi = Operasional::sum('terDistirbusi');
        // $airterjual = Operasional::sum('airTerjual');
        // $HitungNrw = (($terDistirbusi - $airterjual) / $terDistirbusi) * 100;
        // $nrw = round($HitungNrw, 2);


        // $JmlPnddkTrlyni = Pelayanan::select('JmlPnddkTrlyni')->orderBy('id', 'DESC')->first();
        // $jmlPndkWil = Pelayanan::select('jmlPndkWil')->orderBy('id', 'DESC')->first();

        // if ($JmlPnddkTrlyni && $jmlPndkWil) {
        //     $HitungCakupan = ($JmlPnddkTrlyni->JmlPnddkTrlyni / $jmlPndkWil->jmlPndkWil) * 100;
        //     $cakupan = round($HitungCakupan, 2); // Bulatkan hasil
        // } else {
        //     $cakupan = null; 
        // }

        // $nilaiLaba = Keuangan::sum('labaStlPjk');
        // $laba = $this->formatNumber($nilaiLaba, 2, '.', '');
        // $nilaiLabaModal = number_format($nilaiLaba, 0, '.', '.');
        // $bulanan = keuangan::select('labaStlPjk','bulanTahun')->get();

        return view('mobile.home');
    }

    public function keuangan ()
    {
       $on = 2;
        return view('mobile.keuangan',compact(['on']));
    }

    public function operasional ()
    {   
        $on = 3;
        return view('mobile.operasional',compact(['on']));
    }

    public function pelayanan ()
    {
        $on = 4 ;
        return view('mobile.pelayanan',compact(['on']));
    }

    public function sdm ()
    {
        $on= 5;
        return view('mobile.sdm',compact(['on']));
    }

    private function formatNumber($number)
    {
        $number /= 1000000000; // Konversi ke miliar
        return number_format($number, 2, '.', ''); // 2 desimal, titik sebagai pemisah
    }
}
