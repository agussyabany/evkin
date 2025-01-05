<?php
namespace App\Helpers;

use App\Models\Evkin\Keuangan;
use App\Models\Evkin\Operasional;

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

    //Rasio Operasional
    public static function hitungRop() {
        $biayaOps = Keuangan::sum('biayaOps');
        $PndptnOps = Keuangan::sum('PndptnOps');
        return $PndptnOps > 0 ? ($biayaOps / $PndptnOps) : 0;
    }
    public static function biayaOps() {
        return Keuangan::sum('biayaOps');
    }
    public static function PndptnOps() {
        return Keuangan::sum('PndptnOps');
    }
    public static function nilaiRop($hasilRop) 
    {
        if ($hasilRop > 1) {
            return ['nilaiRop' => 1, 'clsRop' => 'bg-danger'];
        } elseif ($hasilRop > 0.85 && $hasilRop <= 1) {
            return ['nilaiRop' => 2, 'clsRop' => 'bg-warning'];
        } elseif ($hasilRop > 0.65 && $hasilRop <= 0.85) {
            return ['nilaiRop' => 3, 'clsRop' => 'bg-primary'];
        } elseif ($hasilRop > 0.50 && $hasilRop <= 0.65) {
            return ['nilaiRop' => 4, 'clsRop' => 'bg-primary'];
        } else {
            return ['nilaiRop' => 5, 'clsRop' => 'bg-success'];
        }
    }
    public static function hitungRopBulanan($tahun) {
        $persentaseRopBulanan = [];
        for ($bulanRop = 1; $bulanRop <= 12; $bulanRop++) {
            $bulanRopFormatted = str_pad($bulanRop, 2, '0', STR_PAD_LEFT);
            $biayaOpsG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanRopFormatted)->value('biayaOps') ?? 0;
            $PndptnOpsG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanRopFormatted)->value('PndptnOps') ?? 0;
            if ($PndptnOpsG > 0) {
                $persentaseRop = ($biayaOpsG / $PndptnOpsG);
            } else {
                $persentaseRop = 0;
            }
            $persentaseRopBulanan[$bulanRopFormatted] = round($persentaseRop, 2);
        }
        return $persentaseRopBulanan;
    }

    //Rasio Kas
    public static function hitungRok() {
        $kaStrkas = Keuangan::orderBy('bulanTahun', 'DESC')->value('kaStrkas');
        $HutangLancar = Keuangan::orderBy('bulanTahun', 'DESC')->value('HutangLancar');
        return $HutangLancar > 0 ? ($kaStrkas / $HutangLancar) * 100 : 0;
    }
    public static function kaStrkas() {
        return Keuangan::orderBy('bulanTahun', 'DESC')->value('kaStrkas');
    }
    public static function HutangLancar() {
        return Keuangan::orderBy('bulanTahun', 'DESC')->value('HutangLancar');
    }
    public static function nilaiRok($hasilRok) 
    {
        if ($hasilRok >= 100) {
            return ['nilaiRok' => 5, 'clsRok' => 'bg-success'];
        } elseif ($hasilRok >= 80 && $hasilRok < 100) {
            return ['nilaiRok' => 4, 'clsRok' => 'bg-primary'];
        } elseif ($hasilRok >= 60 && $hasilRok < 80) {
            return ['nilaiRok' => 3, 'clsRok' => 'bg-warning'];
        } elseif ($hasilRok >= 40 && $hasilRok < 60) {
            return ['nilaiRok' => 2, 'clsRok' => 'bg-danger'];
        } else {
            return ['nilaiRok' => 1, 'clsRok' => 'bg-dark'];
        }
    }
    public static function persentaseBulananRok ($tahun) {
        $persentaseBulananRok = [];
            for ($bulanRok = 1; $bulanRok <= 12; $bulanRok++) {
                $bulanRokFormatted = str_pad($bulanRok, 2, '0', STR_PAD_LEFT);
                $kaStrkasG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanRokFormatted)->value('kaStrkas') ?? 0;
                $HutangLancarG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanRokFormatted)->value('HutangLancar') ?? 0;

                if ($HutangLancarG > 0) {
                    $persentaseRok = ($kaStrkasG / $HutangLancarG) * 100;
                } else {
                    $persentaseRok = 0;
                }

                $persentaseBulananRok[$bulanRokFormatted] = round($persentaseRok, 2);
            }
            return $persentaseBulananRok;
    }

    //Eketifitas Penagihan
    public static function hitungEf() {
        $JmlPnrmRekAir = Keuangan::sum('JmlPnrmRekAir');
        $jmlRekAir = Keuangan::sum('jmlRekAir');
        return $jmlRekAir > 0 ? ($JmlPnrmRekAir / $jmlRekAir) * 100 : 0;
    }
    public static function JmlPnrmRekAir() {
        return Keuangan::sum('JmlPnrmRekAir');
    }
    public static function jmlRekAir() {
        return Keuangan::sum('jmlRekAir');
    }
    public static function nilaiEf($hasilEf) 
    {
        if ($hasilEf >= 90) {
            return ['nilaiEf' => 5, 'clsEf' => 'bg-success'];
        } elseif ($hasilEf >= 85 && $hasilEf < 90) {
            return ['nilaiEf' => 4, 'clsEf' => 'bg-primary'];
        } elseif ($hasilEf >= 80 && $hasilEf < 85) {
            return ['nilaiEf' => 3, 'clsEf' => 'bg-warning'];
        } elseif ($hasilEf >= 75 && $hasilEf < 80) {
            return ['nilaiEf' => 2, 'clsEf' => 'bg-danger'];
        } else {
            return ['nilaiEf' => 1, 'clsEf' => 'bg-danger'];
        }
    }
    public static function persentaseBulananEf($tahun) {
        $persentaseBulananEf = [];

            for ($bulanEf = 1; $bulanEf <= 12; $bulanEf++) {
                $bulanEfFormatted = str_pad($bulanEf, 2, '0', STR_PAD_LEFT);
                $JmlPnrmRekAirG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanEfFormatted)->value('JmlPnrmRekAir') ?? 0;
                $jmlRekAirG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanEfFormatted)->value('jmlRekAir') ?? 0;

                if ($jmlRekAirG > 0) {
                    $persentaseEf = ($JmlPnrmRekAirG / $jmlRekAirG) * 100;
                } else {
                    $persentaseEf = 0;
                }

                $persentaseBulananEf[$bulanEfFormatted] = round($persentaseEf, 2);
            }
            return $persentaseBulananEf;
    }

    //Solvabilitas
    public static function hitungSol() {
        $TotalAktiva = Keuangan::orderBy('bulanTahun', 'DESC')->value('TotalAktiva');
        $TotalHutang = Keuangan::orderBy('bulanTahun', 'DESC')->value('TotalHutang');
        return $TotalHutang > 0 ? ($TotalAktiva / $TotalHutang) * 100 : 0;
    }
    public static function TotalAktiva() {
        return Keuangan::orderBy('bulanTahun', 'DESC')->value('TotalAktiva');
    }
    public static function TotalHutang() {
        return Keuangan::orderBy('bulanTahun', 'DESC')->value('TotalHutang');
    }
    public static function nilaiSol($hasilSol) 
    {
        if ($hasilSol >= 200) {
            return ['nilaiSol' => 5, 'clsSol' => 'bg-success'];
        } elseif ($hasilSol >= 170 && $hasilSol < 200) {
            return ['nilaiSol' => 4, 'clsSol' => 'bg-primary'];
        } elseif ($hasilSol >= 135 && $hasilSol < 170) {
            return ['nilaiSol' => 3, 'clsSol' => 'bg-warning'];
        } elseif ($hasilSol >= 100 && $hasilSol < 135) {
            return ['nilaiSol' => 2, 'clsSol' => 'bg-danger'];
        } else {
            return ['nilaiSol' => 1, 'clsSol' => 'bg-dark'];
        }
    }
    public static function persentaseBulananSol ($tahun)
    {
        $persentaseBulananSol = [];
            for ($bulanSol = 1; $bulanSol <= 12; $bulanSol++) {
                $bulanFormattedSol = str_pad($bulanSol, 2, '0', STR_PAD_LEFT);
                $TotalAktivaG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanFormattedSol)->value('TotalAktiva') ?? 0;
                $TotalHutangG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanFormattedSol)->value('TotalHutang') ?? 0;

                if ($TotalHutangG > 0) {
                    $persentaseSol = ($TotalAktivaG / $TotalHutangG) * 100;
                } else {
                    $persentaseSol = 0;
                }

                $persentaseBulananSol[$bulanFormattedSol] = round($persentaseSol, 2);
            }
            return $persentaseBulananSol;
    }

    //-------------------ASPEK OPERASIONAL----------------//

    //Rasio Produksi
    public static function UrutanBulanOps() {
        $arrayBulan = Keuangan::count();
        $urutanBulan = [];
        for ($i = 1; $i <= $arrayBulan; $i++) {
            $urutanBulan[] = str_pad($i, 2, '0', STR_PAD_LEFT);
        }
        return $urutanBulan;
    }

    public static function hitungrasioProd() {
        $VolProdRil = Operasional::sum('VolProdRil');
        $KpstsTrpsng = Operasional::sum('KpstsTrpsng');
        return $KpstsTrpsng > 0 ? ($VolProdRil / $KpstsTrpsng) * 100 : 0;
    }
    public static function VolProdRil() {
        return Operasional::sum('VolProdRil');
    }
    public static function KpstsTrpsng() {
        return Operasional::sum('KpstsTrpsng');
    }
    public static function nilaiProd($hasilProd) 
    {
        if ($hasilProd <= 90) {
            return ['nilaiProd' => 1, 'clsProd' => 'bg-danger'];
        } elseif ($hasilProd > 80 && $hasilProd <= 90) {
            return ['nilaiProd' => 2, 'clsProd' => 'bg-warning'];
        } elseif ($hasilProd > 70 && $hasilProd <= 80) {
            return ['nilaiProd' => 3, 'clsProd' => 'bg-info'];
        } elseif ($hasilProd > 60 && $hasilProd <= 70) {
            return ['nilaiProd' => 4, 'clsProd' => 'bg-primary'];
        } else {
            return ['nilaiProd' => 5, 'clsProd' => 'bg-success'];
        }
    }
    public static function persentaseBulananProd ($tahun){
        $persentaseBulananProd = [];
    for ($bulanProd = 1; $bulanProd <= 12; $bulanProd++) {
        $bulanFormattedProd = str_pad($bulanProd, 2, '0', STR_PAD_LEFT);
        $volProdRil = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedProd)->sum('VolProdRil');
        $kpstsTrpsng = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedProd)->sum('KpstsTrpsng');
        if ($kpstsTrpsng > 0) {
            $persentaseProd = ($volProdRil / $kpstsTrpsng) * 100;
        } else {
            $persentaseProd= 0;
        }
        $persentaseBulananProd[$bulanFormattedProd] = round($persentaseProd ,2);
    }
    return $persentaseBulananProd; 
 }

 //Kehilangan Air
 public static function hitungnrw ()
 {
    $KalkulasiJumAirM = Operasional::sum('KalkulasiJumAir');
    $JmlAirDistM = Operasional::sum('JmlAirDist');
    return $JmlAirDistM > 0 ? ($KalkulasiJumAirM / $JmlAirDistM) * 100 : 0;
 }
 public static function KalkulasiJumAir ()
 {
    return Operasional::sum('KalkulasiJumAir');
 }
 public static function JmlAirDist ()
 {
    return Operasional::sum('JmlAirDist');
 }
 public static function nilaiNrw ($nrw)
 {
    if ($nrw <= 25) {
        return ['nilaiNrw' => 5, 'clsNrw' => 'bg-success'];
    } elseif ($nrw > 25 && $nrw <= 30) {
        return ['nilaiNrw' => 4, 'clsNrw' => 'bg-primary'];
    } elseif ($nrw > 30 && $nrw <= 35) {
        return ['nilaiNrw' => 3, 'clsNrw' => 'bg-info'];
    } elseif ($nrw > 35 && $nrw <= 40) {
        return ['nilaiNrw' => 2, 'clsNrw' => 'bg-warning'];
    } else {
        return ['nilaiNrw' => 1, 'clsNrw' => 'bg-success'];
    
 }
}
public static function persentaseBulananNrw ($tahun)
{
    $persentaseBulananNrw = [];
    for ($bulanNrw = 1; $bulanNrw <= 12; $bulanNrw++) {
        $bulanFormattedNrw = str_pad($bulanNrw, 2, '0', STR_PAD_LEFT);
        $KalkulasiJumAir = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedNrw)->sum('KalkulasiJumAir');
        $JmlAirDist = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedNrw)->sum('KpstsTrpsng');
        if ($JmlAirDist > 0) {
            $persentaseNrw = ($KalkulasiJumAir / $JmlAirDist) * 100;
        } else {
            $persentaseNrw = 0; 
        }
        $persentaseBulananNrw[$bulanFormattedNrw] = round($persentaseNrw, 2);
    }
    return $persentaseBulananNrw;
}

// Jam Operasi Layanan
public static function hitungjam ()
{
    $JmlWktPly = Operasional::sum('JmlWktPly');
    $hari = Operasional::sum('hari');
    return $hari> 0 ? ($JmlWktPly / $hari) : 0; 
}
public static function JmlWktPly()
{
    return Operasional::sum('JmlWktPly');
} 
public static function hari()
{
    return Operasional::sum('hari');
}
public static function nilaiJam ($jam)
{
    if ($jam <= 12) {
        return ['nilaiJam' => 1, 'clsJam' => 'bg-danger'];
    } elseif ($jam > 12 && $jam <= 16) {
        return ['nilaiJam' => 2, 'clsJam' => 'bg-warning'];
    } elseif ($jam > 16 && $jam <= 18) {
        return ['nilaiJam' => 3, 'clsJam' => 'bg-primary'];
    } elseif ($jam > 18 && $jam <= 21) {
        return ['nilaiJam' => 4, 'clsJam' => 'bg-primary'];
    } else {
        return ['nilaiJam' => 5, 'clsJam' => 'bg-success'];
    }
}
public static function persentaseBulananJam ($tahun)
{
    $persentaseBulananJam = [];
    for ($bulanJam = 1; $bulanJam <= 12; $bulanJam++) {
        $bulanFormattedJam = str_pad($bulanJam, 2, '0', STR_PAD_LEFT);
        $JmlWktPlyG = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedJam)->sum('JmlWktPly');
        $hariB = 30;
        if ($hariB > 0) {
            $persentaseJam= ($JmlWktPlyG / $hariB);
        } else {
            $persentaseJam = 0; 
        }
        $persentaseBulananJam[$bulanFormattedJam] = round($persentaseJam ,2);
    } return $persentaseBulananJam;  
}

    



    



    


    

    

}