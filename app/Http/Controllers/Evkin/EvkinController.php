<?php

namespace App\Http\Controllers\Evkin;

use App\Http\Controllers\Controller;
use App\Models\Evkin\Keuangan;
use App\Models\Evkin\Operasional;
use App\Models\Evkin\Pelayanan;
use App\Models\Evkin\Sdm;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EvkinController extends Controller
{
    public function index ()
    {

        $tahun = Carbon::now()->year;
        //RETURN ON EQUTY
        $arrayBulan = Keuangan::count();
        $urutanBulan = [];
            for ($i = 1; $i <= $arrayBulan; $i++) {
                $urutanBulan[] = str_pad($i, 2, '0', STR_PAD_LEFT);
            }
        
        $labaStlPjk = Keuangan::sum('labaStlPjk');
        $jmlEkuitas = Keuangan::orderBy('bulanTahun', 'DESC')->value('jmlEkuitas');
        $hitungRoe = $jmlEkuitas > 0 ? ($labaStlPjk / $jmlEkuitas) * 100 : 0;
        $hasilRoe = round($hitungRoe, 2);

        if ($hasilRoe <= 0) {
            $nilaiRoe = 0;
            $clsRoe = 'bg-danger';
        } elseif ($hasilRoe > 0 && $hasilRoe <= 3) {
            $nilaiRoe = 2;
            $clsRoe = 'bg-warning';
        } elseif ($hasilRoe > 3 && $hasilRoe <= 7) {
            $nilaiRoe = 3;
            $clsRoe = 'bg-primary';
        } elseif ($hasilRoe > 7 && $hasilRoe <= 10) {
            $nilaiRoe = 4;
            $clsRoe = 'bg-primary';
        } else {
            $nilaiRoe = 5;
            $clsRoe = 'bg-success';
        }

        
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

        //RASIO OPERASIONAL

        $biayaOps = Keuangan::sum('biayaOps');
        $PndptnOps = Keuangan::sum('PndptnOps');
        $hitungRop = $PndptnOps > 0 ? ($biayaOps / $PndptnOps) : 0;
        $hasilRop = round($hitungRop, 2);

        if ($hasilRop > 1) {
            $nilaiRop = 1;
            $clsRop = 'bg-danger';
        } elseif ($hasilRop > 0.85 && $hasilRop <= 1) {
            $nilaiRop = 2;
            $clsRop = 'bg-warning';
        } elseif ($hasilRop > 0.65 && $hasilRop <= 0.85) {
            $nilaiRop = 3;
            $clsRop = 'bg-primary';
        } elseif ($hasilRop > 0.50 && $hasilRop <= 0.65) {
            $nilaiRop = 4;
            $clsRop = 'bg-primary';
        } else {
            $nilaiRop = 5;
            $clsRop = 'bg-success';
        }

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

        //RATIO KAS
        $kaStrkas = Keuangan::orderBy('bulanTahun', 'DESC')->value('kaStrkas');
        $HutangLancar = Keuangan::orderBy('bulanTahun', 'DESC')->value('HutangLancar');
        $hitungRok = $HutangLancar > 0 ? ($kaStrkas / $HutangLancar) * 100 : 0;
        $hasilRok = round($hitungRok, 2);

        if ($hasilRok >= 100) {
            $nilaiRok = 5;
            $clsRok = 'bg-success';
        } elseif ($hasilRok >= 80 && $hasilRok < 100) {
            $nilaiRok = 4;
            $clsRok = 'bg-primary';
        } elseif ($hasilRok >= 60 && $hasilRok < 80) {
            $nilaiRok = 3;
            $clsRok = 'bg-warning';
        } elseif ($hasilRok >= 40 && $hasilRok < 60) {
            $nilaiRok = 2;
            $clsRok = 'bg-danger';
        } else {
            $nilaiRok = 1;
            $clsRok = 'bg-dark';
        }

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

        //EFEKTIFITAS PENAGIHAN
        $JmlPnrmRekAir = Keuangan::sum('JmlPnrmRekAir');
        $jmlRekAir = Keuangan::sum('jmlRekAir');
        $hitungEf = $jmlRekAir > 0 ? ($JmlPnrmRekAir / $jmlRekAir) * 100 : 0;
        $hasilEf = round($hitungEf, 2);

        if ($hasilEf >= 90) {
            $nilaiEf = 5;
            $clsEf = 'bg-success';
        } elseif ($hasilEf >= 85 && $hasilEf < 90) {
            $nilaiEf = 4;
            $clsEf = 'bg-primary';
        } elseif ($hasilEf >= 80 && $hasilEf < 85) {
            $nilaiEf = 3;
            $clsEf = 'bg-warning';
        } elseif ($hasilEf >= 75 && $hasilEf < 80) {
            $nilaiEf = 2;
            $clsEf = 'bg-danger';
        } else {
            $nilaiEf = 1;
            $clsEf = 'bg-danger';
        }

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

        //SOLVABILITAS
        $TotalAktiva = Keuangan::orderBy('bulanTahun', 'DESC')->value('TotalAktiva');
        $TotalHutang = Keuangan::orderBy('bulanTahun', 'DESC')->value('TotalHutang');
        $hitungSol = $TotalHutang > 0 ? ($TotalAktiva / $TotalHutang) * 100 : 0;
        $hasilSol = round($hitungSol, 2);

        if ($hasilSol >= 200) {
            $nilaiSol = 5;
            $clsSol = 'bg-success';
        } elseif ($hasilSol >= 170 && $hasilSol < 200) {
            $nilaiSol = 4;
            $clsSol = 'bg-primary';
        } elseif ($hasilSol >= 135 && $hasilSol < 170) {
            $nilaiSol = 3;
            $clsSol = 'bg-warning';
        } elseif ($hasilSol >= 100 && $hasilSol < 135) {
            $nilaiSol = 2;
            $clsSol = 'bg-danger';
        } else {
            $nilaiSol = 1;
            $clsSol = 'bg-dark';
        }

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
        
        //Aspek Operasional
        $arrayBulan = Operasional::count();
            $urutanBulan = [];
                for ($i = 1; $i <= $arrayBulan; $i++) {
                    $urutanBulan[] = str_pad($i, 2, '0', STR_PAD_LEFT);
                }  
        //Rasio Produksi
        $VolProdRil = Operasional::sum('VolProdRil');
        $KpstsTrpsng = Operasional::sum('KpstsTrpsng');
        $hitungrasioProd = $KpstsTrpsng > 0 ? ($VolProdRil / $KpstsTrpsng) * 100 : 0;
        $hasilProd = round($hitungrasioProd, 2);

        if ($hasilProd <= 90) {
            $nilaiProd = 1;
            $clsProd = 'bg-danger';
        } elseif ($hasilProd > 80 && $hasilProd <= 90) {
            $nilaiProd = 2;
            $clsProd = 'bg-warning';
        } elseif ($hasilProd > 70 && $hasilProd <= 80) {
            $nilaiProd = 3;
            $clsProd = 'bg-info';
        } elseif ($hasilProd > 60 && $hasilProd <= 70) {
            $nilaiProd = 4;
            $clsProd = 'bg-primary';
        } else {
            $nilaiProd = 5;
            $clsProd = 'bg-success';
        }
        

        
        $persentaseBulananProd = []; // Array untuk menyimpan hasil perhitungan setiap bulan

    // Loop untuk setiap bulan dari 1 sampai 12
    for ($bulanProd = 1; $bulanProd <= 12; $bulanProd++) {
        // Format bulan dengan leading zero (01, 02, ... 12)
        $bulanFormattedProd = str_pad($bulanProd, 2, '0', STR_PAD_LEFT);

        // Ambil VolProdRil dan KpstsTrpsng untuk bulan dan tahun tertentu
        $volProdRil = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedProd)->sum('VolProdRil');
        $kpstsTrpsng = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedProd)->sum('KpstsTrpsng');

        // Cek agar tidak terjadi pembagian dengan nol
        if ($kpstsTrpsng > 0) {
            $persentaseProd = ($volProdRil / $kpstsTrpsng) * 100;
        } else {
            $persentaseProd= 0; // Jika KpstsTrpsng nol, hasilnya 0
        }

        // Simpan hasil perhitungan ke array
        $persentaseBulananProd[$bulanFormattedProd] = round($persentaseProd ,2); // Format dengan 2 angka desimal
    }
        
    
    //KEHILANGAN AIR
        $KalkulasiJumAirM = Operasional::sum('KalkulasiJumAir');
        $JmlAirDistM = Operasional::sum('JmlAirDist');
        $hitungnrw = $JmlAirDistM > 0 ? ($KalkulasiJumAirM / $JmlAirDistM) * 100 : 0;
        $nrw = round($hitungnrw, 2);
        
        if ($nrw <= 25) {
            $nilaiNrw = 5;
            $clsNrw= 'bg-success';
        } elseif ($nrw > 25 && $nrw <= 30) {
            $nilaiNrw = 4;
            $clsNrw = 'bg-primary';
        } elseif ($nrw > 30 && $nrw <= 35) {
            $nilaiNrw = 3;
            $clsNrw = 'bg-info';
        }
        elseif ($nrw > 35 && $nrw <= 40) {
                $nilaiNrw = 2;
                $clsNrw = 'bg-warning';
        } else { 
            $nilaiNrw = 1;
            $clsNrw = 'bg-success';
        }
        
        
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

    //Jam Operasi layanan

        $JmlWktPly = Operasional::sum('JmlWktPly');
        $hari = Operasional::sum('hari');
        $hitungjam = $hari> 0 ? ($JmlWktPly / $hari) : 0;
        
        $jam = round($hitungjam,2);

        
        if ($jam <= 12) {
            $nilaiJam = 1;
            $clsJam = 'bg-danger';
        } elseif ($jam > 12 && $jam <= 16) {
            $nilaiJam = 2;
            $clsJam = 'bg-warning';
        } elseif ($jam > 16 && $jam <= 18) {
            $nilaiJam = 3;
            $clsJam = 'bg-primary';
        } elseif ($jam > 18 && $jam <= 21) {
            $nilaiJam = 4;
            $clsJam = 'bg-primary';
        } else {
            $nilaiJam = 5;
            $clsJam = 'bg-success';
        }
        
        $persentaseBulananJam = [];
    for ($bulanJam = 1; $bulanJam <= 12; $bulanJam++) {
        $bulanFormattedJam = str_pad($bulanJam, 2, '0', STR_PAD_LEFT);
        $JmlWktPlyG = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedJam)->sum('JmlWktPly');
        $hariB = 30;
        if ($hariB > 0) {
            $persentaseJam= ($JmlWktPly / $hariB);
        } else {
            $persentaseJam = 0; 
        }
        $persentaseBulananJam[$bulanFormattedJam] = round($persentaseJam ,2);
    }

    //TEKANAN AIR PADA PELANGGAN

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
     
     if ($tekanan <= 20) {
         $nilaiTek = 1;
         $clsTek = 'bg-danger';
     } elseif ($tekanan > 20 && $tekanan <= 40) {
         $nilaiTek = 2;
         $clsTek = 'bg-warning';
     } elseif ($tekanan > 40 && $tekanan <= 60) {
         $nilaiTek = 3;
         $clsTek = 'bg-info';
     } elseif ($tekanan > 60 && $tekanan <= 80) {
         $nilaiTek = 4;
         $clsTek = 'bg-primary';
     } else {
         $nilaiTek = 5;
         $clsTek = 'bg-success';
     }
     
 
 $persentaseBulananTek = [];

for ($bulanTek = 1; $bulanTek <= 12; $bulanTek++) {
 $bulanFormattedTek = str_pad($bulanTek, 2, '0', STR_PAD_LEFT);
 
 // Ambil nilai Plgnlayan dan PlgnAktiv untuk bulan tertentu
 $PlgnlayanG = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedTek)->value('Plgnlayan') ?? 0;
 $PlgnAktivG = Operasional::where('bulanTahun', $tahun . '-' . $bulanFormattedTek)->value('PlgnAktiv') ?? 0;

 // Hitung persentase jika PlgnAktiv > 0
 if ($PlgnAktivG > 0) {
     $persentaseTek = ($PlgnlayanG / $PlgnAktivG) * 100;
 } else {
     $persentaseTek = 0;
 }

 // Simpan hasil ke array
 $persentaseBulananTek[$bulanFormattedTek] = round($persentaseTek, 2);
}
            

//Kalibarasi
            $MtrAirGnti = Operasional::sum('MtrAirGnti');
            $PlgnAktiv = Operasional::orderBy('bulanTahun', 'DESC')->value('PlgnAktiv');
            $hitungMtrAirGnti = $PlgnAktiv > 0 ? ($MtrAirGnti / $PlgnAktiv) * 100 : 0;
            $kalibrasi = round($hitungMtrAirGnti, 2);

            if ($kalibrasi <= 5) {
                $nilaiKal = 1;
                $clsKal = 'bg-danger';
            } elseif ($kalibrasi > 5 && $kalibrasi <= 10) {
                $nilaiKal= 2;
                $clsKal = 'bg-warning';
            } elseif ($kalibrasi > 10 && $kalibrasi <= 15) {
                $nilaiKal = 3;
                $clsKal= 'bg-primary';
            } elseif ($kalibrasi > 15 && $kalibrasi <= 20) {
                $nilaiKal = 4;
                $clsKal = 'bg-primary'; 
            } else {
                $nilaiKal = 5;
                $clsKal = 'bg-success';
            }


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

            $arrayBulan = Pelayanan::count();
            $urutanBulan = [];
                for ($i = 1; $i <= $arrayBulan; $i++) {
                    $urutanBulan[] = str_pad($i, 2, '0', STR_PAD_LEFT);
                }
        //Cakupan Pelayanan Teknis
        $JmlPnddkTrlyni = Pelayanan::orderBy('bulanTahun', 'DESC')->value('JmlPnddkTrlyni');
        $jmlPndkWil = Pelayanan::orderBy('bulanTahun', 'DESC')->value('jmlPndkWil');
        $hitungCakupan = $jmlPndkWil > 0 ? ($JmlPnddkTrlyni / $jmlPndkWil) * 100 : 0;
        $hasilCkp = round($hitungCakupan, 2);

        if ($hasilCkp  <= 20) {
            $nilaiCkp = 1;
            $clsCkp = 'bg-danger';
        } elseif ($hasilCkp > 20 && $hasilCkp <= 40) {
            $nilaiCkp = 2;
            $clsCkp = 'bg-warning';
        } elseif ($hasilCkp > 40 && $hasilCkp <= 60) {
            $nilaiCkp = 3;
            $clsCkp = 'bg-primary';
        } elseif ($hasilCkp > 60 && $hasilCkp <= 80) {
            $nilaiCkp = 4;
            $clsCkp = 'bg-primary';
        } else {
            $nilaiCkp = 5;
            $clsCkp = 'bg-success';
        }
        

        $tahun = Carbon::now()->year;
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

    //PENYELESAIAN ADUAN

    $AduanSlsai = Pelayanan::sum('AduanSlsai');
        $JmlAduan = Pelayanan::sum('JmlAduan');
        $hitungAduan = $JmlAduan > 0 ? ($AduanSlsai / $JmlAduan) * 100 : 0;
        $hasilAdu = round($hitungAduan, 2);

        if ($hasilAdu <= 80) {
            $nilaiAdu = 1;
            $clsAdu = 'bg-danger';
        } elseif ($hasilAdu > 60 && $hasilAdu <= 80) {
            $nilaiAdu = 2;
            $clsAdu = 'bg-warning';
        } elseif ($hasilAdu > 40 && $hasilAdu <= 60) {
            $nilaiAdu = 3;
            $clsAdu = 'bg-primary';
        } elseif ($hasilAdu > 20 && $hasilAdu <= 40) {
            $nilaiAdu = 4;
            $clsAdu = 'bg-primary';
        } else {
            $nilaiAdu = 5;
            $clsAdu = 'bg-success';
        }
        

        
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

    //Domestik
    $JmlAirTrjualDom = Pelayanan::sum('JmlAirTrjualDom');
        $JmlPlgnDom = Pelayanan::orderBy('bulanTahun', 'DESC')->value('JmlPlgnDom');
        $hitungDomestik = $JmlPlgnDom > 0 ? ($JmlAirTrjualDom / $JmlPlgnDom) / 12 : 0;
        $hasilDom = round($hitungDomestik, 2);

        if ($hasilDom <= 15) {
            $nilaiDom = 1;
            $clsDom = 'bg-danger';
        } elseif ($hasilDom > 15 && $hasilDom <= 20) {
            $nilaiDom = 2;
            $clsDom = 'bg-warning';
        } elseif ($hasilDom > 20 && $hasilDom <= 25) {
            $nilaiDom = 3;
            $clsDom = 'bg-primary';
        } elseif ($hasilDom > 25 && $hasilDom <= 30) {
            $nilaiDom = 4;
            $clsDom = 'bg-primary'; 
        } else {
            $nilaiDom = 5;
            $clsDom = 'bg-success';
        }
        
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

//Kualitas Air Pelannggan
$UjiKualitas = Pelayanan::sum('UjiKualitas');
        $titikUji = Pelayanan::sum('titikUji');
        $hitungUji = $titikUji > 0 ? ( $titikUji / $UjiKualitas ) * 100 : 0;
        $hasilQap = round($hitungUji, 2);

        if ($hasilQap <= 20) {
            $nilaiQap = 1;
            $clsQap = 'bg-danger';
        } elseif ($hasilQap > 20 && $hasilQap <= 40) {
            $nilaiQap = 2;
            $clsQap = 'bg-warning';
        } elseif ($hasilQap > 40 && $hasilQap <= 60) {
            $nilaiQap = 3;
            $clsQap = 'bg-info';
        } elseif ($hasilQap > 60 && $hasilQap <= 80) {
            $nilaiQap = 4;
            $clsQap = 'bg-primary'; 
        } else {
            $nilaiQap = 5;
            $clsQap = 'bg-success';
        }
        

   
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

//Pertumbuan pelanggan

$kalKulasiJmlPlgn = Pelayanan::orderBy('bulanTahun', 'DESC')->value('kalKulasiJmlPlgn');
$JmlPlgnThLl = Pelayanan::orderBy('bulanTahun', 'DESC')->value('JmlPlgnThLl');
$hitungTumbuh = $JmlPlgnThLl > 0 ? ($kalKulasiJmlPlgn / $JmlPlgnThLl) * 100 : 0;
$hasilTbh = round($hitungTumbuh, 2);

if ($hasilTbh <= 4) {
    $nilaiTbh = 1;
    $clsTbh = 'bg-danger';
} elseif ($hasilTbh > 4 && $hasilTbh <= 6) {
    $nilaiTbh = 2;
    $clsTbh = 'bg-warning';
} elseif ($hasilTbh > 6 && $hasilTbh <= 8) {
    $nilaiTbh = 3;
    $clsTbh = 'bg-primary';
} elseif ($hasilTbh > 8 && $hasilTbh <= 10) {
    $nilaiTbh = 4;
    $clsTbh = 'bg-primary';
} else {
    $nilaiTbh = 5;
    $clsTbh = 'bg-success';
}



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
//SDM
$arrayBulan = Sdm::count();
$urutanBulan = [];
    for ($i = 1; $i <= $arrayBulan; $i++) {
        $urutanBulan[] = str_pad($i, 2, '0', STR_PAD_LEFT);
    }
//Rasio Pegawai Terhadap pelanggan
$JmlPgwai = Sdm::orderBy('bulanTahun', 'DESC')->value('JmlPgwai');
$JmlPlgn1000 = Sdm::orderBy('bulanTahun', 'DESC')->value('JmlPlgn1000');
$hitungRaspeg = $JmlPlgn1000 > 0 ? ($JmlPgwai / $JmlPlgn1000) : 0;
$hasilRpl = round($hitungRaspeg, 2);

if ($hasilRpl > 12.0 ) {
$nilaiRpl = 1;
$clsRpl = 'bg-danger';
} elseif ($hasilRpl > 10.0 && $hasilRpl <= 12.0) {
$nilaiRpl = 2;
$clsRpl = 'bg-warning';
} elseif ($hasilRpl > 8.0 && $hasilRpl <= 10.0) {
$nilaiRpl = 3;
$clsRpl = 'bg-primary';
} elseif ($hasilRpl > 6.0 && $hasilRpl <= 8.0) {
$nilaiRpl = 4;
$clsRpl = 'bg-primary';
} else {
$nilaiRpl = 5;
$clsRpl = 'bg-success';
}


$tahun = Carbon::now()->year;
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

//Rasio Diklat Pegawai
$JmlPegDiklat = Sdm::sum('JmlPegDiklat');
$JmlPgwai = Sdm::orderBy('bulanTahun', 'DESC')->value('JmlPgwai');
$hitungRasdik = $JmlPgwai > 0 ? ($JmlPegDiklat / $JmlPgwai) * 100 : 0;
$hasilRdp = round($hitungRasdik, 2);

if ($hasilRdp < 20) {
$nilaiRdp = 1;
$clsRdp = 'bg-danger';
} elseif ($hasilRdp > 20 && $hasilRdp <= 40) {
$nilaiRdp = 2;
$clsRdp = 'bg-warning';
} elseif ($hasilRdp > 40 && $hasilRdp <= 60) {
$nilaiRdp = 3;
$clsRdp = 'bg-primary';
} elseif ($hasilRdp > 60 && $hasilRdp <= 80) {
$nilaiRdp = 4;
$clsRdp = 'bg-primary'; 
} else {
$nilaiRdp = 5;
$clsRdp = 'bg-success';
}



$persentaseBulananRdp = [];

for ($bulanRdp = 1; $bulanRdp <= 12; $bulanRdp++) {
$bulanFormattedRdp= str_pad($bulanRdp, 2, '0', STR_PAD_LEFT);
$JmlPegDiklatG = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormattedRdp)->value('JmlPegDiklat') ?? 0;
$JmlPgwaiG = Sdm::where('bulanTahun', $tahun . '-' . $bulanFormattedRdp)->value('JmlPgwai') ?? 0;

if ($JmlPgwaiG > 0) {
$persentase = ($JmlPegDiklatG / $JmlPgwaiG) * 100;
} else {
$persentaseRdp = 0;
}

$persentaseBulananRdp[$bulanFormattedRdp] = round($persentase, 2);
}

//Rasoio Biaya Diklat
$RealByDiklat = Sdm::sum('RealByDiklat');
$RealByPeg = Sdm::sum('RealByPeg');
$hitungRasby = $RealByPeg > 0 ? ($RealByDiklat / $RealByPeg) * 100 : 0;
$hasilRbd = round($hitungRasby, 2);

if ($hasilRbd <= 2.5) {
$nilaiRbd = 1;
$clsRbd = 'bg-danger';
} elseif ($hasilRbd > 2.5 && $hasilRbd <= 5) {
$nilaiRbd = 2;
$clsRbd = 'bg-warning';
} elseif ($hasilRbd > 5 && $hasilRbd <= 7.5) {
$nilaiRbd = 3;
$clsRbd = 'bg-primary';
} elseif ($hasilRbd > 7.5 && $hasilRbd <= 10) {
$nilaiRbd = 4;
$clsRbd = 'bg-primary'; 
} else {
$nilaiRbd = 5;
$clsRbd = 'bg-success';
}



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

        return view('main.index',compact('labaStlPjk','jmlEkuitas','hasilRoe','nilaiRoe','clsRoe','persentaseBulananRoe','biayaOps','PndptnOps','hasilRop','nilaiRop','clsRop','persentaseRopBulanan','kaStrkas','HutangLancar','hasilRok','nilaiRok','clsRok','persentaseBulananRok','JmlPnrmRekAir','jmlRekAir','hasilEf','nilaiEf','clsEf','persentaseBulananEf','TotalAktiva','TotalHutang','hasilSol','nilaiSol','clsSol','persentaseBulananSol','urutanBulan','VolProdRil','KpstsTrpsng','hasilProd','nilaiProd','clsProd','persentaseBulananProd','KalkulasiJumAirM','JmlAirDistM','nrw','nilaiNrw','clsNrw','persentaseBulananNrw','JmlWktPly','jam','hari','nilaiJam','clsJam','persentaseBulananJam','Plgnlayan','PlgnAktiv','tekanan','nilaiTek','clsTek','persentaseBulananTek','MtrAirGnti','PlgnAktiv','kalibrasi','nilaiKal','clsKal','persentaseBulananKal','urutanBulan','JmlPnddkTrlyni','jmlPndkWil','hasilCkp','nilaiCkp','clsCkp','persentaseBulananCkp','AduanSlsai','JmlAduan','hasilAdu','nilaiAdu','clsAdu','persentaseBulananAdu','JmlAirTrjualDom','JmlPlgnDom','hasilDom','nilaiDom','clsDom','persentaseBulananDom','UjiKualitas','titikUji','hasilQap','nilaiQap','clsQap','persentaseBulananQap','kalKulasiJmlPlgn','JmlPlgnThLl','hasilTbh','nilaiTbh','clsTbh','persentaseBulananTbh','urutanBulan','JmlPgwai','JmlPlgn1000','hasilRpl','nilaiRpl','clsRpl','persentaseBulananRpl','JmlPegDiklat','JmlPgwai','hasilRdp','nilaiRdp','clsRdp','persentaseBulananRdp','RealByDiklat','RealByPeg','hasilRbd','hasilRbd','nilaiRbd','clsRbd','persentaseBulananRbd','urutanBulan'));
    }
}
