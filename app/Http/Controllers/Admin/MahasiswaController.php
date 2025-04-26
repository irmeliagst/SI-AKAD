<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    function index()
    {
        $golongan = Golongan::all();
        $mahasiswa = Mahasiswa::all();
        return view('admin.mahasiswa.mahasiswa', compact('mahasiswa', 'golongan'));
    }

    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $nim)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'nohp' => 'nullable|string|max:20',
            'semester' => 'nullable|integer',
            'id_gol' => 'nullable|exists:golongan,id_gol',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    // public function create()
    // {
    //     $golongan = Golongan::all(); // Ambil data golongan
    //     return view('mahasiswa.create', compact('golongan')); // Menampilkan form tambah mahasiswa
    // }

    // Method untuk menyimpan data mahasiswa
    public function create(Request $request)
    {
        // Validate the input fields including the golongan_id
        $request->validate([
            'nim' => 'required|unique:mahasiswa',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'semester' => 'required',
            'golongan' => 'required', // Add validation for golongan (golongan_id)
        ]);

        // Create a new Mahasiswa record
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'semester' => $request->semester,
            'golongan_id' => $request->golongan, // Make sure this corresponds to the foreign key
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa added successfully!');
    }

    public function store(Request $request)
    {
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'semester' => $request->semester,
            'golongan' => $request->golongan,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan.');
    }
}
