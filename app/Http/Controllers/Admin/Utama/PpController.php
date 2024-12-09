<?php

namespace App\Http\Controllers\Admin\Utama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PpController extends Controller
{
    public function index ()
    {
        return view ('admin.utama.pp');
    }
}
