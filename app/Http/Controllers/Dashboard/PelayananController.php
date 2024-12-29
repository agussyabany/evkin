<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Evkin\Pelayanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    public function cakupan ()
    {
        //Rasio Produksi
        $JmlPnddkTrlyni = Pelayanan::orderBy('bulanTahun', 'DESC')->value('JmlPnddkTrlyni');
        $jmlPndkWil = Pelayanan::orderBy('bulanTahun', 'DESC')->value('jmlPndkWil');
        $hitungCakupan = $jmlPndkWil > 0 ? ($JmlPnddkTrlyni / $jmlPndkWil) * 100 : 0;
        $cakupan = round($hitungCakupan, 2);

        if ($cakupan > 0 && $cakupan <= 3) {
            $nilai = 1;
            $cls = 'bg-danger';
        } elseif ($cakupan > 3 && $cakupan <= 6) {
            $nilai = 2;
            $cls = 'bg-warning';
        } elseif ($cakupan > 6 && $cakupan <= 9) {
            $nilai = 3;
            $cls = 'bg-primary';
        } elseif ($cakupan > 9 && $cakupan <= 12) {
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
        $JmlPnddkTrlyniG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('JmlPnddkTrlyni') ?? 0;
        $jmlPndkWilG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('jmlPndkWil') ?? 0;
    
        // Hitung persentase jika PlgnAktiv > 0
        if ($jmlPndkWilG > 0) {
            $persentase = ($JmlPnddkTrlyniG / $jmlPndkWilG) * 100;
        } else {
            $persentase = 0;
        }
    
        // Simpan hasil ke array
        $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
    }

    
    return response()->json([
            'JmlPnddkTrlyni'=> intval($JmlPnddkTrlyni),
            'jmlPndkWil'=>intval($jmlPndkWil),
            'cakupan' => intval($cakupan),
            'nilaiCakup' => $nilai,
            'cls'=>$cls,
            'persentaseBulanan' => $persentaseBulanan
        ]);


    }

    public function aduan ()
    {
        //Rasio Produksi
        $AduanSlsai = Pelayanan::sum('AduanSlsai');
        $JmlAduan = Pelayanan::sum('JmlAduan');
        $hitungAduan = $JmlAduan > 0 ? ($AduanSlsai / $JmlAduan) * 100 : 0;
        $hasilAduan = round($hitungAduan, 2);

        if ($hasilAduan <= 70) {
            $nilai = 1;
            $cls = 'bg-danger';
        } elseif ($hasilAduan > 70 && $hasilAduan <= 80) {
            $nilai = 2;
            $cls = 'bg-warning';
        } elseif ($hasilAduan > 80 && $hasilAduan <= 90) {
            $nilai = 3;
            $cls = 'bg-primary';
        } elseif ($hasilAduan > 90 && $hasilAduan <= 99) {
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
        $AduanSlsaiG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->sum('AduanSlsai');
        $JmlAduanG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->sum('JmlAduan');
        if ($JmlAduanG > 0) {
            $persentase = ($AduanSlsaiG / $JmlAduanG) * 100;
        } else {
            $persentase = 0;
        }
        $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
    }

    
    return response()->json([
            'AduanSlsai'=> intval($AduanSlsai),
            'JmlAduan'=>intval($JmlAduan),
            'hasilAduan' => intval($hasilAduan),
            'nilaiAduan' => $nilai,
            'cls'=>$cls,
            'persentaseBulanan' => $persentaseBulanan
        ]);


    }

    public function domestik ()
    {
        
        $JmlAirTrjualDom = Pelayanan::sum('JmlAirTrjualDom');
        $JmlPlgnDom = Pelayanan::orderBy('bulanTahun', 'DESC')->value('JmlPlgnDom');
        $hitungDomestik = $JmlPlgnDom > 0 ? ($JmlAirTrjualDom / $JmlPlgnDom) / 12 : 0;
        $hasilDomestik = round($hitungDomestik, 2);

        if ($hasilDomestik <= 10) {
            $nilai = 1;
            $cls = 'bg-danger';
        } elseif ($hasilDomestik > 10 && $hasilDomestik <= 20) {
            $nilai = 2;
            $cls = 'bg-warning';
        } elseif ($hasilDomestik > 20 && $hasilDomestik <= 30) {
            $nilai = 3;
            $cls = 'bg-primary';
        } elseif ($hasilDomestik > 30 && $hasilDomestik <= 40) {
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
    $JmlAirTrjualDomG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('JmlAirTrjualDom') ?? 0;
    $JmlPlgnDomG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('JmlPlgnDom') ?? 0;

    if ($JmlPlgnDomG > 0) {
        $persentase = ($JmlAirTrjualDomG / $JmlPlgnDomG) * 100;
    } else {
        $persentase = 0;
    }

    $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
}

    
    return response()->json([
            'JmlAirTrjualDom'=> intval($JmlAirTrjualDom),
            'JmlPlgnDom'=>intval($JmlPlgnDom),
            'hasilDomestik' => intval($hasilDomestik),
            'nilaiDomestik' => $nilai,
            'cls'=>$cls,
            'persentaseBulanan' => $persentaseBulanan
        ]);


    }

    public function uji ()
    {
        
        $UjiKualitas = Pelayanan::sum('UjiKualitas');
        $titikUji = Pelayanan::sum('titikUji');
        $hitungUji = $titikUji > 0 ? ( $titikUji / $UjiKualitas ) * 100 : 0;
        $hasilUji = round($hitungUji, 2);

        if ($hasilUji <= 10) {
            $nilai = 1;
            $cls = 'bg-danger';
        } elseif ($hasilUji > 10 && $hasilUji <= 20) {
            $nilai = 2;
            $cls = 'bg-warning';
        } elseif ($hasilUji > 20 && $hasilUji <= 30) {
            $nilai = 3;
            $cls = 'bg-info';
        } elseif ($hasilUji > 30 && $hasilUji <= 40) {
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
    $UjiKualitasG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('UjiKualitas') ?? 0;
    $JtitikUjiG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('titikUji') ?? 0;

    if ($JtitikUjiG > 0) {
        $persentase = (  $JtitikUjiG /$UjiKualitasG) * 100;
    } else {
        $persentase = 0;
    }

    $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
}

    
    return response()->json([
            'UjiKualitas'=> intval($UjiKualitas),
            'titikUji'=>intval($titikUji),
            'hasilUji' => intval($hasilUji),
            'nilaiUji' => $nilai,
            'cls'=>$cls,
            'persentaseBulanan' => $persentaseBulanan
        ]);


    }

    public function tumbuh ()
    {
        
        $kalKulasiJmlPlgn = Pelayanan::orderBy('bulanTahun', 'DESC')->value('kalKulasiJmlPlgn');
        $JmlPlgnThLl = Pelayanan::orderBy('bulanTahun', 'DESC')->value('JmlPlgnThLl');
        $hitungTumbuh = $JmlPlgnThLl > 0 ? ($kalKulasiJmlPlgn / $JmlPlgnThLl) * 100 : 0;
        $tumbuh = round($hitungTumbuh, 2);

        if ($tumbuh > 0 && $tumbuh <= 3) {
            $nilai = 1;
            $cls = 'bg-danger';
        } elseif ($tumbuh > 3 && $tumbuh <= 6) {
            $nilai = 2;
            $cls = 'bg-warning';
        } elseif ($tumbuh > 6 && $tumbuh <= 9) {
            $nilai = 3;
            $cls = 'bg-primary';
        } elseif ($tumbuh > 9 && $tumbuh <= 12) {
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
        $kalKulasiJmlPlgnG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('kalKulasiJmlPlgn') ?? 0;
        $JmlPlgnThLlG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('jmlPndkWil') ?? 0;
    
        // Hitung persentase jika PlgnAktiv > 0
        if ($JmlPlgnThLlG > 0) {
            $persentase = ($kalKulasiJmlPlgnG / $JmlPlgnThLlG) * 100;
        } else {
            $persentase = 0;
        }
    
        // Simpan hasil ke array
        $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
    }

    
    return response()->json([
            'kalKulasiJmlPlgn'=> intval($kalKulasiJmlPlgn),
            'JmlPlgnThLl'=>intval($JmlPlgnThLl),
            'hasilTumbuh' => intval($tumbuh),
            'nilaiTumbuh' => $nilai,
            'cls'=>$cls,
            'persentaseBulanan' => $persentaseBulanan
        ]);


    }
}
