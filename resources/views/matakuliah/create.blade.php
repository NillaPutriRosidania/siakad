@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah')

@section('content')

    <div class="bg-white p-2 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 h-4">
            <h2 class="flex items-center justify-center text-sm text-center lg:text-lg font-bold uppercase text-red-600">
                Tambah Mata Kuliah
            </h2>
        </div>
    </div>

    <section class="bg-white py-4 rounded-lg mb-4 antialiased md:py-8">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <form action="{{ route('matakuliah.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="kode_mk" class="block text-sm font-medium text-gray-700">Kode Mata Kuliah</label>
                        <input type="text" id="kode_mk" name="kode_mk" value="{{ old('kode_mk') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                        @error('kode_mk')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_mk" class="block text-sm font-medium text-gray-700">Nama Mata Kuliah</label>
                        <input type="text" id="nama_mk" name="nama_mk" value="{{ old('nama_mk') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                        @error('nama_mk')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="sks" class="block text-sm font-medium text-gray-700">SKS</label>
                        <input type="number" id="sks" name="sks" value="{{ old('sks') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                        @error('sks')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
                        <input type="number" id="semester" name="semester" value="{{ old('semester') }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500"
                            min="1" max="8">
                        @error('semester')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-between items-center">
                        <a href="{{ route('matakuliah.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
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
