<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\Pengampu;
use Illuminate\Http\Request;

class PengampuController extends Controller
{
    function index()
    {
        $pengampu = Pengampu::all();
        $matkul = Matkul::all();
        $dosen = Dosen::all();
        return view('admin.pengampu.pengampu', compact('pengampu', 'matkul', 'dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|exists:matakuliah,kode_mk',
            'nip'     => 'required|exists:dosen,nip',
        ]);

        Pengampu::create([
            'kode_mk' => $request->kode_mk,
            'nip'     => $request->nip,
        ]);

        return redirect()->route('pengampu')->with('success', 'Data pengampu berhasil ditambahkan.');
    }

}
