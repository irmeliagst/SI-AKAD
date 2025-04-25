<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengampu;
use Illuminate\Http\Request;

class PengampuController extends Controller
{
    function index()
    {
        $pengampu = Pengampu::all();
        return view('pengampu.pengampu', compact('pengampu'));
    }

}
