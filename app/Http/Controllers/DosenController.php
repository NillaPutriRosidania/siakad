<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // Menampilkan daftar dosen
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index', compact('dosen'));
    }

    // Menampilkan form untuk membuat dosen baru
    public function create()
    {
        return view('dosen.create');
    }

    // Menyimpan data dosen baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NIP' => 'required|string|max:20|unique:dosen,NIP',
            'Nama' => 'required|string|max:100',
            'Alamat' => 'required|string|max:150',
            'Nohp' => 'required|string|max:15',
        ]);

        Dosen::create($validated);
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit data dosen
    public function edit($NIP)
    {
        $dosen = Dosen::findOrFail($NIP);
        return view('dosen.edit', compact('dosen'));
    }

    // Mengupdate data dosen
    public function update(Request $request, $NIP)
    {
        $validated = $request->validate([
            'Nama' => 'required|string|max:100',
            'Alamat' => 'required|string|max:150',
            'Nohp' => 'required|string|max:15',
        ]);

        $dosen = Dosen::findOrFail($NIP);
        $dosen->update($validated);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diperbarui');
    }

    // Menghapus data dosen
    public function destroy($NIP)
    {
        $dosen = Dosen::findOrFail($NIP);
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus');
    }
}
