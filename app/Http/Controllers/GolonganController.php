<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class GolonganController extends Controller
{
    public function index()
    {
        $golongan = Golongan::all();
        return view('golongan.index', compact('golongan'));
    }

    public function create()
    {
        return view('golongan.create');
    }

    public function store(Request $request)
    {
        try {
            Log::info('Data masuk:', $request->all());

            $request->validate([
                'nama_golongan' => 'required|string|max:50',
            ]);

            Golongan::create([
                'nama_Gol' => $request->nama_golongan,
            ]);

            Log::info('Golongan berhasil disimpan.');

            return redirect()->route('golongan.index')->with('success', 'Golongan berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan golongan: ' . $e->getMessage());
            return back()->withErrors('Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $golongan = Golongan::findOrFail($id);
        return view('golongan.edit', compact('golongan'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_golongan' => 'required|string|max:50',
            ]);

            $golongan = Golongan::findOrFail($id);

            $golongan->update([
                'nama_Gol' => $request->nama_golongan,
            ]);

            return redirect()->route('golongan.index')->with('success', 'Golongan berhasil diperbarui.');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Error saat memperbarui golongan: ' . $e->getMessage());
            return back()->withErrors('Terjadi kesalahan saat memperbarui data. ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Error saat memperbarui golongan: ' . $e->getMessage());
            return back()->withErrors('Gagal memperbarui data: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        $golongan = Golongan::findOrFail($id);
        $golongan->delete();

        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil dihapus.');
    }
}