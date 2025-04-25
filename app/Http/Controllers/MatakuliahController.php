<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::all();
        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        try {
            Log::info('Data mata kuliah masuk:', $request->all());

            // Validasi input
            $validated = $request->validate([
                'kode_mk' => 'required|string|max:10|unique:matakuliah,kode_mk',
                'nama_mk' => 'required|string|max:100',
                'sks' => 'required|integer|min:1',
                'semester' => 'required|integer|min:1|max:8',
            ]);

            // Simpan data ke database
            Matakuliah::create($validated);

            Log::info('Mata kuliah berhasil disimpan.');

            return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan mata kuliah: ' . $e->getMessage());
            return back()->withErrors('Gagal menyimpan data: ' . $e->getMessage());
        }
    }


    public function edit($Kode_mk)
    {
        $matakuliah = Matakuliah::findOrFail($Kode_mk);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, $Kode_mk)
    {
        try {
            $request->validate([
                'nama_mk' => 'required|string|max:100',
                'sks' => 'required|integer|min:1',
                'semester' => 'required|integer|min:1|max:8',
            ]);

            $matakuliah = Matakuliah::findOrFail($Kode_mk);
            $matakuliah->update($request->all());

            return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Error saat memperbarui mata kuliah: ' . $e->getMessage());
            return back()->withErrors('Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy($Kode_mk)
    {
        try {
            $matakuliah = Matakuliah::findOrFail($Kode_mk);
            $matakuliah->delete();

            return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error saat menghapus mata kuliah: ' . $e->getMessage());
            return back()->withErrors('Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
