<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $golongan = Golongan::all();
        return view('admin.golongan.golongan', compact('golongan'));
    }

    // public function create()
    // {
    //     return view('golongan.create');
    // }
    public function create()
    {
        $golongan = Golongan::all(); // Fetch all golongan records
        return view('mahasiswa.create', compact('golongan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_gol' => 'required|string|max:10|unique:golongan,id_gol',
            'nama_gol' => 'required|string|max:100',
        ]);

        Golongan::create([
            'id_gol' => $request->id_gol,
            'nama_gol' => $request->nama_gol,
        ]);

        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil ditambahkan.');
    }

    public function edit($id_gol)
    {
        $golongan = Golongan::findOrFail($id_gol);
        return view('golongan.edit', compact('golongan'));
    }

    public function update(Request $request, $id_gol)
    {
        $request->validate([
            'nama_gol' => 'required|string|max:100',
        ]);

        $golongan = Golongan::findOrFail($id_gol);
        $golongan->update($request->all());

        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil diperbarui.');
    }

    public function destroy($id_gol)
    {
        $golongan = Golongan::findOrFail($id_gol);
        $golongan->delete();

        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil dihapus.');
    }
}
