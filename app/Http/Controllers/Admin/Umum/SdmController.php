<?php

namespace App\Http\Controllers\Admin\Umum;

use App\Http\Controllers\Controller;
use App\Models\Evkin\Sdm;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SdmController extends Controller
{
    public function evSdm ()
    {
        $tahun = session('tahun');
        $awal = session('bulan_awal');//ini nilainya MM misal 01
        $akhir = session('bulan_akhir');//ini nilainya MM misal 02
        $bulanAwal = $tahun . '-' . $awal;
        $bulanAkhir = $tahun . '-' . $akhir;

        $sdm = Sdm::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->orderBy('bulanTahun','ASC')->get();
        $JmlPegDiklat = Sdm::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('JmlPegDiklat');
        $RealByDiklat = Sdm::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('RealByDiklat');
        $RealByPeg = Sdm::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->whereBetween('bulanTahun', [$bulanAwal, $bulanAkhir])->sum('RealByPeg');
        return view('admin.evkin.evSdm',compact('sdm','JmlPegDiklat','RealByDiklat','RealByPeg'));
    }
    public function index ()
    {
        $sdm = Sdm::orderBy('bulanTahun','ASC')->get();
        return view('admin.umum.sdm',compact('sdm'));
    }

    public function administrasi ()
    {
        return view('admin.umum.administrasi');
    }

    public function save (Request $request)
    {
        $data = [
            'JmlPgwai' => $request->input('JmlPgwai'),
            'JmlPlgn1000' => $request->input('JmlPlgn1000'),
            'JmlPegDiklat' => $request->input('JmlPegDiklat'),
            'RealByDiklat' => $request->input('RealByDiklat'),
            'RealByPeg' => $request->input('RealByPeg'),
            'bulanTahun' => $request->input('date'),
            'status' => 0,
            'user' => 1 
        ];

        Sdm::create($data);

        Alert::success('Berhasil!', 'Data berhasil diVerifikasi.');
        return redirect('/evSdm');

            
    }

    public function edit (Request $request)
    {
       

        $sdm = Sdm::findOrFail($request->input('idSdm'));
        // Menyimpan data ke database (sesuaikan dengan model dan tabel Anda)
        $sdm->update([
            'JmlPgwai' => $request->input('JmlPgwai'),
            'JmlPlgn1000' => $request->input('JmlPlgn1000'),
            'JmlPegDiklat' => $request->input('JmlPegDiklat'),
            'RealByDiklat' => $request->input('RealByDiklat'),
            'RealByPeg' => $request->input('RealByPeg'),
            'bulanTahun' => $request->input('date'),
            'status'=> 0,
            'user'=>1
        ]);

        Alert::success('Berhasil!', 'Data berhasil diVerifikasi.');
        return redirect('/evSdm');

            
    }

    public function ver ($id)
    {
        $verSdm = Sdm::where('id',$id);
        $verSdm->update([
            'status' => 1, 
        ]);
        
        Alert::success('Berhasil!', 'Data berhasil diVerifikasi.');
        return redirect('/evSdm');
    }

    function del ($id) 
     {
         // Mencari data keuangan berdasarkan ID
         $sdm = Sdm::findOrFail($id);
         
         // Menghapus data keuangan
         $sdm->delete();
 
         Alert::success('Berhasil!', 'Data berhasil diHapus.');
        return redirect('/evSdm');
     }

    function dataSdmBy ($id)
    {
        $sdm = sdm::where('id',$id)->get();
        return response()->json(['data' => $sdm]);
    }
    
}
