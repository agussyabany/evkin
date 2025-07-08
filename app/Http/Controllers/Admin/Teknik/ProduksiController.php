<?php

namespace App\Http\Controllers\Admin\Teknik;

use App\Http\Controllers\Controller;
use App\Models\Evkin\Operasional;
use App\Models\Evkin\Pelayanan;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Operator;
use RealRashid\SweetAlert\Facades\Alert;

class ProduksiController extends Controller
{

    public function  evOP ()
    {
        $tahun = session('tahun');
        $awal = session('bulan_awal');//ini nilainya MM misal 01
        $akhir = session('bulan_akhir');//ini nilainya MM misal 02
        $bulanAwal = $tahun . '-' . $awal;
        $bulanAkhir = $tahun . '-' . $akhir;

        $operasional = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->orderBy('bulanTahun','ASC')->get();
        
        $VolProdRil = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('VolProdRil');
        $KpstsTrpsng = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('KpstsTrpsng');
        $KalkulasiJumAir = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('KalkulasiJumAir');
        $JmlAirDist = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('JmlAirDist');
        $JmlWktPly = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('JmlWktPly');
        $MtrAirGnti = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('MtrAirGnti');
        $hari = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('hari');
        $aduTek = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('nrw');
        $totAdu = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('totAdu');
        $aduPel = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('aduPel');
        $persen = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('persen');
        $airTerjual = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('airTerjual');
        $aduLayan = Pelayanan::select('JmlAduan','bulanTahun')->whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->get();
        
        return view('admin.evkin.evOperasional',compact('operasional','VolProdRil','KpstsTrpsng','KalkulasiJumAir','JmlAirDist','JmlWktPly','MtrAirGnti','hari','aduLayan','aduTek','totAdu','aduPel','persen','airTerjual'));
    }
    public function index ()
    {
        $tahun= session('tahun');
        $operasional = Operasional::orderBy('bulanTahun','ASC')->get();
        

        return view('admin.teknik.produksi',compact('operasional'));
    }
    public function save (Request $request)
    {
        $data = [
            'VolProdRil' => $request->input('VolProdRil'),//
            'KpstsTrpsng' => $request->input('KpstsTrpsng'),//
            'KalkulasiJumAir' => $request->input('KalkulasiJumAir'),//
            'JmlAirDist' => $request->input('JmlAirDist'),//
            'JmlWktPly' => $request->input('JmlWktPly'),
            'hari' => $request->input('hari'),
            'Plgnlayan' => $request->input('Plgnlayan'),
            'PlgnAktiv' => $request->input('PlgnAktiv'),
            'MtrAirGnti' => $request->input('MtrAirGnti'),
            'bulanTahun' => $request->input('date'),
            'aduPel'=> $request->input('aduPel'),
            'airTerjual'=> $request->input('drd'),//
            'persen' => $request->input('persen'),
            'nrw' => $request->input('aduTek'),
            'totAdu' => $request->input('totAdu'),
            'status'=> 0,
            'user' => 1
        ];

        Operasional::create($data);
        Alert::success('Berhasil!', 'Data berhasil disimpan.');
        return redirect('/evOp');
    }

    public function edit (Request $request)
     {
        
        $operasional = Operasional::findOrFail($request->input('idOps'));
        $operasional->update([
            'VolProdRil' => $request->input('VolProdRil'),
            'KpstsTrpsng' => $request->input('KpstsTrpsng'),
            'KalkulasiJumAir' => $request->input('KalkulasiJumAir'),
            'JmlAirDist' => $request->input('JmlAirDist'),
            'JmlWktPly' => $request->input('JmlWktPly'),
            'hari' => $request->input('hari'),
            'Plgnlayan' => $request->input('Plgnlayan'),
            'PlgnAktiv' => $request->input('PlgnAktiv'),
            'MtrAirGnti' => $request->input('MtrAirGnti'),
            'bulanTahun' => $request->input('date'),
            'airTerjual' => $request->input('drd'),
            'KalkulasiJumAir' => $request->input('KalkulasiJumAir'),
            'persen' => $request->input('persen'),
            'nrw' =>$request->input('aduTek'),
            'totAdu' =>$request->input('totAdu'),
            'aduPel' =>$request->input('aduPel')
        ]);

        Alert::success('Berhasil!', 'Data berhasil disimpan.');
        return redirect('/evOp');
     }

     function del ($id) 
     {
         
         $operasional = Operasional::findOrFail($id);
         $operasional->delete();
 
         Alert::success('Berhasil!', 'Data berhasil dihapus.');
        return redirect('/evOp');
     }

    function dataOpBy ($id)
    {
        $operasional = Operasional::where('id',$id)->get();
        return response()->json(['data' => $operasional]);
    }

    public function ver ($id)
    {
        $verOp = Operasional::where('id',$id);
        $verOp->update([
            'status' => 1, 
        ]);
        
        Alert::success('Berhasil!', 'Data berhasil diVerifikasi.');
        return redirect('/evOp');

    }

    public function aduLayan ()
    {
        $tahun= session('tahun');
        $aduLayan = Pelayanan::select('JmlAduan','bulanTahun')->whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->get();

        return response()->json(['data' => $aduLayan]);
    }
}
