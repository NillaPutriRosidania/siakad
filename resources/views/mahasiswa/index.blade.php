@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('content')

    <div class="bg-white p-2 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 h-4">
            <h2 class="flex items-center justify-center text-sm text-center lg:text-lg font-bold uppercase text-red-600">
                Daftar Mahasiswa
            </h2>
        </div>
    </div>
    <div class="mt-4">
        <form method="GET" action="{{ route('mahasiswa.index') }}">
            <div class="flex justify-between items-center mx-28">
                <div class="flex gap-2">
                    <a href="{{ route('mahasiswa.create') }}" class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600">
                        Tambah Mahasiswa
                    </a>
                    <a href="#" class="bg-blue-500 text-white p-2 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-excel text-white"></i>
                    </a>
                </div>
                <div class="flex items-center">
                    <input type="text" name="search" class="w-full p-2 border border-gray-300 rounded-lg mx-4"
                        placeholder="Cari Mahasiswa..." value="{{ request('search') }}">
                    <button type="submit" class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600">
                        Cari
                    </button>
                </div>
            </div>
        </form>
    </div>
    <section class="bg-white py-4 rounded-lg mb-4 antialiased md:py-8">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                @if ($mahasiswa->count() > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-red-600">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">NIM</th>
                                <th class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">Alamat</th>
                                <th class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">No HP</th>
                                <th class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">Semester</th>
                                <th class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider">Golongan</th>
                                <th class="px-6 py-3 text-xs font-medium text-white uppercase tracking-wider text-center">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($mahasiswa as $mhs)
                                <tr class="border-b border-gray-200">
                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $mhs->NIM }}</td>
                                    <td class="px-6 py-4">{{ $mhs->Nama }}</td>
                                    <td class="px-6 py-4">{{ $mhs->Alamat }}</td>
                                    <td class="px-6 py-4">{{ $mhs->Nohp }}</td>
                                    <td class="px-6 py-4">{{ $mhs->Semester }}</td>
                                    <td class="px-6 py-4">{{ $mhs->golongan->nama_Gol ?? '-' }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center items-center gap-2">
                                            <form action="{{ route('mahasiswa.destroy', $mhs->NIM) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="rounded-lg border border-red-700 px-3 py-2 text-sm font-medium text-red-700 hover:bg-red-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-red-300">
                                                    Hapus
                                                </button>
                                            </form>
                                            <a href="{{ route('mahasiswa.edit', $mhs->NIM) }}"
                                                class="rounded-lg border border-blue-700 px-3 py-2 text-sm font-medium text-blue-700 hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-blue-300">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center">
                        <h1 class="text-red-600 font-bold">Data mahasiswa masih kosong</h1>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
