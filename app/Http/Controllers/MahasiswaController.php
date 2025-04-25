<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('golongan')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $golonganList = Golongan::all();
        return view('mahasiswa.create', compact('golonganList'));
    }

    public function store(Request $request)
    {
        try {
            Log::info('Data mahasiswa masuk:', $request->all());

            $request->validate([
                'NIM' => 'required|string|max:15|unique:mahasiswa,NIM',
                'Nama' => 'required|string|max:100',
                'Alamat' => 'required|string|max:150',
                'Nohp' => 'required|string|max:15',
                'Semester' => 'required|integer|min:1',
                'id_Gol' => 'required|exists:golongan,id_Gol',
            ]);

            Mahasiswa::create($request->all());

            Log::info('Mahasiswa berhasil disimpan.');

            return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan mahasiswa: ' . $e->getMessage());
            return back()->withErrors('Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function edit($NIM)
    {
        $mahasiswa = Mahasiswa::findOrFail($NIM);
        $golonganList = Golongan::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'golonganList'));
    }

    public function update(Request $request, $NIM)
    {
        try {
            $request->validate([
                'Nama' => 'required|string|max:100',
                'Alamat' => 'required|string|max:150',
                'Nohp' => 'required|string|max:15',
                'Semester' => 'required|integer|min:1',
                'id_Gol' => 'required|exists:golongan,id_Gol',
            ]);

            $mahasiswa = Mahasiswa::findOrFail($NIM);
            $mahasiswa->update($request->except('NIM'));

            return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Error saat memperbarui mahasiswa: ' . $e->getMessage());
            return back()->withErrors('Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy($NIM)
    {
        $mahasiswa = Mahasiswa::findOrFail($NIM);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
