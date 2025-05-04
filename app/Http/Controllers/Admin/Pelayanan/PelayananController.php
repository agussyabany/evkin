<?php

namespace App\Http\Controllers\Admin\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Evkin\Pelayanan;
use App\Models\Pelayanan\Hublang\Akurasi;
use App\Models\Pelayanan\Hublang\Rekening;
use App\Models\Pelayanan\Hublang\Upw;
use App\Models\Umum\Umkes\Humas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PelayananController extends Controller
{
    public function evPel ()
    {
        $tahun = session('tahun');
        $pelayanan = Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->orderBy('bulanTahun','ASC')->get();
        $AduanSlsai = Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('AduanSlsai');
        $JmlAduan = Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('JmlAduan');
        $UjiKualitas = Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('UjiKualitas');
        $titikUji = Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('titikUji');
        $JmlAirTrjualDom = Pelayanan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('JmlAirTrjualDom');
        return view('admin.evkin.evPelayanan',compact('pelayanan','AduanSlsai','JmlAduan','UjiKualitas','titikUji','JmlAirTrjualDom'));
    }
    public function index ()
    {
        $pelayanan = Pelayanan::orderBy('bulanTahun','ASC')->get();
        return view('admin.pelayanan.hublang',compact('pelayanan'));
    }

    public function create (Request $request)
    {
        $data = [
            'JmlPnddkTrlyni' => $request->input('JmlPnddkTrlyni'),
            'jmlPndkWil' => $request->input('jmlPndkWil'),
            'kalKulasiJmlPlgn' => $request->input('kalKulasiJmlPlgn'),
            'JmlPlgnThLl' => $request->input('JmlPlgnThLl'),
            'AduanSlsai' => $request->input('AduanSlsai'),
            'JmlAduan' => $request->input('JmlAduan'),
            'UjiKualitas' => $request->input('UjiKualitas'),
            'titikUji' => $request->input('titikUji'),
            'JmlAirTrjualDom' => $request->input('JmlAirTrjualDom'),
            'JmlPlgnDom' => $request->input('JmlPlgnDom'),
            'bulanTahun' => $request->input('date'),
            'status' => 0,
            'user' => 1
        ];

        Pelayanan::create($data);

        Alert::success('Berhasil!', 'Data berhasil disimpan.');
        return redirect('/evPel');
    }
    public function edit (Request $request)
    {
        

        $pelayanan = Pelayanan::findOrFail($request->input('idPel'));
        $pelayanan->update([
            'JmlPnddkTrlyni' => $request->input('JmlPnddkTrlyni'),
            'jmlPndkWil' => $request->input('jmlPndkWil'),
            'kalKulasiJmlPlgn' => $request->input('kalKulasiJmlPlgn'),
            'JmlPlgnThLl' => $request->input('JmlPlgnThLl'),
            'AduanSlsai' => $request->input('AduanSlsai'),
            'JmlAduan' => $request->input('JmlAduan'),
            'UjiKualitas' => $request->input('UjiKualitas'),
            'titikUji' => $request->input('titikUji'),
            'JmlAirTrjualDom' => $request->input('JmlAirTrjualDom'),
            'JmlPlgnDom' => $request->input('JmlPlgnDom'),
            'bulanTahun' => $request->input('date')
        ]);
        Alert::success('Berhasil!', 'Data berhasil disimpan.');
        return redirect('/evPel');

            
    }

    function del ($id) 
     {
         // Mencari data keuangan berdasarkan ID
         $pelayanan = Pelayanan::findOrFail($id);
         
         // Menghapus data keuangan
         $pelayanan->delete();
 
         Alert::success('Berhasil!', 'Data berhasil dihapus.');
        return redirect('/evPel');
     }

     function ver ($id)
     {
        $verPel = Pelayanan::where('id',$id);
        $verPel->update([
            'status' => 1, 
        ]);
        
        Alert::success('Berhasil!', 'Data berhasil diVerifikasi.');
        return redirect('/evPel');
     }


    function dataPelBy ($id)
    {
        $pelayanan = Pelayanan::where('id',$id)->get();
        return response()->json(['data' => $pelayanan]);
    }
}
