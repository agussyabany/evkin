<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\evkinHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Evkin\EvkinController;
use App\Models\Evkin\Keuangan;
use App\Models\Evkin\Operasional;
use App\Models\Evkin\Pelayanan;
use App\Models\Evkin\Sdm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
class MobileController extends Controller
{
    public function utama ()
    {
        $on = 1;
        return view('mobile',compact(['on']));
    }
    public function kinerja ()
    {
        $tahun = 2024;
        $arrayBulan = Operasional::count();
            $urutanBulan = [];
                for ($i = 1; $i <= $arrayBulan; $i++) {
                    $urutanBulan[] = str_pad($i, 2, '0', STR_PAD_LEFT);
                }
        //laba
        $labaSum = Keuangan::sum('labaStlPjk'); // nilaiRoe asli, misal 107038155372
        $laba = round($labaSum / pow(10, strlen(floor($labaSum)) - 3), 2); // Ambil 3 digit pertama dan 2 di belakang koma
        $labaBulanan = Keuangan::select('labaStlPjk','bulanTahun')->get();
        
        //nrw
        $KalkulasiJumAirM = Operasional::sum('KalkulasiJumAir');
        $JmlAirDistM = Operasional::sum('JmlAirDist');
        $hitungnrw = $JmlAirDistM > 0 ? ($KalkulasiJumAirM / $JmlAirDistM) * 100 : 0;
        $nrw = round($hitungnrw, 2);
        
        if ($nrw <= 20) {
            $nilaiNrw = 4;
            $clsNrw= 'bg-success';
        } elseif ($nrw > 20 && $nrw <= 30) {
            $nilaiNrw = 3;
            $clsNrw = 'bg-primary';
        } elseif ($nrw > 30 && $nrw <= 40) {
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

    //cakupan
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
        

        $tahun = 2024;
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
    
    return view('mobile.home',compact('laba','labaSum','nrw','nilaiNrw','persentaseBulananNrw','KalkulasiJumAirM','JmlAirDistM','JmlPnddkTrlyni','jmlPndkWil','hasilCkp','nilaiCkp','persentaseBulananCkp','labaBulanan','urutanBulan'));
    }

    
    
    
    
    public function keuangan ()
    {
            $tahun = 2024;
            $urutanBulan =evkinHelper::UrutanBulan();
            
            //RETURN OF EQUITY
            $labaStlPjk = evkinHelper::labaStlPjk();
            $jmlEkuitas = evkinHelper::jmlEkuitas();
            $hitungRoe = evkinHelper::hitungRoe() ;
            $hasilRoe = round($hitungRoe, 2);
            $roeData = EvkinHelper::nilaiRoe($hasilRoe);
            $nilaiRoe = $roeData['nilaiRoe'];
            $clsRoe = $roeData['clsRoe'];
            $persentaseBulananRoe = EvkinHelper::hitungRoeBulanan($tahun);

            //RASIO OPERASIONAL
            $biayaOps = evkinHelper::biayaOps();
            $PndptnOps = evkinHelper::PndptnOps();
            $hitungRop = evkinHelper::hitungRop();
            $hasilRop = round($hitungRop, 2);
            $ropData = evkinHelper::nilaiRop($hasilRop);
            $nilaiRop = $ropData['nilaiRop'];
            $clsRop = $ropData['clsRop'];
            $persentaseRopBulanan = evkinHelper::hitungRopBulanan($tahun);
            
            //RATIO KAS
            $kaStrkas = evkinHelper::kaStrkas();
            $HutangLancar = evkinHelper::HutangLancar();
            $hitungRok = evkinHelper::hitungRok();
            $hasilRok = round($hitungRok, 2);
            $rokData = evkinHelper::nilaiRok($hasilRok);
            $nilaiRok = $rokData['nilaiRok'];
            $clsRok = $rokData['clsRok'];
            $persentaseBulananRok = evkinHelper::persentaseBulananRok($tahun);
            
            //EFEKTIFITAS PENAGIHAN
            $JmlPnrmRekAir = evkinHelper::JmlPnrmRekAir();
            $jmlRekAir = evkinHelper::jmlRekAir();
            $hitungEf = evkinHelper::hitungEf();
            $hasilEf = round($hitungEf, 2);
            $efData = evkinHelper::nilaiEf($hasilEf);
            $clsEf = $efData['clsEf'];
            $nilaiEf = $efData['nilaiEf'];
            $persentaseBulananEf = evkinHelper::persentaseBulananEf($tahun);

            //SOLVABILITAS
            $TotalAktiva = evkinHelper::TotalAktiva();
            $TotalHutang = evkinHelper::TotalHutang();
            $hitungSol = evkinHelper::hitungSol();
            $hasilSol = round($hitungSol, 2);
            $solData = evkinHelper::nilaiSol($hasilSol);
            $nilaiSol = $solData['nilaiSol'];
            $clsSol = $solData['clsSol'];
            $persentaseBulananSol = evkinHelper::persentaseBulananSol($tahun);

            
            return view('mobile.keuangan',compact('labaStlPjk','jmlEkuitas','hasilRoe','nilaiRoe','clsRoe','persentaseBulananRoe','biayaOps','PndptnOps','hasilRop','nilaiRop','clsRop','persentaseRopBulanan','kaStrkas','HutangLancar','hasilRok','nilaiRok','clsRok','persentaseBulananRok','JmlPnrmRekAir','jmlRekAir','hasilEf','nilaiEf','clsEf','persentaseBulananEf','TotalAktiva','TotalHutang','hasilSol','nilaiSol','clsSol','persentaseBulananSol','urutanBulan'));
       
    }

    public function operasional ()
    { 
        $tahun = 2024; // Tahun saat ini
        $urutanBulan =evkinHelper::UrutanBulanOps(); 
        
        //Rasio Produksi
        $VolProdRil = evkinHelper::VolProdRil();
        $KpstsTrpsng = evkinHelper::KpstsTrpsng();
        $hitungrasioProd = evkinHelper::hitungrasioProd();
        $hasilProd = round($hitungrasioProd, 2);
        $prodData = evkinHelper::nilaiProd($hasilProd);
        $nilaiProd= $prodData['nilaiProd'];
        $clsProd = $prodData['clsProd'];
        $persentaseBulananProd = evkinHelper::persentaseBulananProd($tahun);
        
        //Kehilangan Air
        $KalkulasiJumAirM = evkinHelper::KalkulasiJumAir();
        $JmlAirDistM = evkinHelper::JmlAirDist();
        $hitungnrw = evkinHelper::hitungnrw();
        $nrw = round($hitungnrw, 2);
        $dataNrw = evkinHelper::nilaiNrw($nrw);
        $nilaiNrw = $dataNrw['nilaiNrw'];
        $clsNrw = $dataNrw['clsNrw'];
        $persentaseBulananNrw = evkinHelper::persentaseBulananNrw($tahun);
        
        //Jam Operasi layanan
        $JmlWktPly = evkinHelper::JmlWktPly();
        $hari = evkinHelper::hari();
        $hitungjam = evkinHelper::hitungjam();
        $jam = round($hitungjam,2);
        $dataJam = evkinHelper::nilaijam($jam);
        $nilaiJam = $dataJam['nilaiJam'];
        $clsJam = $dataJam['clsJam'];
        $persentaseBulananJam = evkinHelper::persentaseBulananJam($tahun);
        
        //Tekanan Air Pada Pelanggan
        $Plgnlayan = evkinHelper::Plgnlayan();
        $PlgnAktiv = evkinHelper::PlgnAktiv();
        $hitungTekanan = evkinHelper::hitungTekanan();
        $tekanan = round($hitungTekanan, 2);
        $dataTekanan = evkinHelper::tekanan($tekanan);
        $clsTek = $dataTekanan['clsTek'];
        $nilaiTek = $dataTekanan['nilaiTek'];
        $persentaseBulananTek = evkinHelper::persentaseBulananTek($tahun);
        
        //Kalibarasi
        $MtrAirGnti = evkinHelper::MtrAirGnti();
        $hitungMtrAirGnti = evkinHelper::hitungMtrAirGnti();
        $kalibrasi = round($hitungMtrAirGnti, 2);
        $dataKalibrasi = evkinHelper::kalibrasi($kalibrasi);
        $nilaiKal = $dataKalibrasi['nilaiKal'];
        $clsKal  =$dataKalibrasi['clsKal'];
        $persentaseBulananKal = evkinHelper::persentaseBulananKal($tahun);
        
        
        return view('mobile.operasional',compact('VolProdRil','KpstsTrpsng','hasilProd','nilaiProd','clsProd','persentaseBulananProd','KalkulasiJumAirM','JmlAirDistM','nrw','nilaiNrw','clsNrw','persentaseBulananNrw','JmlWktPly','jam','hari','nilaiJam','clsJam','persentaseBulananJam','Plgnlayan','PlgnAktiv','tekanan','nilaiTek','clsTek','persentaseBulananTek','MtrAirGnti','PlgnAktiv','kalibrasi','nilaiKal','clsKal','persentaseBulananKal','urutanBulan'));
    }

    public function pelayanan ()
    {
        $urutanBulan = evkinHelper::UrutanBulanPel();
        $tahun = 2024;


        //Cakupan Pelayanan Teknis
        $JmlPnddkTrlyni = evkinHelper::JmlPnddkTrlyni();
        $jmlPndkWil = evkinHelper::jmlPndkWil();
        $hitungCakupan = evkinHelper::hitungCakupan();
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
        

        $tahun = 2024;
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
        return view('mobile.pelayanan',compact('JmlPnddkTrlyni','jmlPndkWil','hasilCkp','nilaiCkp','clsCkp','persentaseBulananCkp','AduanSlsai','JmlAduan','hasilAdu','nilaiAdu','clsAdu','persentaseBulananAdu','JmlAirTrjualDom','JmlPlgnDom','hasilDom','nilaiDom','clsDom','persentaseBulananDom','UjiKualitas','titikUji','hasilQap','nilaiQap','clsQap','persentaseBulananQap','kalKulasiJmlPlgn','JmlPlgnThLl','hasilTbh','nilaiTbh','clsTbh','persentaseBulananTbh','urutanBulan'));
    }

    public function sdm ()
    {
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
        

        $tahun = 2024;
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


        return view('mobile.sdm',compact('JmlPgwai','JmlPlgn1000','hasilRpl','nilaiRpl','clsRpl','persentaseBulananRpl','JmlPegDiklat','JmlPgwai','hasilRdp','nilaiRdp','clsRdp','persentaseBulananRdp','RealByDiklat','RealByPeg','hasilRbd','hasilRbd','nilaiRbd','clsRbd','persentaseBulananRbd','urutanBulan'));
    }

    private function formatNumber($number)
    {
        $number /= 1000000000; // Konversi ke miliar
        return number_format($number, 2, '.', ''); // 2 desimal, titik sebagai pemisah
    }
}
