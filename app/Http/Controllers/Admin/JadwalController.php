<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\Ruang;
use Illuminate\Http\Request;

class JadwalController extends Controller
{

    public function index()
    {
        $jadwal = Jadwal::with(['matakuliah', 'ruang', 'golongan'])->get();
        $matkul = Matkul::all();
        $ruang = Ruang::all();
        $golongan = Golongan::all();

        return view('admin.jadwal.jadwal', compact('jadwal', 'matkul', 'ruang', 'golongan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'kode_mk' => 'required',
            'id_ruang' => 'required',
            'id_gol' => 'required',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required',
            'kode_mk' => 'required',
            'id_ruang' => 'required',
            'id_gol' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate.');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }

    public function showJadwal()
{
    // Pastikan Anda mengambil data dari tabel MataKuliah dengan benar
    $matkul = Matkul::all(); // Sesuaikan dengan nama model Anda

    // Kirim variabel $matkul ke view
    return view('jadwal.index', compact('matkul'));
}

}
