@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')

    <div class="bg-white p-2 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 h-4">
            <h2 class="flex items-center justify-center text-sm text-center lg:text-lg font-bold uppercase text-green-600">
                Tambah Mahasiswa
            </h2>
        </div>
    </div>

    <section class="bg-white py-4 rounded-lg mb-4 antialiased md:py-8">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <form action="{{ route('mahasiswa.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="NIM" class="block text-sm font-medium text-gray-700">NIM</label>
                        <input type="text" id="NIM" name="NIM" value="{{ old('NIM') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                        @error('NIM')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="Nama" name="Nama" value="{{ old('Nama') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                        @error('Nama')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea id="Alamat" name="Alamat" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('Alamat') }}</textarea>
                        @error('Alamat')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Nohp" class="block text-sm font-medium text-gray-700">No HP</label>
                        <input type="text" id="Nohp" name="Nohp" value="{{ old('Nohp') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                        @error('Nohp')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Semester" class="block text-sm font-medium text-gray-700">Semester</label>
                        <input type="number" id="Semester" name="Semester" value="{{ old('Semester') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" min="1" max="14">
                        @error('Semester')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="id_Gol" class="block text-sm font-medium text-gray-700">Golongan</label>
                        <select id="id_Gol" name="id_Gol"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Pilih Golongan --</option>
                            @foreach ($golonganList as $gol)
                                <option value="{{ $gol->id_Gol }}" {{ old('id_Gol') == $gol->id_Gol ? 'selected' : '' }}>
                                    {{ $gol->nama_Gol }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_Gol')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('mahasiswa.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50">
                            Kembali
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>

@endsection
