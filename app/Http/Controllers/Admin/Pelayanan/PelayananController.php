<?php

namespace App\Http\Controllers\Admin\Pelayanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    public function index ()
    {
        return view('admin.pelayanan.pelayanan');
    }
}
