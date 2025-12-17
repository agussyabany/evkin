<?php

namespace App\Http\Controllers\Ipa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IpaController extends Controller
{
    public function index()
    {
        return view('ipa.monitor');
    }

    public function store(Request $request)
    {
        return $request;
    }
}
