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
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Controllers\Dashboard\MobileController;
use App\Http\Controllers\Dashboard\PelayananController as DashboardPelayananController;
use App\Http\Controllers\Dashboard\SdmController as DashboardSdmController;
use App\Http\Controllers\Evkin\EvkinController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','verified','role:sekretaris')->group(function () {
    Route::get('/', function () {
        return redirect('/perencanaanPenelitian');
    });
    Route::get('perencanaanPenelitian', [PpController::class, 'index']);
});
// END

//MAIN DASHBOARD
Route::get('evkin', [EvkinController::class, 'index']);
//



Route::post('ppStore', [PpController::class, 'store']);

Route::get('umkes', [UmkesController::class, 'index']);

Route::get('sdm', [SdmController::class, 'index']);
Route::post('/sdmSave',[SdmController::class, 'save']);
Route::get('/dataSdmBy/{id}',[SdmController::class, 'dataSdmBy']);
Route::post('/sdmEdit',[SdmController::class, 'edit']);
Route::post('verSdm/{id}', [SdmController::class, 'ver']);
Route::post('/delSdm/{id}',[SdmController::class, 'del']);
Route::get('adm', [SdmController::class, 'administrasi']);



Route::get('keuangan', [KeuanganController::class, 'index']);
Route::post('keuSave', [KeuanganController::class, 'create']);
Route::get('/dataKeuBy/{id}',[KeuanganController::class, 'dataKeuBy']);
Route::post('keuUpdate', [KeuanganController::class, 'update']);
Route::post('/delKeu/{id}', [KeuanganController::class, 'destroy']);
Route::post('verKeu/{id}', [KeuanganController::class, 'verifiksi']);

Route::get('distribusi', [DistribusiController::class, 'index']);
Route::get('produksi', [ProduksiController::class, 'index']);
Route::get('perawatan', [PerawatanController::class, 'index']);

Route::post('opSave', [ProduksiController::class, 'save']);
Route::get('/dataOpBy/{id}',[ProduksiController::class, 'dataOpBy']);
Route::post('/opEdit',[ProduksiController::class, 'edit']);
Route::post('/delOps/{id}',[ProduksiController::class, 'del']);
Route::post('verOp/{id}', [ProduksiController::class, 'ver']);


Route::get('kepatuhan', [KepatuhanController::class, 'index']);
Route::get('pelayanan', [PelayananController::class, 'index']);
Route::post('pelSave', [PelayananController::class, 'create']);
Route::get('/dataPelBy/{id}',[PelayananController::class, 'dataPelBy']);
Route::post('/pelEdit',[PelayananController::class, 'edit']);
Route::post('/delPel/{id}',[PelayananController::class, 'del']);
Route::post('/verPel/{id}',[PelayananController::class, 'ver']);

//Mobile
Route::get('/perumdam',[MobileController::class, 'kinerja']);
Route::get('/mKeuangan',[MobileController::class, 'keuangan']);

Route::get('/mOperasional',[MobileController::class, 'operasional']);
Route::get('/rasProd',[MainController::class, 'rasprod']);
Route::get('/nrw',[MainController::class, 'nrw']);
Route::get('/jam',[MainController::class, 'jam']);
Route::get('/tekanan',[MainController::class, 'tekanan']);
Route::get('/kalibrasi',[MainController::class, 'kalibrasi']);


Route::get('/mPelayanan',[MobileController::class, 'pelayanan']);
Route::get('/cakupan',[DashboardPelayananController::class, 'cakupan']);
Route::get('/aduan',[DashboardPelayananController::class, 'aduan']);
Route::get('/domestik',[DashboardPelayananController::class, 'domestik']);
Route::get('/uji',[DashboardPelayananController::class, 'uji']);
Route::get('/tumbuh',[DashboardPelayananController::class, 'tumbuh']);




Route::get('/mSdmkin',[MobileController::class, 'sdm']);
Route::get('/raspegawai',[DashboardSdmController::class, 'raspegawai']);
Route::get('/rasdiklat',[DashboardSdmController::class, 'rasdiklat']);
 Route::get('/rasbiaya',[DashboardSdmController::class, 'rasbiaya']);

Route::get('/mUtama',[MobileController::class, 'utama']);



require __DIR__.'/auth.php';
