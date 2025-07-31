<?php

namespace App\Http\Controllers\Evkin;

use App\Helpers\evkinHelper;
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
    { $tahun = session('tahun');
            $awal = session('bulan_awal');//ini nilainya MM misal 01
            $akhir = session('bulan_akhir');//ini nilainya MM misal 02
            $bulanAwal = $tahun . '-' . $awal;
            $bulanAkhir = $tahun . '-' . $akhir;
            $urutanBulan =evkinHelper::UrutanBulan();
                                            // KEUANGAN

            //RETURN OF EQUITY
            $labaStlPjk = evkinHelper::labaStlPjk($tahun,$bulanAwal,$bulanAkhir);
            $jmlEkuitas = evkinHelper::jmlEkuitas($tahun,$bulanAwal,$bulanAkhir);
            $hitungRoe = evkinHelper::hitungRoe($tahun,$bulanAwal,$bulanAkhir) ;
            $hasilRoe = round($hitungRoe, 2);
            $roeData = EvkinHelper::nilaiRoe($hasilRoe);
            $nilaiRoe = $roeData['nilaiRoe'];
            $clsRoe = $roeData['clsRoe'];
            $persentaseBulananRoe = EvkinHelper::hitungRoeBulanan($tahun,$bulanAwal,$bulanAkhir);

            //RASIO OPERASIONAL
            $biayaOps = evkinHelper::biayaOps($tahun,$bulanAwal,$bulanAkhir);
            $PndptnOps = evkinHelper::PndptnOps($tahun,$bulanAwal,$bulanAkhir);
            $hitungRop = evkinHelper::hitungRop($tahun,$bulanAwal,$bulanAkhir);
            $hasilRop = round($hitungRop, 2);
            $ropData = evkinHelper::nilaiRop($hasilRop);
            $nilaiRop = $ropData['nilaiRop'];
            $clsRop = $ropData['clsRop'];
            $persentaseRopBulanan = evkinHelper::hitungRopBulanan($tahun,$bulanAwal,$bulanAkhir);

            //RATIO KAS
            $kaStrkas = evkinHelper::kaStrkas($tahun,$bulanAwal,$bulanAkhir);
            $HutangLancar = evkinHelper::HutangLancar($tahun,$bulanAwal,$bulanAkhir);
            $hitungRok = evkinHelper::hitungRok($tahun,$bulanAwal,$bulanAkhir);
            $hasilRok = round($hitungRok, 2);
            $rokData = evkinHelper::nilaiRok($hasilRok);
            $nilaiRok = $rokData['nilaiRok'];
            $clsRok = $rokData['clsRok'];
            $persentaseBulananRok = evkinHelper::persentaseBulananRok($tahun,$bulanAwal,$bulanAkhir);

             //EFEKTIFITAS PENAGIHAN
            $JmlPnrmRekAir = evkinHelper::JmlPnrmRekAir($tahun,$bulanAwal,$bulanAkhir);
            $jmlRekAir = evkinHelper::jmlRekAir($tahun,$bulanAwal,$bulanAkhir);
            $hitungEf = evkinHelper::hitungEf($tahun,$bulanAwal,$bulanAkhir);
            $hasilEf = round($hitungEf, 2);
            $efData = evkinHelper::nilaiEf($hasilEf);
            $clsEf = $efData['clsEf'];
            $nilaiEf = $efData['nilaiEf'];
            $persentaseBulananEf = evkinHelper::persentaseBulananEf($tahun,$bulanAwal,$bulanAkhir);

            //SOLVABILITAS
            $TotalAktiva = evkinHelper::TotalAktiva($tahun,$bulanAwal,$bulanAkhir);
            $TotalHutang = evkinHelper::TotalHutang($tahun,$bulanAwal,$bulanAkhir);
            $hitungSol = evkinHelper::hitungSol($tahun,$bulanAwal,$bulanAkhir);
            $hasilSol = round($hitungSol, 2);
            $solData = evkinHelper::nilaiSol($hasilSol);
            $nilaiSol = $solData['nilaiSol'];
            $clsSol = $solData['clsSol'];
            $persentaseBulananSol = evkinHelper::persentaseBulananSol($tahun,$bulanAwal,$bulanAkhir);


                                        //OPERASIONAL
            //Rasio Produksi
        $VolProdRil = evkinHelper::VolProdRil($tahun,$bulanAwal,$bulanAkhir);
        $KpstsTrpsng = evkinHelper::KpstsTrpsng($tahun,$bulanAwal,$bulanAkhir);
        $hitungrasioProd = evkinHelper::hitungrasioProd($tahun,$bulanAwal,$bulanAkhir);
        $hasilProd = round($hitungrasioProd, 2);
        $prodData = evkinHelper::nilaiProd($hasilProd);
        $nilaiProd= $prodData['nilaiProd'];
        $clsProd = $prodData['clsProd'];
        $persentaseBulananProd = evkinHelper::persentaseBulananProd($tahun,$bulanAwal,$bulanAkhir);

        //Kehilangan Air
        $KalkulasiJumAirM = evkinHelper::KalkulasiJumAir($tahun,$bulanAwal,$bulanAkhir);
        $JmlAirDistM = evkinHelper::JmlAirDist($tahun,$bulanAwal,$bulanAkhir);
        $hitungnrw = evkinHelper::hitungnrw($tahun,$bulanAwal,$bulanAkhir);
        $nrw = round($hitungnrw, 2);
        $dataNrw = evkinHelper::nilaiNrw($nrw);
        $nilaiNrw = $dataNrw['nilaiNrw'];
        $clsNrw = $dataNrw['clsNrw'];
        $persentaseBulananNrw = evkinHelper::persentaseBulananNrw($tahun,$bulanAwal,$bulanAkhir);

        //Jam Operasi layanan
        $JmlWktPly = evkinHelper::JmlWktPly($tahun,$bulanAwal,$bulanAkhir);
        $hari = evkinHelper::hari($tahun,$bulanAwal,$bulanAkhir);
        $hitungjam = evkinHelper::hitungjam($tahun,$bulanAwal,$bulanAkhir);
        $jam = round($hitungjam,2);
        $dataJam = evkinHelper::nilaijam($jam);
        $nilaiJam = $dataJam['nilaiJam'];
        $clsJam = $dataJam['clsJam'];
        $persentaseBulananJam = evkinHelper::persentaseBulananJam($tahun,$bulanAwal,$bulanAkhir);

        //Tekanan Air Pada Pelanggan
        $Plgnlayan = evkinHelper::Plgnlayan($tahun,$bulanAwal,$bulanAkhir);
        $PlgnAktiv = evkinHelper::PlgnAktiv($tahun,$bulanAwal,$bulanAkhir);
        $hitungTekanan = evkinHelper::hitungTekanan($tahun,$bulanAwal,$bulanAkhir);
        $tekanan = round($hitungTekanan, 2);
        $dataTekanan = evkinHelper::tekanan($tekanan);
        $clsTek = $dataTekanan['clsTek'];
        $nilaiTek = $dataTekanan['nilaiTek'];
        $persentaseBulananTek = evkinHelper::persentaseBulananTek($tahun,$bulanAwal,$bulanAkhir);

         //Kalibarasi
        $MtrAirGnti = evkinHelper::MtrAirGnti($tahun,$bulanAwal,$bulanAkhir);
        $hitungMtrAirGnti = evkinHelper::hitungMtrAirGnti($tahun,$bulanAwal,$bulanAkhir);
        $kalibrasi = round($hitungMtrAirGnti, 2);
        $dataKalibrasi = evkinHelper::kalibrasi($kalibrasi);
        $nilaiKal = $dataKalibrasi['nilaiKal'];
        $clsKal  =$dataKalibrasi['clsKal'];
        $persentaseBulananKal = evkinHelper::persentaseBulananKal($tahun,$bulanAwal,$bulanAkhir);

                                //PELLAYANNAN
        //Cakupan Pelayanan Teknis
        $JmlPnddkTrlyni = evkinHelper::JmlPnddkTrlyni($tahun,$bulanAwal,$bulanAkhir);
        $jmlPndkWil = evkinHelper::jmlPndkWil($tahun,$bulanAwal,$bulanAkhir);
        $hitungCakupan = evkinHelper::hitungCakupan($tahun,$bulanAwal,$bulanAkhir);
        $hasilCkp = round($hitungCakupan, 2);
        $dataCkp = evkinHelper::hasilCkp($hasilCkp);
        $nilaiCkp = $dataCkp['nilaiCkp'];
        $clsCkp = $dataCkp['clsCkp'];
        $persentaseBulananCkp = evkinHelper::persentaseBulananCkp($tahun,$bulanAwal,$bulanAkhir);

         //Penyelsaian Aduan
        $AduanSlsai = evkinHelper::AduanSlsai($tahun,$bulanAwal,$bulanAkhir);
        $JmlAduan = evkinHelper::JmlAduan($tahun,$bulanAwal,$bulanAkhir);
        $hitungAduan = evkinHelper::hitungAduan($tahun,$bulanAwal,$bulanAkhir);
        $hasilAdu = round($hitungAduan, 2);
        $dataAdu = evkinHelper::hasilAdu($hasilAdu);
        $nilaiAdu = $dataAdu['nilaiAdu'];
        $clsAdu = $dataAdu['clsAdu'];
        $persentaseBulananAdu = evkinHelper::persentaseBulananAdu($tahun,$bulanAwal,$bulanAkhir);

        //Domestik
        $JmlAirTrjualDom = Pelayanan::sum('JmlAirTrjualDom');
        $JmlPlgnDom = Pelayanan::orderBy('bulanTahun', 'DESC')->value('JmlPlgnDom');
        $hitungDomestik = evkinHelper::hitungDomestik($tahun,$bulanAwal,$bulanAkhir);
        $hasilDom = round($hitungDomestik, 2);
        $dataDom = evkinHelper::hasilDom($hasilDom);
        $nilaiDom = $dataDom['nilaiDom'];
        $clsDom = $dataDom['clsDom'];
        $persentaseBulananDom = evkinHelper::persentaseBulananDom($tahun,$bulanAwal,$bulanAkhir);

         //Kualitas Air Pelannggan
        $UjiKualitas = evkinHelper::UjiKualitas($tahun,$bulanAwal,$bulanAkhir);
        $titikUji = evkinHelper::titikUji($tahun,$bulanAwal,$bulanAkhir);
        $hitungUji = evkinHelper::hitungUji($tahun,$bulanAwal,$bulanAkhir);
        $hasilQap = round($hitungUji, 2);
        $dataUji = evkinHelper::hasilQap($hasilQap);
        $nilaiQap = $dataUji['nilaiQap'];
        $clsQap = $dataUji['clsQap'];
        $persentaseBulananQap = evkinHelper::persentaseBulananQap($tahun,$bulanAwal,$bulanAkhir);

        //Pertumbuan pelanggan
        $kalKulasiJmlPlgn = evkinHelper::kalKulasiJmlPlgn($tahun,$bulanAwal,$bulanAkhir);
        $JmlPlgnThLl = evkinHelper::JmlPlgnThLl($tahun,$bulanAwal,$bulanAkhir);
        $hitungTumbuh =evkinHelper::hitungTumbuh($tahun,$bulanAwal,$bulanAkhir);
        $hasilTbh = round($hitungTumbuh, 2);
        $dataTbh = evkinHelper::hasilTbh($hasilTbh);
        $nilaiTbh = $dataTbh['nilaiTbh'];
        $clsTbh = $dataTbh['clsTbh'];
        $persentaseBulananTbh = evkinHelper::persentaseBulananTbh($tahun,$bulanAwal,$bulanAkhir);


                                        //SDM
        //Rasio Pegawai Terhadap pelanggan
        $JmlPgwai =evkinHelper::JmlPgwai($tahun,$bulanAwal,$bulanAkhir);
        $JmlPlgn1000 = evkinHelper::JmlPlgn1000($tahun,$bulanAwal,$bulanAkhir);
        $hitungRaspeg = evkinHelper::hitungRaspeg($tahun,$bulanAwal,$bulanAkhir);
        $hasilRpl = round($hitungRaspeg, 2);
        $dataRpl = evkinHelper::hasilRpl($hasilRpl);
        $nilaiRpl = $dataRpl['nilaiRpl'];
        $clsRpl = $dataRpl['clsRpl'];
        $clsRplPie = $dataRpl['clsRplPie'];
        $persentaseBulananRpl = evkinHelper::persentaseBulananRpl($tahun,$bulanAwal,$bulanAkhir);

        //Rasio Diklat Pegawai
        $JmlPegDiklat = evkinHelper::JmlPegDiklat($tahun,$bulanAwal,$bulanAkhir);
        $JmlPgwai  = evkinHelper::JmlPgwai($tahun,$bulanAwal,$bulanAkhir);
        $hitungRasdik = evkinHelper::hitungRasdik($tahun,$bulanAwal,$bulanAkhir);
        $hasilRdp = round($hitungRasdik, 2);
        $dataRdp = evkinHelper::hasilRdp($hasilRdp);
        $nilaiRdp = $dataRdp['nilaiRdp'];
        $clsRdp = $dataRdp['clsRdp'];
        $clsRdpPie = $dataRdp['clsRdpPie'];
        $persentaseBulananRdp = evkinHelper::persentaseBulananRdp($tahun,$bulanAwal,$bulanAkhir);

        //Rasoio Biaya Diklat
        $RealByDiklat = evkinHelper::RealByDiklat($tahun,$bulanAwal,$bulanAkhir);
        $RealByPeg = evkinHelper::RealByPeg($tahun,$bulanAwal,$bulanAkhir);
        $hitungRasby = evkinHelper::hitungRasby($tahun,$bulanAwal,$bulanAkhir);
        $hasilRbd = round($hitungRasby, 2);
        $dataRbd = evkinHelper::hasilRbd($hasilRbd);
        $nilaiRbd = $dataRbd['nilaiRbd'];
        $clsRbd = $dataRbd['clsRbd'];
        $clsRbdPie = $dataRbd['clsRbdPie'];
        $persentaseBulananRbd = evkinHelper::persentaseBulananRbd($tahun,$bulanAwal,$bulanAkhir);






        
        return view('main.index',compact('labaStlPjk','jmlEkuitas','hasilRoe','nilaiRoe','clsRoe','persentaseBulananRoe','biayaOps','PndptnOps','hasilRop','nilaiRop','clsRop','persentaseRopBulanan','kaStrkas','HutangLancar','hasilRok','nilaiRok','clsRok','persentaseBulananRok','JmlPnrmRekAir','jmlRekAir','hasilEf','nilaiEf','clsEf','persentaseBulananEf','TotalAktiva','TotalHutang','hasilSol','nilaiSol','clsSol','persentaseBulananSol','urutanBulan','VolProdRil','KpstsTrpsng','hasilProd','nilaiProd','clsProd','persentaseBulananProd','KalkulasiJumAirM','JmlAirDistM','nrw','nilaiNrw','clsNrw','persentaseBulananNrw','JmlWktPly','jam','hari','nilaiJam','clsJam','persentaseBulananJam','Plgnlayan','PlgnAktiv','tekanan','nilaiTek','clsTek','persentaseBulananTek','MtrAirGnti','PlgnAktiv','kalibrasi','nilaiKal','clsKal','persentaseBulananKal','urutanBulan','JmlPnddkTrlyni','jmlPndkWil','hasilCkp','nilaiCkp','clsCkp','persentaseBulananCkp','AduanSlsai','JmlAduan','hasilAdu','nilaiAdu','clsAdu','persentaseBulananAdu','JmlAirTrjualDom','JmlPlgnDom','hasilDom','nilaiDom','clsDom','persentaseBulananDom','UjiKualitas','titikUji','hasilQap','nilaiQap','clsQap','persentaseBulananQap','kalKulasiJmlPlgn','JmlPlgnThLl','hasilTbh','nilaiTbh','clsTbh','persentaseBulananTbh','urutanBulan','JmlPgwai','JmlPlgn1000','hasilRpl','nilaiRpl','clsRpl','persentaseBulananRpl','JmlPegDiklat','JmlPgwai','hasilRdp','nilaiRdp','clsRdp','persentaseBulananRdp','RealByDiklat','RealByPeg','hasilRbd','hasilRbd','nilaiRbd','clsRbd','persentaseBulananRbd','urutanBulan','clsRplPie','clsRdpPie','clsRbdPie','tahun'));
    }
}
