<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
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
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|exists:mahasiswa,nim',
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
        ]);
    
        try {
            DB::table('krs')->insert([
                'nim' => $request->nim,
                'kode_mk' => $request->kode_mk,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            return response()->json(['message' => 'KRS berhasil ditambahkan.'], 201);
    
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan KRS.'], 500);
        }
    }
}
