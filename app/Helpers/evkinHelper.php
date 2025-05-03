<?php
namespace App\Helpers;

use App\Http\Controllers\Evkin\EvkinController;
use App\Models\Evkin\Keuangan;
use App\Models\Evkin\Operasional;
use App\Models\Evkin\Pelayanan;
use App\Models\Evkin\Sdm;
use Psy\Test\CodeCleaner\FinalClassPassTest;

class evkinHelper {
    //-------------------ASPEK KEUANGAN----------------//

    //Return Of Equity
    public static function hitungRoe($tahun) {
        $labaStlPjk = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('labaStlPjk');
        $jmlEkuitas = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('jmlEkuitas');
        return $jmlEkuitas > 0 ? round(($labaStlPjk / $jmlEkuitas) * 100, 2) : 0;
    }
    public static function labaStlPjk($tahun) {
        return Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('labaStlPjk');  // Mengambil jumlah labaStlPjk
    }
    public static function jmlEkuitas($tahun) {
        return Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('jmlEkuitas');  // Mengambil jumlah labaStlPjk
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
    public static function hitungRop($tahun) {
        $biayaOps = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('biayaOps');
        $PndptnOps = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('PndptnOps');
        return $PndptnOps > 0 ? ($biayaOps / $PndptnOps) : 0;
    }
    public static function biayaOps($tahun) {
        return Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('biayaOps');
    }
    public static function PndptnOps($tahun) {
        return Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('PndptnOps');
    }
    public static function nilaiRop($hasilRop) 
    {
        if ($hasilRop <= 0) {
            return ['nilaiRop' => 0, 'clsRop' => 'bg-danger'];
        } elseif ($hasilRop > 0.85 && $hasilRop <= 1) {
            return ['nilaiRop' => 2, 'clsRop' => 'bg-warning'];
        } elseif ($hasilRop > 0.65 && $hasilRop <= 0.85) {
            return ['nilaiRop' => 3, 'clsRop' => 'bg-primary'];
        } elseif ($hasilRop > 0.50 && $hasilRop <= 0.65) {
            return ['nilaiRop' => 4, 'clsRop' => 'bg-info'];
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
    public static function hitungRok($tahun) {
        $kaStrkas = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('kaStrkas');
        $HutangLancar = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('HutangLancar');
        return $HutangLancar > 0 ? ($kaStrkas / $HutangLancar) * 100 : 0;
    }
    public static function kaStrkas($tahun) {
        return Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('kaStrkas');
    }
    public static function HutangLancar($tahun) {
        return Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('HutangLancar');
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
            return ['nilaiRok' => 0, 'clsRok' => 'bg-danger'];
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
    public static function hitungEf($tahun) {
        $JmlPnrmRekAir = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('JmlPnrmRekAir');
        $jmlRekAir = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('jmlRekAir');
        return $jmlRekAir > 0 ? ($JmlPnrmRekAir / $jmlRekAir) * 100 : 0;
    }
    public static function JmlPnrmRekAir($tahun) {
        return Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('JmlPnrmRekAir');
    }
    public static function jmlRekAir($tahun) {
        return Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('jmlRekAir');
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
    public static function hitungSol($tahun) {
        $TotalAktiva = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('TotalAktiva');
        $TotalHutang = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('TotalHutang');
        return $TotalHutang > 0 ? ($TotalAktiva / $TotalHutang) * 100 : 0;
    }
    public static function TotalAktiva($tahun) {
        return Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('TotalAktiva');
    }
    public static function TotalHutang($tahun) {
        return Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('TotalHutang');
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

    public static function hitungrasioProd($tahun) {
        $VolProdRil = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('VolProdRil');
        $KpstsTrpsng = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('KpstsTrpsng');
        return $KpstsTrpsng > 0 ? ($VolProdRil / $KpstsTrpsng) * 100 : 0;
    }
    public static function VolProdRil($tahun) {
        return Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('VolProdRil');
    }
    public static function KpstsTrpsng($tahun) {
        return Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('KpstsTrpsng');
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
 public static function hitungnrw ($tahun)
 {
    $KalkulasiJumAirM = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('KalkulasiJumAir');
    $JmlAirDistM = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('JmlAirDist');
    return $JmlAirDistM > 0 ? ($KalkulasiJumAirM / $JmlAirDistM) * 100 : 0;
 }
 public static function KalkulasiJumAir ($tahun)
 {
    return Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('KalkulasiJumAir');
 }
 public static function JmlAirDist ($tahun)
 {
    return Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('JmlAirDist');
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
public static function hitungjam ($tahun)
{
    $JmlWktPly = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('JmlWktPly');
    $hari = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('hari');
    return $hari> 0 ? ($JmlWktPly / $hari) : 0; 
}
public static function JmlWktPly($tahun)
{
    return Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('JmlWktPly');
} 
public static function hari($tahun)
{
    return Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('hari');
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

//Tekanan Air Pada Pelanggan
public static function hitungTekanan ($tahun)
{
    $Plgnlayan = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('Plgnlayan');
    $PlgnAktiv = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('PlgnAktiv');
    if ($PlgnAktiv > 0) {
        $hitungTekanan = ($Plgnlayan / $PlgnAktiv) * 100;
    } else {
        $hitungTekanan = 0;
    } 
    return $hitungTekanan;
}
public static function Plgnlayan ($tahun)
{
    return Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('Plgnlayan');
}
public static function PlgnAktiv($tahun)
{
    return Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('PlgnAktiv');
}
public static function tekanan ($tekanan)
{
    if ($tekanan <= 20) {
        return ['nilaiTek' => 1, 'clsTek' => 'bg-danger'];
    } elseif ($tekanan > 20 && $tekanan <= 40) {
        return ['nilaiTek' => 2, 'clsTek' => 'bg-warning'];
    } elseif ($tekanan > 40 && $tekanan <= 60) {
        return ['nilaiTek' => 3, 'clsTek' => 'bg-info'];
    } elseif ($tekanan > 60 && $tekanan <= 80) {
        return ['nilaiTek' => 4, 'clsTek' => 'bg-primary'];
    } else {
        return ['nilaiTek' => 5, 'clsTek' => 'bg-success'];
    }
}
public static function persentaseBulananTek ($tahun)
{
    $persentaseBulananTek = [];
    for ($bulanTek = 1; $bulanTek <= 12; $bulanTek++) {
    $bulanFormattedTek = str_pad($bulanTek, 2, '0', STR_PAD_LEFT);
    $PlgnlayanG = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedTek)->value('Plgnlayan') ?? 0;
    $PlgnAktivG = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedTek)->value('PlgnAktiv') ?? 0;
    if ($PlgnAktivG > 0) {
        $persentaseTek = ($PlgnlayanG / $PlgnAktivG) * 100;
    } else {
        $persentaseTek = 0;
    }

    $persentaseBulananTek[$bulanFormattedTek] = round($persentaseTek, 2);
    }
    return $persentaseBulananTek;
}

//Kalibrasi Dan Penggantina meter
public static function MtrAirGnti ($tahun)
{
   return  Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('MtrAirGnti');
}
public static function hitungMtrAirGnti ($tahun)
{
    $MtrAirGnti = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('MtrAirGnti');
    $PlgnAktiv = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('PlgnAktiv');
    
    return $PlgnAktiv > 0 ? ($MtrAirGnti / $PlgnAktiv) * 100 : 0;
}
public static function kalibrasi ($kalibrasi)
{
    if ($kalibrasi <= 5) {
        return ['nilaiKal' => 1, 'clsKal' => 'bg-danger'];
    } elseif ($kalibrasi > 5 && $kalibrasi <= 10) {
        return ['nilaiKal' => 2, 'clsKal' => 'bg-warning'];
    } elseif ($kalibrasi > 10 && $kalibrasi <= 15) {
        return ['nilaiKal' => 3, 'clsKal' => 'bg-primary'];
    } elseif ($kalibrasi > 15 && $kalibrasi <= 20) {
        return ['nilaiKal' => 4, 'clsKal' => 'bg-primary'];
    } else {
        return ['nilaiKal' => 5, 'clsKal' => 'bg-success'];
    }
}
public static function persentaseBulananKal ($tahun)
{
    $persentaseBulananKal = [];

            for ($bulanKal = 1; $bulanKal <= 12; $bulanKal++) {
            $bulanFormattedKal = str_pad($bulanKal, 2, '0', STR_PAD_LEFT);
            $MtrAirGntiG = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedKal)->value('MtrAirGnti') ?? 0;
            $PlgnAktivG = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedKal)->value('PlgnAktiv') ?? 0;

            if ($PlgnAktivG > 0) {
            $persentaseKal = ($MtrAirGntiG / $PlgnAktivG) * 100;
            } else {
            $persentaseKal= 0;
            }

            $persentaseBulananKal[$bulanFormattedKal] = round($persentaseKal, 2);
            }
             return $persentaseBulananKal;
}

                //-------------------ASPEK PELAYANAN----------------//


//Cakupan Pelayanan Teknis
public static function UrutanBulanPel() {
    $arrayBulan = Pelayanan::count();
    $urutanBulan = [];
    for ($i = 1; $i <= $arrayBulan; $i++) {
        $urutanBulan[] = str_pad($i, 2, '0', STR_PAD_LEFT);
    }
    return $urutanBulan;
}

public static function JmlPnddkTrlyni ($tahun)
{
    return Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('JmlPnddkTrlyni');
}
public static function jmlPndkWil ($tahun)
{
    return Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('jmlPndkWil');
}
public static function hitungCakupan  ($tahun)
{
    $JmlPnddkTrlyni = evkinHelper::JmlPnddkTrlyni($tahun);
    $jmlPndkWil = evkinHelper::jmlPndkWil($tahun);
    return $jmlPndkWil > 0 ? ($JmlPnddkTrlyni / $jmlPndkWil) * 100 : 0;
}
public static function  hasilCkp ($hasilCkp)
{
    if ($hasilCkp <= 20) {
        return ['nilaiCkp' => 1, 'clsCkp' => 'bg-danger'];
    } elseif ($hasilCkp > 20 && $hasilCkp <= 40) {
        return ['nilaiCkp' => 2, 'clsCkp' => 'bg-warning'];
    } elseif ($hasilCkp > 40 && $hasilCkp <= 60) {
        return ['nilaiCkp' => 3, 'clsCkp' => 'bg-primary'];
    } elseif ($hasilCkp > 60 && $hasilCkp <= 80) {
        return ['nilaiCkp' => 4, 'clsCkp' => 'bg-primary'];
    } else {
        return ['nilaiCkp' => 5, 'clsCkp' => 'bg-success'];
    } 
}
public static function persentaseBulananCkp ($tahun)
{
    $persentaseBulananCkp = [];
    
    for ($bulanCkp = 1; $bulanCkp <= 12; $bulanCkp++) {
        $bulanFormattedCkp = str_pad($bulanCkp, 2, '0', STR_PAD_LEFT);
        
        // Ambil nilai Plgnlayan dan PlgnAktiv untuk bulan tertentu
        $JmlPnddkTrlyniG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormattedCkp)->value('JmlPnddkTrlyni') ?? 0;
        $jmlPndkWilG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormattedCkp)->value('jmlPndkWil') ?? 0;
    
        // Hitung persentase jika PlgnAktiv > 0
        if ($jmlPndkWilG > 0) {
            $persentaseCkp = ($JmlPnddkTrlyniG / $jmlPndkWilG) * 100;
        } else {
            $persentaseCkp = 0;
        }
    
        // Simpan hasil ke array
        $persentaseBulananCkp[$bulanFormattedCkp] = round($persentaseCkp, 2);
    }
    return $persentaseBulananCkp;
}


//Penyelesaian Aduan
public static function AduanSlsai ($tahun)
{
    return  Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('AduanSlsai');
}
public static function JmlAduan ($tahun)
{
    return Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('JmlAduan');
}
public static function hitungAduan ($tahun)
{
    $AduanSlsai = Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('AduanSlsai');
    $JmlAduan = Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('JmlAduan');
    return $JmlAduan > 0 ? ($AduanSlsai / $JmlAduan) * 100 : 0;
}
public static function hasilAdu ($hasilAdu)
{
    if ($hasilAdu <= 20) {
        return ['nilaiAdu' => 1, 'clsAdu' => 'bg-danger'];
    } elseif ($hasilAdu > 20 && $hasilAdu <= 40) {
        return ['nilaiAdu' => 2, 'clsAdu' => 'bg-warning'];
    } elseif ($hasilAdu > 40 && $hasilAdu <= 60) {
        return ['nilaiAdu' => 3, 'clsAdu' => 'bg-info'];
    } elseif ($hasilAdu > 60 && $hasilAdu <= 80) {
        return ['nilaiAdu' => 4, 'clsAdu' => 'bg-primary'];
    } else {
        return ['nilaiAdu' => 5, 'clsAdu' => 'bg-success'];
    }
}
 public static function persentaseBulananAdu ($tahun)
 {
    $persentaseBulananAdu = [];
    for ($bulanAdu = 1; $bulanAdu <= 12; $bulanAdu++) {
        $bulanFormattedAdu = str_pad($bulanAdu, 2, '0', STR_PAD_LEFT);
        $AduanSlsaiG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormattedAdu)->sum('AduanSlsai');
        $JmlAduanG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormattedAdu)->sum('JmlAduan');
        if ($JmlAduanG > 0) {
            $persentaseAdu = ($AduanSlsaiG / $JmlAduanG) * 100;
        } else {
            $persentaseAdu = 0;
        }
        $persentaseBulananAdu[$bulanFormattedAdu] = round($persentaseAdu, 2);
    }
    return $persentaseBulananAdu;
 }

 //Konsumsi Air Domestik
 public static function JmlAirTrjualDom ($tahun)
 {
    return Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('JmlAirTrjualDom');
 }
 public static function JmlPlgnDom ($tahun)
 {
    return Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('JmlPlgnDom');
 }
 public static function hitungDomestik ($tahun)
 {
    $JmlAirTrjualDom = evkinHelper::JmlAirTrjualDom($tahun);
    $JmlPlgnDom = evkinHelper::JmlPlgnDom($tahun);
    return  $JmlPlgnDom > 0 ? ($JmlAirTrjualDom / $JmlPlgnDom) / 12 : 0;
 }
 public static function hasilDom ($hasilDom)
 {
    if ($hasilDom <= 15) {
        return ['nilaiDom' => 1, 'clsDom' => 'bg-danger'];
    } elseif ($hasilDom > 15 && $hasilDom <= 20) {
        return ['nilaiDom' => 2, 'clsDom' => 'bg-warning'];
    } elseif ($hasilDom > 20 && $hasilDom <= 25) {
        return ['nilaiDom' => 3, 'clsDom' => 'bg-primary'];
    } elseif ($hasilDom > 25 && $hasilDom <= 30) {
        return ['nilaiDom' => 4, 'clsDom' => 'bg-primary'];
    } else {
        return ['nilaiDom' => 5, 'clsDom' => 'bg-success'];
    }
 }
 public static function persentaseBulananDom ($tahun)
 {
        $persentaseBulananDom = [];

    for ($bulanDom = 1; $bulanDom <= 12; $bulanDom++) {
        $bulanFormattedDom = str_pad($bulanDom, 2, '0', STR_PAD_LEFT);
        $JmlAirTrjualDomG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormattedDom)->value('JmlAirTrjualDom') ?? 0;
        $JmlPlgnDomG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormattedDom)->value('JmlPlgnDom') ?? 0;

        if ($JmlPlgnDomG > 0) {
            $persentaseDom = ($JmlAirTrjualDomG / $JmlPlgnDomG) * 100;
        } else {
            $persentaseDom = 0;
        }

        $persentaseBulananDom[$bulanFormattedDom] = round($persentaseDom, 2);
    }
    return $persentaseBulananDom;
 }
 
 //Kualitas Air Pelanggan
 public static function UjiKualitas ($tahun)
 {
    return Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('UjiKualitas');
 }
 public static function titikUji ($tahun)
 {
    return Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('titikUji');
 }
 public static function hitungUji ($tahun)
 {
    $UjiKualitas = evkinHelper::UjiKualitas($tahun);
    $titikUji = evkinHelper::titikUji($tahun);
    return $titikUji > 0 ? ( $UjiKualitas / $titikUji ) * 100 : 0;
 }
 public static function hasilQap ($hasilQap)
{
    if ($hasilQap <= 20) {
        return ['nilaiQap' => 1, 'clsQap' => 'bg-danger'];
    } elseif ($hasilQap > 20 && $hasilQap <= 40) {
        return ['nilaiQap' => 2, 'clsQap' => 'bg-warning'];
    } elseif ($hasilQap > 40 && $hasilQap <= 60) {
        return ['nilaiQap' => 3, 'clsQap' => 'bg-info'];
    } elseif ($hasilQap > 60 && $hasilQap <= 80) {
        return ['nilaiQap' => 4, 'clsQap' => 'bg-primary'];
    } else {
        return ['nilaiQap' => 5, 'clsQap' => 'bg-success'];
    }
}
    public static function persentaseBulananQap ($tahun)
    {
        $persentaseBulananQap = [];

    for ($bulanQap = 1; $bulanQap <= 12; $bulanQap++) {
        $bulanFormattedQap = str_pad($bulanQap, 2, '0', STR_PAD_LEFT);
        $UjiKualitasG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormattedQap)->value('UjiKualitas') ?? 0;
        $JtitikUjiG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormattedQap)->value('titikUji') ?? 0;

        if ($JtitikUjiG > 0) {
            $persentaseQap = (  $JtitikUjiG /$UjiKualitasG) * 100;
        } else {
            $persentaseQap = 0;
        }

        $persentaseBulananQap[$bulanFormattedQap] = round($persentaseQap, 2);
    }
    return $persentaseBulananQap;

    }

//Pertumbuhan Pelanggan
    public static function kalKulasiJmlPlgn ($tahun)
    {
        return Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('kalKulasiJmlPlgn');
    }
    public static function JmlPlgnThLl ($tahun)
    {
        return Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('JmlPlgnThLl');
    }
    public static function hitungTumbuh ($tahun)
    {
        $kalKulasiJmlPlgn = evkinHelper::kalKulasiJmlPlgn($tahun);
        $JmlPlgnThLl = evkinHelper::JmlPlgnThLl($tahun);
        return $JmlPlgnThLl > 0 ? ($kalKulasiJmlPlgn / $JmlPlgnThLl) * 100 : 0;
    }

    public static function hasilTbh ($hasilTbh)
    {
        {
            if ($hasilTbh <= 4) {
                return ['nilaiTbh' => 1, 'clsTbh' => 'bg-danger'];
            } elseif ($hasilTbh > 4 && $hasilTbh <= 6) {
                return ['nilaiTbh' => 2, 'clsTbh' => 'bg-warning'];
            } elseif ($hasilTbh > 6 && $hasilTbh <= 8) {
                return ['nilaiTbh' => 3, 'clsTbh' => 'bg-primary'];
            } elseif ($hasilTbh > 8 && $hasilTbh <= 10) {
                return ['nilaiTbh' => 4, 'clsTbh' => 'bg-primary'];
            } else {
                return ['nilaiTbh' => 5, 'clsTbh' => 'bg-success'];
            }
        }
    }
    public static function persentaseBulananTbh ($tahun)
    {
        $persentaseBulananTbh = [];

            for ($bulanTbh = 1; $bulanTbh <= 12; $bulanTbh++) {
            $bulanFormattedTbh = str_pad($bulanTbh, 2, '0', STR_PAD_LEFT);

            // Ambil nilai Plgnlayan dan PlgnAktiv untuk bulan tertentu
            $kalKulasiJmlPlgnG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormattedTbh)->value('kalKulasiJmlPlgn') ?? 0;
            $JmlPlgnThLlG = Pelayanan::where('bulanTahun', $tahun . '-' . $bulanFormattedTbh)->value('jmlPndkWil') ?? 0;

            // Hitung persentase jika PlgnAktiv > 0
            if ($JmlPlgnThLlG > 0) {
                $persentaseTbh = ($kalKulasiJmlPlgnG / $JmlPlgnThLlG) * 100;
            } else {
                $persentaseTbh = 0;
            }

            // Simpan hasil ke array
            $persentaseBulananTbh[$bulanFormattedTbh] = round($persentaseTbh, 2);
            }
            return $persentaseBulananTbh;
    }

                //-------------------ASPEK SDM----------------//


    public static function urutanBulanSdm ()
    {
        $arrayBulan = Sdm::count();
        $urutanBulan = [];
            for ($i = 1; $i <= $arrayBulan; $i++) {
                $urutanBulan[] = str_pad($i, 2, '0', STR_PAD_LEFT);
            } 
         return $urutanBulan; 
    }
    //Rasio Pegawai Terhadap Pelanggan

    public static function JmlPgwai ($tahun)
    {
        return Sdm::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('JmlPgwai');
    }
    public static function JmlPlgn1000 ($tahun)
    {
        return Sdm::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->orderBy('bulanTahun', 'DESC')->value('JmlPlgn1000');
    }
    public static function hitungRaspeg ($tahun)
    {
        $JmlPgwai =evkinHelper::JmlPgwai($tahun);
        $JmlPlgn1000 = evkinHelper::JmlPlgn1000($tahun);
        return $JmlPlgn1000 > 0 ? ($JmlPgwai / $JmlPlgn1000) : 0;
    }
    public static function  hasilRpl($hasilRpl)
    {
        if ($hasilRpl > 12.0) {
            return ['nilaiRpl' => 1, 'clsRpl' => 'bg-danger'];
        } elseif ($hasilRpl > 10.0 && $hasilRpl <= 12.0) {
            return ['nilaiRpl' => 2, 'clsRpl' => 'bg-warning'];
        } elseif ($hasilRpl > 8.0 && $hasilRpl <= 10.0) {
            return ['nilaiRpl' => 3, 'clsRpl' => 'bg-primary'];
        } elseif ($hasilRpl > 6.0 && $hasilRpl <= 8.0) {
            return ['nilaiRpl' => 4, 'clsRpl' => 'bg-primary'];
        } else {
            return ['nilaiRpl' => 5, 'clsRpl' => 'bg-success'];
        }
    }
    public static function persentaseBulananRpl ($tahun)
    {
        $persentaseBulananRpl = [];
    
        for ($bulanRpl = 1; $bulanRpl <= 12; $bulanRpl++) {
            $bulanFormattedRpl = str_pad($bulanRpl, 2, '0', STR_PAD_LEFT);
            
            // Ambil nilai Plgnlayan dan PlgnAktiv untuk bulan tertentu
            $JmlPgwaiG = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormattedRpl)->value('JmlPgwai') ?? 0;
            $JmlPlgn1000G = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormattedRpl)->value('JmlPlgn1000') ?? 0;
        
            // Hitung persentase jika PlgnAktiv > 0
            if ($JmlPlgn1000G > 0) {
                $persentaseRpl = ($JmlPgwaiG / $JmlPlgn1000G);
            } else {
                $persentaseRpl = 0;
            }
        
            // Simpan hasil ke array
            $persentaseBulananRpl[$bulanFormattedRpl] = round($persentaseRpl, 2);
        } 
        return $persentaseBulananRpl;
    }

//Rasio Diklat Pegawai
    public static function JmlPegDiklat ($tahun)
    {
        return Sdm::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('JmlPegDiklat');
    }
    public static function hitungRasdik($tahun)
    {
        $JmlPegDiklat = evkinHelper::JmlPegDiklat($tahun);
        $JmlPgwai  = evkinHelper::JmlPgwai($tahun);
        return $JmlPgwai > 0 ? ($JmlPegDiklat / $JmlPgwai) * 100 : 0;
    }
    public static function  hasilRdp ($hasilRdp)
    {
        if ($hasilRdp < 20) {
            return ['nilaiRdp' => 1, 'clsRdp' => 'bg-danger'];
        } elseif ($hasilRdp > 20 && $hasilRdp <= 40) {
            return ['nilaiRdp' => 2, 'clsRdp' => 'bg-warning'];
        } elseif ($hasilRdp > 40 && $hasilRdp <= 60) {
            return ['nilaiRdp' => 3, 'clsRdp' => 'bg-primary'];
        } elseif ($hasilRdp > 60 && $hasilRdp <= 80) {
            return ['nilaiRdp' => 4, 'clsRdp' => 'bg-primary'];
        } else {
            return ['nilaiRdp' => 5, 'clsRdp' => 'bg-success'];
        }
    }
    public static function persentaseBulananRdp ($tahun)
    {
                $persentaseBulananRdp = [];

        for ($bulanRdp = 1; $bulanRdp <= 12; $bulanRdp++) {
            $bulanFormattedRdp= str_pad($bulanRdp, 2, '0', STR_PAD_LEFT);
            $JmlPegDiklatG = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormattedRdp)->value('JmlPegDiklat') ?? 0;
            $JmlPgwaiG = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormattedRdp)->value('JmlPgwai') ?? 0;

            if ($JmlPgwaiG > 0) {
                $persentaseRdp = ($JmlPegDiklatG / $JmlPgwaiG) * 100;
            } else {
                $persentaseRdp = 0;
            }

            $persentaseBulananRdp[$bulanFormattedRdp] = round($persentaseRdp, 2);
        }
        return $persentaseBulananRdp;
    }

//Rasio Biaya Diklat
    public static function RealByDiklat ($tahun)
    {
        return Sdm::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('RealByDiklat');
    } 
    public static function RealByPeg($tahun)
    {
        return Sdm::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->where('status',1)->sum('RealByPeg');
    }
    public static function hitungRasby ($tahun)
    {
        $RealByDiklat = evkinHelper::RealByDiklat($tahun);
        $RealByPeg = evkinHelper::RealByPeg($tahun);
        return $RealByPeg > 0 ? ($RealByDiklat / $RealByPeg) * 100 : 0;
    }
    public static function hasilRbd ($hasilRbd)
    {
        if ($hasilRbd <= 2.5) {
            return ['nilaiRbd' => 1, 'clsRbd' => 'bg-danger'];
        } elseif ($hasilRbd > 2.5 && $hasilRbd <= 5) {
            return ['nilaiRbd' => 2, 'clsRbd' => 'bg-warning'];
        } elseif ($hasilRbd > 5 && $hasilRbd <= 7.5) {
            return ['nilaiRbd' => 3, 'clsRbd' => 'bg-primary'];
        } elseif ($hasilRbd > 7.5 && $hasilRbd <= 10) {
            return ['nilaiRbd' => 4, 'clsRbd' => 'bg-primary'];
        } else {
            return ['nilaiRbd' => 5, 'clsRbd' => 'bg-success'];
        }
    }

    public static function persentaseBulananRbd ($tahun)
    {
        $persentaseBulananRbd = [];

        for ($bulanRbd= 1; $bulanRbd <= 12; $bulanRbd++) {
            $bulanFormattedRbd = str_pad($bulanRbd, 2, '0', STR_PAD_LEFT);
            $RealByDiklatG = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormattedRbd)->value('RealByDiklat') ?? 0;
            $JRealByPegG = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormattedRbd)->value('RealByPeg') ?? 0;

            if ($JRealByPegG > 0) {
                $persentaseRbd = ($RealByDiklatG / $JRealByPegG) * 100;
            } else {
                $persentaseRbd = 0;
            }

            $persentaseBulananRbd[$bulanFormattedRbd] = round($persentaseRbd, 2);
        }

        return $persentaseBulananRbd;
    }
    


}



    



    



    


    

    

