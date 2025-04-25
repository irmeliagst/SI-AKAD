<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    function index()
    {
        $jadwal = Jadwal::all();
        return view('mahasiswa.mahasiswa', compact('jadwal'));
    }
}
