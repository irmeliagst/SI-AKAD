<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Presensi;
use Illuminate\Http\Request;


class PresensiController extends Controller
{
    function index()
    {
        $presensi = Presensi::all();
        return view('admin.presensi.presensi', compact('presensi'));
    }

    public function destroy($id)
    {
        $presensi = Presensi::findOrFail($id);
        $presensi->delete();
        return redirect()->route('presensi.index')->with('success', 'Data presensi berhasil dihapus.');
    }

    public function mahasiswaPresensi()
    {
        $hariIni = now()->translatedFormat('l'); // contoh: "Senin"
        $idGol = auth()->user()->id_gol; // ambil dari mahasiswa login

        $jadwal = Jadwal::with(['matakuliah', 'ruang', 'golongan'])
            ->where('hari', $hariIni)
            ->where('id_gol', $idGol)
            ->get();

        return view('presensi.mahasiswa', compact('jadwal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'kode_mk' => 'required',
            'hari' => 'required',
            'tanggal' => 'required|date',
            'status_kehadiran' => 'required|in:Hadir,Izin,Sakit,Alfa',
        ]);

        Presensi::create($request->only('nim', 'kode_mk', 'hari', 'tanggal', 'status_kehadiran'));

        return back()->with('success', 'Presensi berhasil disimpan!');
    }
}
