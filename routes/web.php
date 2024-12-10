<?php

use App\Http\Controllers\Admin\Pelayanan\PelayananController;
use App\Http\Controllers\Admin\Umum\KeuanganController;
use App\Http\Controllers\Admin\Umum\SdmController;
use App\Http\Controllers\Admin\Umum\UmkesController;
use App\Http\Controllers\Admin\Utama\PpController;
use App\Http\Controllers\Evkin\EvkinController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('dewas', function () {
        return '<h1>DEWAS<h1>';
})->middleware(['auth', 'verified','role:dewas'])->name('dashboard');


Route::get('evkin', [EvkinController::class, 'index']);
Route::get('pelayanan', [PelayananController::class, 'index']);

Route::get('perencanaanPenelitian', [PpController::class, 'index']);
Route::get('umkes', [UmkesController::class, 'index']);
Route::get('sdm', [SdmController::class, 'index']);
Route::get('keuangan', [KeuanganController::class, 'index']);


require __DIR__.'/auth.php';
