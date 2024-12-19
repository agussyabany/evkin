<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Evkin\Pelayanan;
use App\Models\Evkin\Sdm;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SdmController extends Controller
{
    public function raspegawai ()
    {
        //Rasio Produksi
        $JmlPgwai = Sdm::orderBy('bulanTahun', 'DESC')->value('JmlPgwai');
        $JmlPlgn1000 = Sdm::orderBy('bulanTahun', 'DESC')->value('JmlPlgn1000');
        $hitungRaspeg = $JmlPlgn1000 > 0 ? ($JmlPgwai / $JmlPlgn1000) : 0;
        $Raspeg = round($hitungRaspeg, 2);

        if ($Raspeg > 0 && $Raspeg <= 3) {
            $nilai = 1;
            $cls = 'bg-danger';
        } elseif ($Raspeg > 3 && $Raspeg <= 6) {
            $nilai = 2;
            $cls = 'bg-warning';
        } elseif ($Raspeg > 6 && $Raspeg <= 9) {
            $nilai = 3;
            $cls = 'bg-primary';
        } elseif ($Raspeg > 9 && $Raspeg <= 12) {
            $nilai = 4;
            $cls = 'bg-primary';
        } else {
            $nilai = 5;
            $cls = 'bg-success';
        }
        

        $tahun = Carbon::now()->year;
        $persentaseBulanan = [];
    
    for ($bulan = 1; $bulan <= 12; $bulan++) {
        $bulanFormatted = str_pad($bulan, 2, '0', STR_PAD_LEFT);
        
        // Ambil nilai Plgnlayan dan PlgnAktiv untuk bulan tertentu
        $JmlPgwaiG = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('JmlPgwai') ?? 0;
        $JmlPlgn1000G = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('JmlPlgn1000') ?? 0;
    
        // Hitung persentase jika PlgnAktiv > 0
        if ($JmlPlgn1000G > 0) {
            $persentase = ($JmlPgwaiG / $JmlPlgn1000G);
        } else {
            $persentase = 0;
        }
    
        // Simpan hasil ke array
        $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
    }

    
    return response()->json([
            'JmlPgwai'=> intval($JmlPgwai),
            'JmlPlgn1000'=>intval($JmlPlgn1000),
            'hasilRaspeg' => intval($Raspeg),
            'nilaiRaspeg' => $nilai,
            'cls'=>$cls,
            'persentaseBulanan' => $persentaseBulanan
        ]);
    }

    public function rasdiklat ()
    {
        
        $JmlPegDiklat = Sdm::sum('JmlPegDiklat');
        $JmlPgwai = Sdm::orderBy('bulanTahun', 'DESC')->value('JmlPgwai');
        $hitungRasdik = $JmlPgwai > 0 ? ($JmlPegDiklat / $JmlPgwai) * 100 : 0;
        $hasilRasdik = round($hitungRasdik, 2);

        if ($hasilRasdik <= 10) {
            $nilai = 1;
            $cls = 'bg-danger';
        } elseif ($hasilRasdik > 10 && $hasilRasdik <= 20) {
            $nilai = 2;
            $cls = 'bg-warning';
        } elseif ($hasilRasdik > 20 && $hasilRasdik <= 30) {
            $nilai = 3;
            $cls = 'bg-primary';
        } elseif ($hasilRasdik > 30 && $hasilRasdik <= 40) {
            $nilai = 4;
            $cls = 'bg-primary'; 
        } else {
            $nilai = 5;
            $cls = 'bg-success';
        }
        

    $tahun = Carbon::now()->year;
    $persentaseBulanan = [];

for ($bulan = 1; $bulan <= 12; $bulan++) {
    $bulanFormatted = str_pad($bulan, 2, '0', STR_PAD_LEFT);
    $JmlPegDiklatG = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('JmlPegDiklat') ?? 0;
    $JmlPgwaiG = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('JmlPgwai') ?? 0;

    if ($JmlPgwaiG > 0) {
        $persentase = ($JmlPegDiklatG / $JmlPgwaiG) * 100;
    } else {
        $persentase = 0;
    }

    $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
}

    
    return response()->json([
            'JmlPegDiklat'=> intval($JmlPegDiklat),
            'JmlPgwai'=>intval($JmlPgwai),
            'hasilRasdik' => intval($hasilRasdik),
            'nilaiRasdik' => $nilai,
            'cls'=>$cls,
            'persentaseBulanan' => $persentaseBulanan
        ]);


    }

    public function rasbiaya ()
    {
        
        $RealByDiklat = Sdm::sum('RealByDiklat');
        $RealByPeg = Sdm::sum('RealByPeg');
        $hitungRasby = $RealByPeg > 0 ? ($RealByDiklat / $RealByPeg) * 100 : 0;
        $hasilRasby = round($hitungRasby, 2);

        if ($hasilRasby <= 10) {
            $nilai = 1;
            $cls = 'bg-danger';
        } elseif ($hasilRasby > 10 && $hasilRasby <= 20) {
            $nilai = 2;
            $cls = 'bg-warning';
        } elseif ($hasilRasby > 20 && $hasilRasby <= 30) {
            $nilai = 3;
            $cls = 'bg-primary';
        } elseif ($hasilRasby > 30 && $hasilRasby <= 40) {
            $nilai = 4;
            $cls = 'bg-primary'; 
        } else {
            $nilai = 5;
            $cls = 'bg-success';
        }
        

    $tahun = Carbon::now()->year;
    $persentaseBulanan = [];

for ($bulan = 1; $bulan <= 12; $bulan++) {
    $bulanFormatted = str_pad($bulan, 2, '0', STR_PAD_LEFT);
    $RealByDiklatG = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('RealByDiklat') ?? 0;
    $JRealByPegG = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('RealByPeg') ?? 0;

    if ($JRealByPegG > 0) {
        $persentase = ($RealByDiklatG / $JRealByPegG) * 100;
    } else {
        $persentase = 0;
    }

    $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
}

    
    return response()->json([
            'RealByDiklat'=> intval($RealByDiklat),
            'RealByPeg'=>intval($RealByPeg),
            'hasilRasby' => intval($hasilRasby),
            'nilaiRasby' => $nilai,
            'cls'=>$cls,
            'persentaseBulanan' => $persentaseBulanan
        ]);


    }
}
