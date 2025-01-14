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
        $labaSum = Keuangan::sum('labaStlPjk');
        $laba = round($labaSum / pow(10, strlen(floor($labaSum)) - 3), 2);
        $labaBulanan = Keuangan::select('labaStlPjk','bulanTahun')->get();
        
        //nrw
        $KalkulasiJumAirM = evkinHelper::KalkulasiJumAir();
        $JmlAirDistM = evkinHelper::JmlAirDist();
        $hitungnrw = evkinHelper::hitungnrw();
        $nrw = round($hitungnrw, 2);
        $dataNrw = evkinHelper::nilaiNrw($nrw);
        $nilaiNrw = $dataNrw['nilaiNrw'];
        $clsNrw = $dataNrw['clsNrw'];
        $persentaseBulananNrw = evkinHelper::persentaseBulananNrw($tahun);

        //cakupan
        $JmlPnddkTrlyni = evkinHelper::JmlPnddkTrlyni();
        $jmlPndkWil = evkinHelper::jmlPndkWil();
        $hitungCakupan = evkinHelper::hitungCakupan();
        $hasilCkp = round($hitungCakupan, 2);
        $dataCkp = evkinHelper::hasilCkp($hasilCkp);
        $nilaiCkp = $dataCkp['nilaiCkp'];
        $clsCkp = $dataCkp['clsCkp'];
        $persentaseBulananCkp = evkinHelper::persentaseBulananCkp($tahun);
    
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
        $dataCkp = evkinHelper::hasilCkp($hasilCkp);
        $nilaiCkp = $dataCkp['nilaiCkp'];
        $clsCkp = $dataCkp['clsCkp'];
        $persentaseBulananCkp = evkinHelper::persentaseBulananCkp($tahun);
        
        //Penyelsaian Aduan
        $AduanSlsai = evkinHelper::AduanSlsai();
        $JmlAduan = evkinHelper::JmlAduan();
        $hitungAduan = evkinHelper::hitungAduan();
        $hasilAdu = round($hitungAduan, 2);
        $dataAdu = evkinHelper::hasilAdu($hasilAdu);
        $nilaiAdu = $dataAdu['nilaiAdu'];
        $clsAdu = $dataAdu['clsAdu'];
        $persentaseBulananAdu = evkinHelper::persentaseBulananAdu($tahun);
        
        //Domestik
        $JmlAirTrjualDom = Pelayanan::sum('JmlAirTrjualDom');
        $JmlPlgnDom = Pelayanan::orderBy('bulanTahun', 'DESC')->value('JmlPlgnDom');
        $hitungDomestik = evkinHelper::hitungDomestik();
        $hasilDom = round($hitungDomestik, 2);
        $dataDom = evkinHelper::hasilDom($hasilDom);
        $nilaiDom = $dataDom['nilaiDom'];
        $clsDom = $dataDom['clsDom'];
        $persentaseBulananDom = evkinHelper::persentaseBulananDom($tahun);
        
        //Kualitas Air Pelannggan
        $UjiKualitas = evkinHelper::UjiKualitas();
        $titikUji = evkinHelper::titikUji();
        $hitungUji = evkinHelper::hitungUji();
        $hasilQap = round($hitungUji, 2);
        $dataUji = evkinHelper::hasilQap($hasilQap);
        $nilaiQap = $dataUji['nilaiQap'];
        $clsQap = $dataUji['clsQap'];
        $persentaseBulananQap = evkinHelper::persentaseBulananQap($tahun);
        
        //Pertumbuan pelanggan
        $kalKulasiJmlPlgn = evkinHelper::kalKulasiJmlPlgn();
        $JmlPlgnThLl = evkinHelper::JmlPlgnThLl();
        $hitungTumbuh =evkinHelper::hitungTumbuh();
        $hasilTbh = round($hitungTumbuh, 2);
        $dataTbh = evkinHelper::hasilTbh($hasilTbh);
        $nilaiTbh = $dataTbh['nilaiTbh'];
        $clsTbh = $dataTbh['clsTbh'];
        $persentaseBulananTbh = evkinHelper::persentaseBulananTbh($tahun);
        
        return view('mobile.pelayanan',compact('JmlPnddkTrlyni','jmlPndkWil','hasilCkp','nilaiCkp','clsCkp','persentaseBulananCkp','AduanSlsai','JmlAduan','hasilAdu','nilaiAdu','clsAdu','persentaseBulananAdu','JmlAirTrjualDom','JmlPlgnDom','hasilDom','nilaiDom','clsDom','persentaseBulananDom','UjiKualitas','titikUji','hasilQap','nilaiQap','clsQap','persentaseBulananQap','kalKulasiJmlPlgn','JmlPlgnThLl','hasilTbh','nilaiTbh','clsTbh','persentaseBulananTbh','urutanBulan'));
    }

    public function sdm ()
    {
        $tahun = 2024;
        $urutanBulan = evkinHelper::urutanBulanSdm();
       
        //Rasio Pegawai Terhadap pelanggan
        $JmlPgwai =evkinHelper::JmlPgwai();
        $JmlPlgn1000 = evkinHelper::JmlPlgn1000();
        $hitungRaspeg = evkinHelper::hitungRaspeg();
        $hasilRpl = round($hitungRaspeg, 2);
        $dataRpl = evkinHelper::hasilRpl($hasilRpl);
        $nilaiRpl = $dataRpl['nilaiRpl'];
        $clsRpl = $dataRpl['clsRpl'];
        $persentaseBulananRpl = evkinHelper::persentaseBulananRpl($tahun);
        
        //Rasio Diklat Pegawai
        $JmlPegDiklat = evkinHelper::JmlPegDiklat();
        $JmlPgwai  = evkinHelper::JmlPgwai();
        $hitungRasdik = evkinHelper::hitungRasdik();
        $hasilRdp = round($hitungRasdik, 2);
        $dataRdp = evkinHelper::hasilRdp($hasilRdp);
        $nilaiRdp = $dataRdp['nilaiRdp'];
        $clsRdp = $dataRdp['clsRdp'];
        $persentaseBulananRdp = evkinHelper::persentaseBulananRdp($tahun);
        
        //Rasoio Biaya Diklat
        $RealByDiklat = evkinHelper::RealByDiklat();
        $RealByPeg = evkinHelper::RealByPeg();
        $hitungRasby = evkinHelper::hitungRasby();
        $hasilRbd = round($hitungRasby, 2);
        $dataRbd = evkinHelper::hasilRbd($hasilRbd);
        $nilaiRbd = $dataRbd['nilaiRbd'];
        $clsRbd = $dataRbd['clsRbd'];
        $persentaseBulananRbd = evkinHelper::persentaseBulananRbd($tahun);
        
        return view('mobile.sdm',compact('JmlPgwai','JmlPlgn1000','hasilRpl','nilaiRpl','clsRpl','persentaseBulananRpl','JmlPegDiklat','JmlPgwai','hasilRdp','nilaiRdp','clsRdp','persentaseBulananRdp','RealByDiklat','RealByPeg','hasilRbd','hasilRbd','nilaiRbd','clsRbd','persentaseBulananRbd','urutanBulan'));
    }

    private function formatNumber($number)
    {
        $number /= 1000000000; // Konversi ke miliar
        return number_format($number, 2, '.', ''); // 2 desimal, titik sebagai pemisah
    }
}
