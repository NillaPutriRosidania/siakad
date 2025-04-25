<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    // Display list of KRS
    public function index()
    {
        $krs = Krs::all();
        return view('krs.index', compact('krs'));
    }

    // Show the form for creating a new KRS
    public function create()
    {
        $mahasiswaList = Mahasiswa::all();
        $matakuliahList = Matakuliah::all();
        return view('krs.create', compact('mahasiswaList', 'matakuliahList'));
    }

    // Store a newly created KRS in storage
    public function store(Request $request)
    {
        $request->validate([
            'NIM' => 'required|exists:mahasiswa,NIM',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        Krs::create([
            'NIM' => $request->NIM,
            'Kode_mk' => $request->Kode_mk,
        ]);

        return redirect()->route('krs.index')->with('success', 'KRS berhasil ditambahkan');
    }

    // Show the form for editing the specified KRS
    public function edit($id)
    {
        $krs = Krs::findOrFail($id);
        $mahasiswaList = Mahasiswa::all();
        $matakuliahList = Matakuliah::all();
        return view('krs.edit', compact('krs', 'mahasiswaList', 'matakuliahList'));
    }

    // Update the specified KRS in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'NIM' => 'required|exists:mahasiswa,NIM',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
        ]);

        $krs = Krs::findOrFail($id);
        $krs->update([
            'NIM' => $request->NIM,
            'Kode_mk' => $request->Kode_mk,
        ]);

        return redirect()->route('krs.index')->with('success', 'KRS berhasil diperbarui');
    }

    // Remove the specified KRS from storage
    public function destroy($id)
    {
        $krs = Krs::findOrFail($id);
        $krs->delete();

        return redirect()->route('krs.index')->with('success', 'KRS berhasil dihapus');
    }
}
