<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    function index()
    {
        $ruang = Ruang::all();
        return view('admin.ruang.ruang', compact('ruang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruang' => 'required|string|max:255',
        ]);

        Ruang::create([
            'nama_ruang' => $request->nama_ruang,
        ]);

        return redirect()->back()->with('success', 'Ruang berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_ruang' => 'required|string|max:50',
            'nama_ruang' => 'required|string|max:100',
        ]);

        $ruang = Ruang::findOrFail($id); // cari berdasarkan ID asli dari URL
        $ruang->id_ruang = $request->id_ruang;
        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->save();

        return redirect()->route('ruang.index')->with('success', 'Data ruang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ruang = Ruang::findOrFail($id);
        $ruang->delete();

        return redirect()->back()->with('success', 'Ruang berhasil dihapus.');
    }
}
