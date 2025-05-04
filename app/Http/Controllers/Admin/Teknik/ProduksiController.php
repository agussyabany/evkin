<?php

namespace App\Http\Controllers\Admin\Teknik;

use App\Http\Controllers\Controller;
use App\Models\Evkin\Operasional;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Operator;
use RealRashid\SweetAlert\Facades\Alert;

class ProduksiController extends Controller
{

    public function  evOP ()
    {
        $tahun = session('tahun');
        $operasional = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->orderBy('bulanTahun','ASC')->get();
        $VolProdRil = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('VolProdRil');
        $KpstsTrpsng = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('KpstsTrpsng');
        $KalkulasiJumAir = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('KalkulasiJumAir');
        $JmlAirDist = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('JmlAirDist');
        $JmlWktPly = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('JmlWktPly');
        $MtrAirGnti = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('MtrAirGnti');
        $hari = Operasional::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('hari');
        return view('admin.evkin.evOperasional',compact('operasional','VolProdRil','KpstsTrpsng','KalkulasiJumAir','JmlAirDist','JmlWktPly','MtrAirGnti','hari'));
    }
    public function index ()
    {
        $operasional = Operasional::orderBy('bulanTahun','ASC')->get();

        return view('admin.teknik.produksi',compact('operasional'));
    }
    public function save (Request $request)
    {
        $data = [
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
            'bulanTahun' => $request->input('date')
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
}
