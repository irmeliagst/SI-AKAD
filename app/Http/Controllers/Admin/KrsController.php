<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    function index()
    {
        $krs = Krs::all();
        return view('krs.krs', compact('krs'));
    }

}
