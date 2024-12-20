<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Evkin\Keuangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Laravel\Prompts\Key;

class KeuController extends Controller
{
    public function roe()
    {
        // Check cache
        $cacheKey = 'roe_data_' . Carbon::now()->year;
        $roeData = Cache::remember($cacheKey, 60, function() {
            $labaStlPjk = Keuangan::sum('labaStlPjk');
            $jmlEkuitas = Keuangan::orderBy('bulanTahun', 'DESC')->value('jmlEkuitas');
            $hitungRoe = $jmlEkuitas > 0 ? ($labaStlPjk / $jmlEkuitas) * 100 : 0;
            $hasilRoe = round($hitungRoe, 2);

            if ($hasilRoe <= 10) {
                $nilai = 0;
                $cls = 'bg-danger';
            } elseif ($hasilRoe > 0 && $hasilRoe <= 3) {
                $nilai = 2;
                $cls = 'bg-warning';
            } elseif ($hasilRoe > 3 && $hasilRoe <= 7) {
                $nilai = 3;
                $cls = 'bg-primary';
            } elseif ($hasilRoe > 7 && $hasilRoe <= 10) {
                $nilai = 4;
                $cls = 'bg-primary';
            } else {
                $nilai = 5;
                $cls = 'bg-success';
            }

            $tahun = Carbon::now()->year;
            $persentaseBulanan = [];

            for ($bulan = 1; $bulan <= 12; $bulan++) {
                $bulanFormatted = str_pad($bulan, 2, '0', STR_PAD_LEFT);
                $labaStlPjkG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('labaStlPjk') ?? 0;
                $jmlEkuitasG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('jmlEkuitas') ?? 0;

                if ($jmlEkuitasG > 0) {
                    $persentase = ($labaStlPjkG / $jmlEkuitasG) * 100;
                } else {
                    $persentase = 0;
                }

                $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
            }

            return [
                'labaStlPjk' => intval($labaStlPjk),
                'jmlEkuitas' => intval($jmlEkuitas),
                'hasilRoe' => intval($hasilRoe),
                'nilaiRoe' => $nilai,
                'cls' => $cls,
                'persentaseBulanan' => $persentaseBulanan
            ];
        });

        return response()->json($roeData);
    }

    public function rop()
    {
        // Check cache
        $cacheKey = 'rop_data_' . Carbon::now()->year;
        $ropData = Cache::remember($cacheKey, 60, function() {
            $biayaOps = Keuangan::sum('biayaOps');
            $PndptnOps = Keuangan::sum('PndptnOps');
            $hitungRop = $PndptnOps > 0 ? ($biayaOps / $PndptnOps) : 0;
            $hasilRop = round($hitungRop, 2);

            if ($hasilRop > 1) {
                $nilai = 1;
                $cls = 'bg-danger';
            } elseif ($hasilRop > 0.85 && $hasilRop <= 1) {
                $nilai = 2;
                $cls = 'bg-warning';
            } elseif ($hasilRop > 0.65 && $hasilRop <= 0.85) {
                $nilai = 3;
                $cls = 'bg-primary';
            } elseif ($hasilRop > 0.50 && $hasilRop <= 0.65) {
                $nilai = 4;
                $cls = 'bg-primary';
            } else {
                $nilai = 5;
                $cls = 'bg-success';
            }

            $tahun = Carbon::now()->year;
            $persentaseBulanan = [];

            for ($bulan = 1; $bulan <= 12; $bulan++) {
                $bulanFormatted = str_pad($bulan, 2, '0', STR_PAD_LEFT);
                $biayaOpsG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('biayaOps') ?? 0;
                $PndptnOpsG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('PndptnOps') ?? 0;

                if ($PndptnOpsG > 0) {
                    $persentase = ($biayaOpsG / $PndptnOpsG);
                } else {
                    $persentase = 0;
                }

                $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
            }

            return [
                'biayaOps' => intval($biayaOps),
                'PndptnOps' => intval($PndptnOps),
                'hasilRop' => $hasilRop,
                'nilaiRop' => $nilai,
                'cls' => $cls,
                'persentaseBulanan' => $persentaseBulanan
            ];
        });

        return response()->json($ropData);
    }

    public function rok()
    {
        // Check cache
        $cacheKey = 'rok_data_' . Carbon::now()->year;
        $rokData = Cache::remember($cacheKey, 60, function() {
            $kaStrkas = Keuangan::orderBy('bulanTahun', 'DESC')->value('kaStrkas');
            $HutangLancar = Keuangan::orderBy('bulanTahun', 'DESC')->value('HutangLancar');
            $hitungRok = $HutangLancar > 0 ? ($kaStrkas / $HutangLancar) * 100 : 0;
            $hasilRok = round($hitungRok, 2);

            if ($hasilRok >= 408.16) {
                $nilai = 5;
                $cls = 'bg-success';
            } elseif ($hasilRok >= 306.12 && $hasilRok < 408.16) {
                $nilai = 4;
                $cls = 'bg-primary';
            } elseif ($hasilRok >= 204.08 && $hasilRok < 306.12) {
                $nilai = 3;
                $cls = 'bg-warning';
            } elseif ($hasilRok >= 102.04 && $hasilRok < 204.08) {
                $nilai = 2;
                $cls = 'bg-danger';
            } else {
                $nilai = 1;
                $cls = 'bg-dark';
            }

            $tahun = Carbon::now()->year;
            $persentaseBulanan = [];

            for ($bulan = 1; $bulan <= 12; $bulan++) {
                $bulanFormatted = str_pad($bulan, 2, '0', STR_PAD_LEFT);
                $kaStrkasG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('kaStrkas') ?? 0;
                $HutangLancarG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('HutangLancar') ?? 0;

                if ($HutangLancarG > 0) {
                    $persentase = ($kaStrkasG / $HutangLancarG) * 100;
                } else {
                    $persentase = 0;
                }

                $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
            }

            return [
                'kaStrkas' => intval($kaStrkas),
                'HutangLancar' => intval($HutangLancar),
                'hasilRok' => $hasilRok,
                'nilaiRok' => $nilai,
                'cls' => $cls,
                'persentaseBulanan' => $persentaseBulanan
            ];
        });

        return response()->json($rokData);
    }

    public function efek()
    {
        // Check cache
        $cacheKey = 'efek_data_' . Carbon::now()->year;
        $efekData = Cache::remember($cacheKey, 60, function() {
            $JmlPnrmRekAir = Keuangan::sum('JmlPnrmRekAir');
            $jmlRekAir = Keuangan::sum('jmlRekAir');
            $hitungEf = $jmlRekAir > 0 ? ($JmlPnrmRekAir / $jmlRekAir) * 100 : 0;
            $hasilEf = round($hitungEf, 2);

            if ($hasilEf >= 90) {
                $nilai = 5;
                $cls = 'bg-success';
            } elseif ($hasilEf >= 80 && $hasilEf < 90) {
                $nilai = 4;
                $cls = 'bg-primary';
            } elseif ($hasilEf >= 70 && $hasilEf < 80) {
                $nilai = 3;
                $cls = 'bg-warning';
            } elseif ($hasilEf >= 60 && $hasilEf < 70) {
                $nilai = 2;
                $cls = 'bg-danger';
            } else {
                $nilai = 1;
                $cls = 'bg-danger';
            }

            $tahun = Carbon::now()->year;
            $persentaseBulanan = [];

            for ($bulan = 1; $bulan <= 12; $bulan++) {
                $bulanFormatted = str_pad($bulan, 2, '0', STR_PAD_LEFT);
                $JmlPnrmRekAirG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('JmlPnrmRekAir') ?? 0;
                $jmlRekAirG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('jmlRekAir') ?? 0;

                if ($jmlRekAirG > 0) {
                    $persentase = ($JmlPnrmRekAirG / $jmlRekAirG) * 100;
                } else {
                    $persentase = 0;
                }

                $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
            }

            return [
                'JmlPnrmRekAir' => intval($JmlPnrmRekAir),
                'jmlRekAir' => intval($jmlRekAir),
                'hasilEf' => $hasilEf,
                'nilaiEf' => $nilai,
                'cls' => $cls,
                'persentaseBulanan' => $persentaseBulanan
            ];
        });

        return response()->json($efekData);
    }

    public function sol()
    {
        // Check cache
        $cacheKey = 'sol_data_' . Carbon::now()->year;
        $solData = Cache::remember($cacheKey, 60, function() {
            $TotalAktiva = Keuangan::orderBy('bulanTahun', 'DESC')->value('TotalAktiva');
            $TotalHutang = Keuangan::orderBy('bulanTahun', 'DESC')->value('TotalHutang');
            $hitungSol = $TotalHutang > 0 ? ($TotalAktiva / $TotalHutang) * 100 : 0;
            $hasilSol = round($hitungSol, 2);

            if ($hasilSol >= 1186.24) {
                $nilai = 5;
                $cls = 'bg-success';
            } elseif ($hasilSol >= 889.68 && $hasilSol < 1186.24) {
                $nilai = 4;
                $cls = 'bg-primary';
            } elseif ($hasilSol >= 593.12 && $hasilSol < 889.68) {
                $nilai = 3;
                $cls = 'bg-warning';
            } elseif ($hasilSol >= 296.56 && $hasilSol < 593.12) {
                $nilai = 2;
                $cls = 'bg-danger';
            } else {
                $nilai = 1;
                $cls = 'bg-dark';
            }

            $tahun = Carbon::now()->year;
            $persentaseBulanan = [];

            for ($bulan = 1; $bulan <= 12; $bulan++) {
                $bulanFormatted = str_pad($bulan, 2, '0', STR_PAD_LEFT);
                $TotalAktivaG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('TotalAktiva') ?? 0;
                $TotalHutangG = Keuangan::where('bulanTahun', $tahun . '-' . $bulanFormatted)->value('TotalHutang') ?? 0;

                if ($TotalHutangG > 0) {
                    $persentase = ($TotalAktivaG / $TotalHutangG) * 100;
                } else {
                    $persentase = 0;
                }

                $persentaseBulanan[$bulanFormatted] = round($persentase, 2);
            }

            return [
                'TotalAktiva' => intval($TotalAktiva),
                'TotalHutang' => intval($TotalHutang),
                'hasilSol' => $hasilSol,
                'nilaiSol' => $nilai,
                'cls' => $cls,
                'persentaseBulanan' => $persentaseBulanan
            ];
        });

        return response()->json($solData);
    }
}
