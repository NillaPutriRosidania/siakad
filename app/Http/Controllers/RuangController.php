<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    // Menampilkan daftar ruang
    public function index()
    {
        $ruang = Ruang::all();
        return view('ruang.index', compact('ruang'));
    }

    // Menampilkan form untuk membuat ruang baru
    public function create()
    {
        return view('ruang.create');
    }

    // Menyimpan data ruang baru
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'nama_ruang' => 'required|string|max:50',
        ]);

        // Menyimpan data ruang ke database
        Ruang::create($validated);

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit data ruang
    public function edit($id_ruang)
    {
        // Menemukan ruang berdasarkan id
        $ruang = Ruang::findOrFail($id_ruang);
        return view('ruang.edit', compact('ruang'));
    }

    // Mengupdate data ruang
    public function update(Request $request, $id_ruang)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'nama_ruang' => 'required|string|max:50',
        ]);

        // Menemukan ruang berdasarkan id dan memperbarui datanya
        $ruang = Ruang::findOrFail($id_ruang);
        $ruang->update($validated);

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil diperbarui');
    }

    // Menghapus data ruang
    public function destroy($id_ruang)
    {
        // Menemukan ruang berdasarkan id dan menghapusnya
        $ruang = Ruang::findOrFail($id_ruang);
        $ruang->delete();

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil dihapus');
    }
}
