<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    function index()
    {
        $matakuliah = Matkul::all();
        return view('matkul.matkul', compact('matakuliah'));
    }

    public function destroy($kode_mk)
    {
        $mk = Matkul::findOrFail($kode_mk);
        $mk->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Data mata kuliah berhasil dihapus.');
    }

    // Tambahan jika ingin edit/update
    public function edit($kode_mk)
    {
        $mk = Matkul::findOrFail($kode_mk);
        return view('matakuliah.edit', compact('mk'));
    }

    public function update(Request $request, $kode_mk)
    {
        $request->validate([
            'nama_mk' => 'required|string|max:100',
            'sks' => 'nullable|integer',
            'semester' => 'nullable|integer',
        ]);

        $mk = Matkul::findOrFail($kode_mk);
        $mk->update($request->all());

        return redirect()->route('matakuliah.index')->with('success', 'Data mata kuliah berhasil diperbarui.');
    }
}
