<?php

use App\Http\Controllers\Admin\Pelayanan\KepatuhanController;
use App\Http\Controllers\Admin\Pelayanan\PelayananController;
use App\Http\Controllers\Admin\Teknik\DistribusiController;
use App\Http\Controllers\Admin\Teknik\PerawatanController;
use App\Http\Controllers\Admin\Teknik\ProduksiController;
use App\Http\Controllers\Admin\Umum\KeuanganController;
use App\Http\Controllers\Admin\Umum\SdmController;
use App\Http\Controllers\Admin\Umum\UmkesController;
use App\Http\Controllers\Admin\Utama\PpController;
use App\Http\Controllers\Dashboard\KeuController;
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Controllers\Dashboard\MobileController;
use App\Http\Controllers\Dashboard\PelayananController as DashboardPelayananController;
use App\Http\Controllers\Dashboard\SdmController as DashboardSdmController;
use App\Http\Controllers\Evkin\EvkinController;
use App\Http\Controllers\Gudang\Gudangcontroller;
use App\Http\Controllers\Gudang\GudangMasukController;
use App\Http\Controllers\Gudang\LaporanMasukController;
use App\Http\Controllers\Ipa\IpaController;
use App\Http\Controllers\Ipa\Kimia\ApprovalController;
use App\Http\Controllers\Ipa\Kimia\PermintaanController;
use App\Http\Controllers\Ipa\KimiaIpaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Evkin\Pelayanan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

    // Route::middleware('auth')->group(function () {
    //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // });

Route::middleware('auth','verified','role:de-was|dirut|dirpel|dirtek|agus|adminUmum|adminTeknik|adminLayan|adminUtama|spi')->group( function () {

            Route::get('/perumdam',[MobileController::class, 'kinerja']);//HOME

                        //Aspek Keungan
            Route::get('/mKeuangan',[MobileController::class, 'keuangan']);
            Route::get('/roe',[KeuController::class, 'roe']);
            Route::get('/rop',[KeuController::class, 'rop']);
            Route::get('/rok',[KeuController::class, 'rok']);
            Route::get('/sol',[KeuController::class, 'sol']);
            Route::get('/ef',[KeuController::class, 'efek']);

                    //Aspek Operasional
            Route::get('/mOperasional',[MobileController::class, 'operasional']);
            Route::get('/rasProd',[MainController::class, 'rasprod']);
            Route::get('/nrw',[MainController::class, 'nrw']);
            Route::get('/jam',[MainController::class, 'jam']);
            Route::get('/tekanan',[MainController::class, 'tekanan']);
            Route::get('/kalibrasi',[MainController::class, 'kalibrasi']);
                    
                        //Aspek Pelayanan
            Route::get('/mPelayanan',[MobileController::class, 'pelayanan']);
            Route::get('/cakupan',[DashboardPelayananController::class, 'cakupan']);
            Route::get('/aduan',[DashboardPelayananController::class, 'aduan']);
            Route::get('/domestik',[DashboardPelayananController::class, 'domestik']);
            Route::get('/uji',[DashboardPelayananController::class, 'uji']);
            Route::get('/tumbuh',[DashboardPelayananController::class, 'tumbuh']);
                    
                        //Aspek SDM
            Route::get('/mSdmkin',[MobileController::class, 'sdm']);
            Route::get('/raspegawai',[DashboardSdmController::class, 'raspegawai']);
            Route::get('/rasdiklat',[DashboardSdmController::class, 'rasdiklat']);
            Route::get('/rasbiaya',[DashboardSdmController::class, 'rasbiaya']);
            //Route::get('/mUtama',[MobileController::class, 'utama']);


            Route::get('evkeu', [KeuanganController::class, 'evkeu']);
            Route::get('keuangan', [KeuanganController::class, 'index']);
            Route::get('evSdm', [SdmController::class, 'evSdm']);
            Route::get('sdm', [SdmController::class, 'index']);
            Route::get('evOp', [ProduksiController::class, 'evOp']);
            Route::get('evPel', [PelayananController::class, 'evPel']);
            Route::get('pelayanan', [PelayananController::class, 'index']);
            Route::get('evkin', [EvkinController::class, 'index']);
            Route::get('perencanaanPenelitian', [PpController::class, 'index']);
            
            Route::get('umkes', [UmkesController::class, 'index']);
            Route::get('adm', [SdmController::class, 'administrasi']);
            Route::get('distribusi', [DistribusiController::class, 'index']);
            Route::get('produksi', [ProduksiController::class, 'index']);
            Route::get('perawatan', [PerawatanController::class, 'index']);
            Route::get('kepatuhan', [KepatuhanController::class, 'index']);

});

Route::middleware('auth','verified','role:de-was|dirut|dirpel|dirtek|agus|spi')->group(function () {
    Route::get('/', function () {
        return redirect('/perumdam');
    });
});

Route::middleware('auth','verified','role:adminUtama|agus|spi')->group(function () {
    Route::get('/', function () {
        return redirect('/perumdam');
    });
    Route::post('ppStore', [PpController::class, 'store']); 
});

Route::middleware('auth','verified','role:adminUmum|agus|spi')->group(function () {
    Route::get('/', function () {
        return redirect('/umkes');
    });

     //Aspek Keuangan

Route::post('keuSave', [KeuanganController::class, 'create']);
Route::get('/dataKeuBy/{id}',[KeuanganController::class, 'dataKeuBy']);
Route::post('keuUpdate', [KeuanganController::class, 'update']);
Route::post('/delKeu/{id}', [KeuanganController::class, 'destroy']);


 //Aspek SDM
 
 Route::post('/sdmSave',[SdmController::class, 'save']);
 Route::get('/dataSdmBy/{id}',[SdmController::class, 'dataSdmBy']);
 Route::post('/sdmEdit',[SdmController::class, 'edit']);
 
 Route::post('/delSdm/{id}',[SdmController::class, 'del']);
 
    
});

Route::middleware('auth','verified','role:adminTeknik|agus|spi')->group(function () {
    Route::get('/', function () {
        return redirect('/produksi');
    });
     //Aspek Operasional

Route::post('opSave', [ProduksiController::class, 'save']);
Route::get('/dataOpBy/{id}',[ProduksiController::class, 'dataOpBy']);
Route::post('/opEdit',[ProduksiController::class, 'edit']);
Route::post('/delOps/{id}',[ProduksiController::class, 'del']);
Route::get('aduLayan',[ProduksiController::class,'aduLayan']);

});

Route::middleware('auth','verified','role:adminLayan|agus|spi')->group(function () {
    Route::get('/', function () {
        return redirect('/pelayanan');
    });

     //Aspek Pelayanan

Route::post('pelSave', [PelayananController::class, 'create']);
Route::get('/dataPelBy/{id}',[PelayananController::class, 'dataPelBy']);
Route::post('/pelEdit',[PelayananController::class, 'edit']);
Route::post('/delPel/{id}',[PelayananController::class, 'del']);
Route::get('/lalu',[PelayananController::class, 'lalu']);

    
});

Route::middleware('auth','verified','role:spi|agus')->group(function () {
    Route::get('/', function () {
        return redirect('/evkin');
    });

    Route::post('verSdm/{id}', [SdmController::class, 'ver']);
    Route::post('verOp/{id}', [ProduksiController::class, 'ver']);
    Route::post('/verPel/{id}',[PelayananController::class, 'ver']);
    Route::post('verKeu/{id}', [KeuanganController::class, 'verifiksi']);
    
});

Route::middleware('auth','verified','role:agus')->group(function () {
    Route::get('/', function () {
        return redirect('/evkin');
    });
    Route::get('guna', [UserController::class, 'index'])->name('guna');
    Route::post('save', [UserController::class, 'store']);
});

Route::middleware('auth','verified','role:ipa|agus|gudang')->group(function () {
    Route::get('/ipa', function () {
        return redirect('/dataIpa');
    });
    Route::get('dataIpa', [IpaController::class, 'index']);
    //Route::post('save', [IpaController::class, 'store']);
    Route::get('kimiaIpa', [KimiaIpaController::class, 'index']);

    Route::get('/stok', [PermintaanController::class, 'index']);
    Route::post('/permintaan/cart/add', [PermintaanController::class, 'addCart']);
    Route::put('/permintaan/cart/update', [PermintaanController::class, 'updateCart']);
    Route::delete('/permintaan/cart/delete', [PermintaanController::class, 'deleteCart']);
    Route::get('/permintaan/draft', [PermintaanController::class, 'getDraft']);

    Route::delete('/permintaan/draft/{id}', [PermintaanController::class, 'destroyDraft']);


    // submit permintaan
    Route::post('/permintaan/submit', [PermintaanController::class, 'submit']);

    Route::get('/dataMinta', [ApprovalController::class, 'index']);
    Route::get('/permintaan/detail/{id}',[ApprovalController::class, 'detail']);

    Route::post('/permintaan/{id}/approve',[ApprovalController::class, 'approve'])->middleware(['auth']);

    Route::post('/permintaan/{id}/kirim', [PermintaanController::class, 'kirim']);

    Route::get('/permintaan/{id}/surat-jalan',[PermintaanController::class, 'suratJalan'])->name('permintaan.suratjalan');




});


Route::middleware('auth','verified','role:agus|gudang')->group(function () {
    Route::get('/', function () {
        return redirect('/gudang');
    });
    Route::get('gudang', [Gudangcontroller::class, 'index']);
    Route::post('/gudang-masuk/add-item', [GudangMasukController::class, 'addItem']);
    Route::delete('/gudang-masuk/item/{id}', [GudangMasukController::class, 'deleteItem']);
    Route::post('/gudang-masuk/final/{id}', [GudangMasukController::class, 'finalisasi']);
    Route::get('/gudang-masuk/no-transaksi', [GudangMasukController::class, 'noTransaksi']);
    Route::delete('/gudang-masuk/cancel/{id}', [GudangMasukController::class, 'cancel']);

    Route::get('masuk', [LaporanMasukController::class, 'index']);
    Route::get('/gudang-masuk/detail/{id}',[LaporanMasukController::class, 'detail']);
});






require __DIR__.'/auth.php';
