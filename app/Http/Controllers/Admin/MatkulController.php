<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    function index()
    {
        $matakuliah = Matkul::all();
        $matkul = Matkul::all();
        $dosen = Dosen::all();
        return view('admin.matkul.matkul', compact('matakuliah'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:matakuliah,kode_mk',
            'nama_mk' => 'required',
            'sks' => 'required|numeric',
            'semester' => 'required|numeric',
        ]);

        Matkul::create($request->all());

        return redirect()->route('matkul.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $kode_mk)
    {
        $request->validate([
            'nama_mk' => 'required',
            'sks' => 'required|numeric',
            'semester' => 'required|numeric',
        ]);

        $mk = Matkul::findOrFail($kode_mk);
        $mk->update($request->all());

        return redirect()->route('matkul.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($kode_mk)
    {
        Matkul::destroy($kode_mk);
        return redirect()->route('matkul.index')->with('success', 'Data berhasil dihapus');
    }
}
