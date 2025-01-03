<?php
namespace App\Helpers;

use App\Models\Evkin\Keuangan;

class evkinHelper {
    //-------------------ASPEK KEUANGAN----------------//

    //Return Of Equity
    public static function hitungRoe() {
        $labaStlPjk = Keuangan::sum('labaStlPjk');
        $jmlEkuitas = Keuangan::orderBy('bulanTahun', 'DESC')->value('jmlEkuitas');
        return $jmlEkuitas > 0 ? round(($labaStlPjk / $jmlEkuitas) * 100, 2) : 0;
    }
    public static function labaStlPjk() {
        return Keuangan::sum('labaStlPjk');  // Mengambil jumlah labaStlPjk
    }
    public static function jmlEkuitas() {
        return Keuangan::orderBy('bulanTahun', 'DESC')->value('jmlEkuitas');  // Mengambil jumlah labaStlPjk
    }
    public static function nilaiRoe($hasilRoe) {
        // Logika untuk menentukan nilai dan kelas CSS berdasarkan ROE
        if ($hasilRoe <= 0) {
            return ['nilaiRoe' => 0, 'clsRoe' => 'bg-danger'];
        } elseif ($hasilRoe > 0 && $hasilRoe <= 3) {
            return ['nilaiRoe' => 2, 'clsRoe' => 'bg-warning'];
        } elseif ($hasilRoe > 3 && $hasilRoe <= 7) {
            return ['nilaiRoe' => 3, 'clsRoe' => 'bg-primary'];
        } elseif ($hasilRoe > 7 && $hasilRoe <= 10) {
            return ['nilaiRoe' => 4, 'clsRoe' => 'bg-primary'];
        } else {
            return ['nilaiRoe' => 5, 'clsRoe' => 'bg-success'];
        }
    }
    public static function hitungRoeBulanan($tahun) {
        $persentaseBulananRoe = [];
        for ($bulanRoe = 1; $bulanRoe <= 12; $bulanRoe++) {
            $bulanRoeFormatted = str_pad($bulanRoe, 2, '0', STR_PAD_LEFT);
            
            $labaStlPjkG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanRoeFormatted)->value('labaStlPjk') ?? 0;
            $jmlEkuitasG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanRoeFormatted)->value('jmlEkuitas') ?? 0;
            
            if ($jmlEkuitasG > 0) {
                $persentaseRoe = ($labaStlPjkG / $jmlEkuitasG) * 100;
            } else {
                $persentaseRoe = 0;
            }
            $persentaseBulananRoe[$bulanRoeFormatted] = round($persentaseRoe, 2);
        }
        return $persentaseBulananRoe;
    }
    public static function UrutanBulan() {
        $arrayBulan = Keuangan::count();
        $urutanBulan = [];
        for ($i = 1; $i <= $arrayBulan; $i++) {
            $urutanBulan[] = str_pad($i, 2, '0', STR_PAD_LEFT);
        }
        return $urutanBulan;
    }
}