<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Evkin\Operasional;
use App\Models\Teknik\Produksi\Produksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Operator;

class MainController extends Controller
{
    public function rasprod ()
    {
        //Rasio Produksi
        $VolProdRil = Operasional::sum('VolProdRil');
        $KpstsTrpsng = Operasional::sum('KpstsTrpsng');
        $hitungrasioProd = $KpstsTrpsng > 0 ? ($VolProdRil / $KpstsTrpsng) * 100 : 0;
        $rasioProd = round($hitungrasioProd, 2);

        if ($rasioProd <= 70) {
            $nilai = 1;
            $cls = 'bg-danger';
        } elseif ($rasioProd > 70 && $rasioProd <= 80) {
            $nilai = 2;
            $cls = 'bg-warning';
        } elseif ($rasioProd > 80 && $rasioProd <= 90) {
            $nilai = 3;
            $cls = 'bg-primary';
        } elseif ($rasioProd > 90 && $rasioProd <= 100) {
            $nilai = 4;
            $cls = 'bg-primary';
        } else {
            $nilai = 5;
            $cls = 'bg-success';
        }
        

        $tahun = Carbon::now()->year; // Tahun saat ini
        $persentaseBulanan = []; // Array untuk menyimpan hasil perhitungan setiap bulan

    // Loop untuk setiap bulan dari 1 sampai 12
    for ($bulan = 1; $bulan <= 12; $bulan++) {
        // Format bulan dengan leading zero (01, 02, ... 12)
        $bulanFormatted = str_pad($bulan, 2, '0', STR_PAD_LEFT);

        // Ambil VolProdRil dan KpstsTrpsng untuk bulan dan tahun tertentu
        $volProdRil = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormatted)->sum('VolProdRil');
        $kpstsTrpsng = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormatted)->sum('KpstsTrpsng');

        // Cek agar tidak terjadi pembagian dengan nol
        if ($kpstsTrpsng > 0) {
            $persentase = ($volProdRil / $kpstsTrpsng) * 100;
        } else {
            $persentase = 0;
        }

        // Simpan hasil perhitungan ke array
        $persentaseBulanan[$bulanFormatted] = round($persentase, 2); // Format dengan 2 angka desimal
    }

    
    return response()->json([
            'VolProdRil'=> intval($VolProdRil),
            'KpstsTrpsng'=>intval($KpstsTrpsng),
            'rasioProd' => intval($rasioProd),
            'nilaiProd' => $nilai,
            'cls'=>$cls,
            'persentaseBulanan' => $persentaseBulanan
        ]);


    }

    public function nrw ()
    {
        $KalkulasiJumAirM = Operasional::sum('KalkulasiJumAir');
        $JmlAirDistM = Operasional::sum('JmlAirDist');
        $hitungnrw = $JmlAirDistM > 0 ? ($KalkulasiJumAirM / $JmlAirDistM) * 100 : 0;
        $nrw = round($hitungnrw, 2);
        
        if ($nrw <= 20) {
            $nilai = 4;
            $cls = 'bg-success';
        } elseif ($nrw > 20 && $nrw <= 30) {
            $nilai = 3;
            $cls = 'bg-primary';
        } elseif ($nrw > 30 && $nrw <= 40) {
            $nilai = 2;
            $cls = 'bg-warning';
        } else { 
            $nilai = 1;
            $cls = 'bg-success';
        }
        
        $tahun = Carbon::now()->year;
        $persentaseBulanan = [];
    for ($bulan = 1; $bulan <= 12; $bulan++) {
        $bulanFormatted = str_pad($bulan, 2, '0', STR_PAD_LEFT);
        $KalkulasiJumAir = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormatted)->sum('KalkulasiJumAir');
        $JmlAirDist = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormatted)->sum('KpstsTrpsng');
        if ($JmlAirDist > 0) {
            $persentase = ($KalkulasiJumAir / $JmlAirDist) * 100;
        } else {
            $persentase = 0; 
        }
        $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
    }
    return response()->json([
            'KalkulasiJumAir'=> intval($KalkulasiJumAirM),
            'JmlAirDist'=>intval($JmlAirDistM),
            'nrw' => intval($nrw),
            'nilaiNrw' => $nilai,
            'cls'=>$cls,
            'persentaseBulanan' => $persentaseBulanan
        ]);
    }

    public function jam ()
    {
        $JmlWktPlyM = Operasional::sum('JmlWktPly');
        //$convjam = $JmlWktPlyM / 60 ;
        $hari = 360;
        $hitungjam = $hari> 0 ? ($JmlWktPlyM / $hari) : 0;
        
        $jam = round($hitungjam,2);

        
        if ($jam <= 4) {
            $nilai = 1;
            $cls = 'bg-danger';
        } elseif ($jam > 4 && $jam <= 8) {
            $nilai = 2;
            $cls = 'bg-warning';
        } elseif ($jam > 8 && $jam <= 16) {
            $nilai = 3;
            $cls = 'bg-primary';
        } elseif ($jam > 16 && $jam <= 20) {
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
        $JmlWktPly = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormatted)->sum('JmlWktPly');
        $hariB = 30;
        if ($hariB > 0) {
            $persentase = ($JmlWktPly / $hariB);
        } else {
            $persentase = 0; 
        }
        $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
    }

    return response()->json([
            'JmlWktPly'=> intval($JmlWktPlyM),
            'hari'=>intval($hari),
            'jam' => intval($jam),
            'nilaiJam' => $nilai,
            'cls'=>$cls,
            'persentaseBulanan' => $persentaseBulanan
        ]);
    }

    public function tekanan ()
    {
        // Ambil data terbaru berdasarkan 'bulanTahun'
        $Plgnlayan = Operasional::orderBy('bulanTahun', 'DESC')->value('Plgnlayan');
        $PlgnAktiv = Operasional::orderBy('bulanTahun', 'DESC')->value('PlgnAktiv');

        // Hitung tekanan jika PlgnAktiv > 0
        if ($PlgnAktiv > 0) {
            $hitungTekanan = ($Plgnlayan / $PlgnAktiv) * 100;
        } else {
            $hitungTekanan = 0;
        }

        // Bulatkan hasil ke 2 angka desimal
        $tekanan = round($hitungTekanan, 2);
        
        if ($tekanan <= 70) {
            $nilai = 1;
            $cls = 'bg-danger';
        } elseif ($tekanan > 70 && $tekanan <= 80) {
            $nilai = 2;
            $cls = 'bg-warning';
        } elseif ($tekanan > 80 && $tekanan <= 90) {
            $nilai = 3;
            $cls = 'bg-info';
        } elseif ($tekanan > 90 && $tekanan <= 100) {
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
    $PlgnlayanG = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('Plgnlayan') ?? 0;
    $PlgnAktivG = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('PlgnAktiv') ?? 0;

    // Hitung persentase jika PlgnAktiv > 0
    if ($PlgnAktivG > 0) {
        $persentase = ($PlgnlayanG / $PlgnAktivG) * 100;
    } else {
        $persentase = 0;
    }

    // Simpan hasil ke array
    $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
}
    return response()->json([
            'Plgnlayan'=> intval($Plgnlayan),
            'PlgnAktiv'=>intval($PlgnAktiv),
            'tekanan' => intval($tekanan),
            'nilaiTekanan' => $nilai,
            'cls'=>$cls,
            'persentaseBulanan' => $persentaseBulanan
        ]);
    }


    public function kalibrasi ()
    {
        //Rasio Produksi
        $MtrAirGnti = Operasional::sum('MtrAirGnti');
        $PlgnAktiv = Operasional::orderBy('bulanTahun', 'DESC')->value('PlgnAktiv');
        $hitungMtrAirGnti = $PlgnAktiv > 0 ? ($MtrAirGnti / $PlgnAktiv) * 100 : 0;
        $kalibrasi = round($hitungMtrAirGnti, 2);

        if ($kalibrasi <= 10) {
            $nilai = 1;
            $cls = 'bg-danger';
        } elseif ($kalibrasi > 10 && $kalibrasi <= 20) {
            $nilai = 2;
            $cls = 'bg-warning';
        } elseif ($kalibrasi > 20 && $kalibrasi <= 30) {
            $nilai = 3;
            $cls = 'bg-primary';
        } elseif ($kalibrasi > 30 && $kalibrasi <= 40) {
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
    $MtrAirGntiG = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('MtrAirGnti') ?? 0;
    $PlgnAktivG = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('PlgnAktiv') ?? 0;

    if ($PlgnAktivG > 0) {
        $persentase = ($MtrAirGntiG / $PlgnAktivG) * 100;
    } else {
        $persentase = 0;
    }

    $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
}

    
    return response()->json([
            'MtrAirGnti'=> intval($MtrAirGnti),
            'PlgnAktiv'=>intval($PlgnAktiv),
            'kalibrasi' => intval($kalibrasi),
            'nilaiKalibrasi' => $nilai,
            'cls'=>$cls,
            'persentaseBulanan' => $persentaseBulanan
        ]);


    }

}
