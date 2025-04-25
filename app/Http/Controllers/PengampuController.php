<?php

namespace App\Http\Controllers;

use App\Models\Pengampu;
use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class PengampuController extends Controller
{
    public function index()
    {
        $pengampus = Pengampu::with(['dosen', 'matakuliah'])->get();
        return view('pengampu.index', compact('pengampus'));
    }

    public function create()
    {
        $dosenList = Dosen::all();
        // @dd($dosenList);

        $matkulList = Matakuliah::all();
        return view('pengampu.create', compact('dosenList', 'matkulList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
            'NIP' => 'required|exists:dosen,NIP',
        ]);
        Pengampu::create([
            'Kode_mk' => $request->Kode_mk,
            'NIP' => $request->NIP,
        ]);
        return redirect()->route('pengampu.index')->with('success', 'Data pengampu berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $pengampu = Pengampu::findOrFail($id);
        $dosenList = Dosen::all();
        $matkulList = Matakuliah::all();
        return view('pengampu.edit', compact('pengampu', 'dosenList', 'matkulList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Kode_mk' => 'required|exists:matakuliah,Kode_mk',
            'NIP' => 'required|exists:dosen,NIP',
        ]);

        $pengampu = Pengampu::findOrFail($id);
        $pengampu->update($request->all());

        return redirect()->route('pengampu.index')->with('success', 'Data pengampu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengampu = Pengampu::findOrFail($id);
        $pengampu->delete();

        return redirect()->route('pengampu.index')->with('success', 'Data pengampu berhasil dihapus.');
    }
}
