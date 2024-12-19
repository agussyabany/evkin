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
        
        $labaSum = Keuangan::sum('labaStlPjk'); // Nilai asli, misal 107038155372
        $laba = round($labaSum / pow(10, strlen(floor($labaSum)) - 3), 2); // Ambil 3 digit pertama dan 2 di belakang koma

        return view('mobile.home',compact('laba'));
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
