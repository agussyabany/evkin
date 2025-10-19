<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function getReport(Request $request)
{
     $now = Carbon::now();

        $bulanAwal = $request->input('bulan_awal') ?? 1;
        $bulanAkhir = $request->input('bulan_akhir') ?? $now->month;
        $tahun = $request->input('tahun') ?? $now->year;

        // Ambil data group by bulanTahun, sum dua kolom sekaligus
        $rawData = DB::table('kin_sdm')
            ->select(
                'bulanTahun',
                DB::raw('SUM("JmlPegDiklat") as total_diklat'),
                DB::raw('SUM("JmlPgwai") as total_peg')
            )
            ->whereRaw("substring(\"bulanTahun\", 1, 4) = ?", [$tahun])
            ->whereRaw("CAST(substring(\"bulanTahun\", 6, 2) AS INTEGER) BETWEEN ? AND ?", [$bulanAwal, $bulanAkhir])
            ->groupBy('bulanTahun')
            ->orderBy('bulanTahun')
            ->get()
            ->keyBy('bulanTahun');

        // Susun filler bulan
        $result = [];
        for ($i = $bulanAwal; $i <= $bulanAkhir; $i++) {
            $bulanTahun = sprintf('%04d-%02d', $tahun, $i);
            $result[] = [
                'bulanTahun' => $bulanTahun,
                'total_diklat' => isset($rawData[$bulanTahun]) ? (int) $rawData[$bulanTahun]->total_diklat : 0,
                'total_peg' => isset($rawData[$bulanTahun]) ? (int) $rawData[$bulanTahun]->total_peg : 0
            ];
        }

        return response()->json($result);
}

public function getRasioDiklat(Request $request)
{
     $now = Carbon::now();

        $bulanAwal = $request->input('bulan_awal') ?? 1;
        $bulanAkhir = $request->input('bulan_akhir') ?? $now->month;
        $tahun = $request->input('tahun') ?? $now->year;

        // Ambil data group by bulanTahun, sum dua kolom sekaligus
        $rawData = DB::table('kin_sdm')
            ->select(
                'bulanTahun',
                DB::raw('SUM("JmlPegDiklat") as total_diklat'),
                DB::raw('SUM("JmlPgwai") as total_peg')
            )
            ->whereRaw("substring(\"bulanTahun\", 1, 4) = ?", [$tahun])
            ->whereRaw("CAST(substring(\"bulanTahun\", 6, 2) AS INTEGER) BETWEEN ? AND ?", [$bulanAwal, $bulanAkhir])
            ->groupBy('bulanTahun')
            ->orderBy('bulanTahun')
            ->get()
            ->keyBy('bulanTahun');

        // Susun filler bulan
        $result = [];
        for ($i = $bulanAwal; $i <= $bulanAkhir; $i++) {
            $bulanTahun = sprintf('%04d-%02d', $tahun, $i);
            $result[] = [
                'bulanTahun' => $bulanTahun,
                'total_diklat' => isset($rawData[$bulanTahun]) ? (int) $rawData[$bulanTahun]->total_diklat : 0,
                'total_peg' => isset($rawData[$bulanTahun]) ? (int) $rawData[$bulanTahun]->total_peg : 0
            ];
        }

        return response()->json($result);
}

}
