<?php

namespace App\Http\Controllers\Admin\Utama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PpController extends Controller
{
    public function index ()
    {

        $startYear = 2024;
        $endYear = 2024;

        // Panggil fungsi helper
        $bulan = generateMonths($startYear, $endYear);
        return view ('admin.utama.pp',compact('bulan'));
    }
}
