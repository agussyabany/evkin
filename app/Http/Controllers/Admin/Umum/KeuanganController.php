<?php

namespace App\Http\Controllers\Admin\Umum;

use App\Http\Controllers\Controller;
use App\Models\Evkin\Keuangan;
use App\Models\Pelayanan\Hublang\Akurasi;
use App\Models\Pelayanan\Hublang\Rekening;
use App\Models\Umum\Keuangan\Akutansi;
use App\Models\Umum\Keuangan\Perencanakeu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KeuanganController extends Controller
{

    public function evkeu ()
    {
        $tahun = session('tahun');
        $keuangan = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->orderBy('bulanTahun','ASC')->get();
        $labaStlPjk = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('labaStlPjk');
        $biayaOps = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('biayaOps');
        $PndptnOps = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('PndptnOps');
        $JmlPnrmRekAir = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('JmlPnrmRekAir');
        $jmlRekAir = Keuangan::whereRaw('SUBSTRING("bulanTahun", 1, 4) = ?', [$tahun])->sum('jmlRekAir');    
        return view('admin.evkin.evKeuangan',compact('keuangan','labaStlPjk','biayaOps','PndptnOps','JmlPnrmRekAir','jmlRekAir'));
    }

    public function index ()
    {

        $keuangan = Keuangan::orderBy('bulanTahun','ASC')->get();
        
        return view('admin.umum.keu',compact('keuangan'));
    }

    public function create (Request $request)
    {

        $data = [
            'labaStlPjk' => $request->input('labaStlPjk'),
            'jmlEkuitas' => $request->input('jmlEkuitas'),
            'biayaOps' => $request->input('biayaOps'),
            'PndptnOps' => $request->input('PndptnOps'),
            'kaStrkas' => $request->input('kaStrkas'),
            'HutangLancar' => $request->input('HutangLancar'),
            'JmlPnrmRekAir' => $request->input('JmlPnrmRekAir'),
            'jmlRekAir' => $request->input('jmlRekAir'),
            'TotalAktiva' => $request->input('TotalAktiva'),
            'TotalHutang' => $request->input('TotalHutang'),
            'bulanTahun' => $request->input('date'),
            'status' => 0,
            'user' => 1
        ];

        Keuangan::create($data);

        Alert::success('Berhasil!', 'Data berhasil disimpan.');
        return redirect('/evkeu');
    }

    public function update (Request $request)
    {
            // Mengambil data berdasarkan ID
    $keuangan = Keuangan::findOrFail($request->input('idKeu'));
    
    // Mengupdate data dengan input yang diterima
    $keuangan->update([
        'labaStlPjk' => $request->input('labaStlPjk'),
        'jmlEkuitas' => $request->input('jmlEkuitas'),
        'biayaOps' => $request->input('biayaOps'),
        'PndptnOps' => $request->input('PndptnOps'),
        'kaStrkas' => $request->input('kaStrkas'),
        'HutangLancar' => $request->input('HutangLancar'),
        'JmlPnrmRekAir' => $request->input('JmlPnrmRekAir'),
        'jmlRekAir' => $request->input('jmlRekAir'),
        'TotalAktiva' => $request->input('TotalAktiva'),
        'TotalHutang' => $request->input('TotalHutang'),
        'bulanTahun' => $request->input('date'),
    ]);

        Alert::success('Berhasil!', 'Data berhasil diupdate.');
        return redirect('/evkeu');
    }

    public function destroy ($id)
    {
       
        $keuangan = Keuangan::findOrFail($id);
        $keuangan->delete();
        
        Alert::success('Berhasil!', 'Data berhasil diHapus.');
        return
        redirect('/evkeu');
    }

    public function verifiksi ($id)
    {
        $verKeu = Keuangan::where('id',$id);
        $verKeu->update([
            'status' => 1, 
        ]);
        
        Alert::success('Berhasil!', 'Data berhasil diVerifikasi.');
        return redirect('/evkeu');
    }

    function dataKeuBy ($id)
    {
        $keuangan = Keuangan::where('id',$id)->get();
        return response()->json(['data' => $keuangan]);
    }


}