<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.jadwal', compact('jadwal'));
    }

}
