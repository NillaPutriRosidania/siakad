@extends('layouts.app')

@section('title', 'Buat KRS Baru')

@section('content')

    <div class="bg-white p-2 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 h-4">
            <h2 class="flex items-center justify-center text-sm text-center lg:text-lg font-bold uppercase text-red-600">
                Buat Kartu Rencana Studi (KRS) Baru
            </h2>
        </div>
    </div>

    <section class="bg-white py-4 rounded-lg mb-4 antialiased md:py-8">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <form action="{{ route('krs.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="NIM" class="block text-sm font-medium text-gray-700">Mahasiswa</label>
                        <select id="NIM" name="NIM"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                            <option value="">Pilih Mahasiswa</option>
                            @foreach ($mahasiswaList as $mahasiswa)
                                <option value="{{ $mahasiswa->NIM }}" {{ old('NIM') == $mahasiswa->NIM ? 'selected' : '' }}>
                                    {{ $mahasiswa->Nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('NIM')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Kode_mk" class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
                        <select id="Kode_mk" name="Kode_mk"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                            <option value="">Pilih Mata Kuliah</option>
                            @foreach ($matakuliahList as $matakuliah)
                                <option value="{{ $matakuliah->Kode_mk }}"
                                    {{ old('Kode_mk') == $matakuliah->Kode_mk ? 'selected' : '' }}>
                                    {{ $matakuliah->Nama_mk }}
                                </option>
                            @endforeach
                        </select>
                        @error('Kode_mk')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('krs.index') }}"
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
