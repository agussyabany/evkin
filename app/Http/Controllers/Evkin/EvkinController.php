<?php

namespace App\Http\Controllers\Evkin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EvkinController extends Controller
{
    public function index ()
    {
        return view('main.index');
    }
}
