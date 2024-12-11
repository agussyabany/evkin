<?php

namespace App\Http\Controllers\Admin\Teknik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistribusiController extends Controller
{
    public function index ()
    {
        $startYear = 2024;
        $endYear = 2024;

        // Panggil fungsi helper
    $bulan = generateMonths($startYear, $endYear);
    return view('admin.teknik.distribusi',compact('bulan'));
    }
}