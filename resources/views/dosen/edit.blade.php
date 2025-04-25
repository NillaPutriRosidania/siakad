@extends('layouts.app')

@section('title', 'Edit Dosen')

@section('content')

    <div class="bg-white p-2 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 h-4">
            <h2 class="flex items-center justify-center text-sm text-center lg:text-lg font-bold uppercase text-red-600">
                Edit Dosen
            </h2>
        </div>
    </div>

    <section class="bg-white py-4 rounded-lg mb-4 antialiased md:py-8">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <form action="{{ route('dosen.update', $dosen->NIP) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="NIP" class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" id="NIP" name="NIP" value="{{ old('NIP', $dosen->NIP) }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" readonly>
                        @error('NIP')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="Nama" name="Nama" value="{{ old('Nama', $dosen->Nama) }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                        @error('Nama')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea id="Alamat" name="Alamat" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('Alamat', $dosen->Alamat) }}</textarea>
                        @error('Alamat')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Nohp" class="block text-sm font-medium text-gray-700">No HP</label>
                        <input type="text" id="Nohp" name="Nohp" value="{{ old('Nohp', $dosen->Nohp) }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                        @error('Nohp')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('dosen.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50">
                            Kembali
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
