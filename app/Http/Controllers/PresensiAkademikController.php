<?php

namespace App\Http\Controllers;

use App\Models\PresensiAkademik;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class PresensiAkademikController extends Controller
{
    // Menampilkan daftar presensi akademik
    public function index()
    {
        $presensiList = PresensiAkademik::all();
        return view('presensi-akademik.index', compact('presensiList'));
    }

    // Menampilkan form untuk menambah presensi akademik
    public function create()
    {
        $mahasiswaList = Mahasiswa::all();
        $matkulList = MataKuliah::all();
        return view('presensi-akademik.create', compact('mahasiswaList', 'matkulList'));
    }

    // Menyimpan presensi akademik baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hari' => 'required|string|max:10',
            'tanggal' => 'required|date',
            'status_kehadiran' => 'required|string|in:Hadir,Izin,Sakit,Alpha',
            'NIM' => 'required|string|max:15',
            'Kode_mk' => 'required|string|max:10',
        ]);

        PresensiAkademik::create($validated);

        return redirect()->route('presensi-akademik.index')->with('success', 'Presensi akademik berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit presensi akademik
    public function edit($id)
    {
        $presensi = PresensiAkademik::findOrFail($id);
        $mahasiswaList = Mahasiswa::all();
        $matkulList = MataKuliah::all();
        return view('presensi-akademik.edit', compact('presensi', 'mahasiswaList', 'matkulList'));
    }

    // Mengupdate presensi akademik
    public function update(Request $request, $id)
    {
        $presensi = PresensiAkademik::findOrFail($id);

        $validated = $request->validate([
            'hari' => 'required|string|max:10',
            'tanggal' => 'required|date',
            'status_kehadiran' => 'required|string|in:Hadir,Izin,Sakit,Alpha',
            'NIM' => 'required|string|max:15',
            'Kode_mk' => 'required|string|max:10',
        ]);

        $presensi->update($validated);

        return redirect()->route('presensi-akademik.index')->with('success', 'Presensi akademik berhasil diperbarui.');
    }

    // Menghapus presensi akademik
    public function destroy($id)
    {
        $presensi = PresensiAkademik::findOrFail($id);
        $presensi->delete();

        return redirect()->route('presensi-akademik.index')->with('success', 'Presensi akademik berhasil dihapus.');
    }
}