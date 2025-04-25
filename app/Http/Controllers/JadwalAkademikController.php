<?php

namespace App\Http\Controllers;

use App\Models\JadwalAkademik;
use App\Models\Matakuliah;
use App\Models\Ruang;
use App\Models\Golongan;
use Illuminate\Http\Request;

class JadwalAkademikController extends Controller
{
    // Menampilkan daftar jadwal akademik
    public function index()
    {
        $jadwalAkademiks = JadwalAkademik::with(['matakuliah', 'ruang', 'golongan'])->get();
        return view('jadwalAkademik.index', compact('jadwalAkademiks'));
    }

    // Menampilkan form untuk menambahkan jadwal akademik baru
    public function create()
    {
        $matkulList = Matakuliah::all(); // Ganti variabel dengan nama yang lebih sesuai
        $ruangList = Ruang::all(); // Ganti variabel dengan nama yang lebih sesuai
        $golonganList = Golongan::all(); // Ganti variabel dengan nama yang lebih sesuai
        return view('jadwalAkademik.create', compact('matkulList', 'ruangList', 'golonganList'));
    }

    // Menyimpan jadwal akademik baru
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|string|max:10',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
            'id_ruang' => 'required|exists:ruang,id_ruang',
            'id_Gol' => 'required|exists:golongan,id_Gol',
        ]);

        // Pastikan menggunakan input yang sesuai untuk nama kolom
        JadwalAkademik::create([
            'hari' => $request->hari,
            'Kode_mk' => $request->Kode_mk,
            'id_ruang' => $request->id_ruang,
            'id_Gol' => $request->id_Gol,
        ]);

        return redirect()->route('jadwal-akademik.index')->with('success', 'Jadwal akademik berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit jadwal akademik
    public function edit($id)
    {
        $jadwalAkademik = JadwalAkademik::findOrFail($id);
        $matkulList = Matakuliah::all(); // Ganti variabel dengan nama yang lebih sesuai
        $ruangList = Ruang::all(); // Ganti variabel dengan nama yang lebih sesuai
        $golonganList = Golongan::all(); // Ganti variabel dengan nama yang lebih sesuai
        return view('jadwalAkademik.edit', compact('jadwalAkademik', 'matkulList', 'ruangList', 'golonganList'));
    }

    // Mengupdate jadwal akademik yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required|string|max:10',
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
            'id_ruang' => 'required|exists:ruang,id_ruang',
            'id_Gol' => 'required|exists:golongan,id_Gol',
        ]);

        $jadwal = JadwalAkademik::findOrFail($id);
        $jadwal->update([
            'hari' => $request->hari,
            'Kode_mk' => $request->Kode_mk,
            'id_ruang' => $request->id_ruang,
            'id_Gol' => $request->id_Gol,
        ]);

        return redirect()->route('jadwal-akademik.index')->with('success', 'Jadwal akademik berhasil diperbarui.');
    }

    // Menghapus jadwal akademik
    public function destroy($id)
    {
        $jadwal = JadwalAkademik::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal-akademik.index')->with('success', 'Jadwal akademik berhasil dihapus.');
    }
}
