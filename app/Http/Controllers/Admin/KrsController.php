<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    // function index()
    // {
    //     $krs = Krs::all();
    //     return view('admin.krs.krs', compact('krs'));
    // }

    public function index()
    {
        // Fetch the mahasiswa and mataKuliah data
        $mahasiswa = Mahasiswa::all();
        $mataKuliah = Matkul::all();
        $krs = Krs::all();

        // Pass the data to the view
        return view('admin.krs.krs', compact('mahasiswa', 'mataKuliah', 'krs'));
    }

    public function create()
    {
        // Ambil semua data golongan
        $golongan = Golongan::all();

        // Kirim data golongan ke view
        return view('krs.create', compact('golongan'));
    }
}
