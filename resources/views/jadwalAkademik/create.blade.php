@extends('layouts.app')

@section('title', 'Tambah Jadwal Akademik')

@section('content')

    <div class="bg-white p-2 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 h-4">
            <h2 class="flex items-center justify-center text-sm text-center lg:text-lg font-bold uppercase text-red-600">
                Tambah Jadwal Akademik
            </h2>
        </div>
    </div>

    <section class="bg-white py-4 rounded-lg mb-4 antialiased md:py-8">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <form action="{{ route('jadwal-akademik.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="hari" class="block text-sm font-medium text-gray-700">Hari</label>
                        <select name="hari" id="hari" class="w-full p-2 border border-gray-300 rounded-md" required>
                            <option value="" disabled selected>Pilih Hari</option>
                            <option value="Senin" {{ old('hari') == 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ old('hari') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ old('hari') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ old('hari') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jumat" {{ old('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            <option value="Sabtu" {{ old('hari') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                        </select>
                        @error('hari')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="Kode_mk" class="block text-sm font-medium text-gray-700">Kode MK</label>
                        <select name="Kode_mk" id="Kode_mk" class="w-full p-2 border border-gray-300 rounded-md" required>
                            <option value="">Pilih Matakuliah</option>
                            @foreach ($matkulList as $matkul)
                                <option value="{{ $matkul->Kode_mk }}"
                                    {{ old('Kode_mk') == $matkul->Kode_mk ? 'selected' : '' }}>
                                    {{ $matkul->Kode_mk }} - {{ $matkul->Nama_mk }}
                                </option>
                            @endforeach
                        </select>
                        @error('Kode_mk')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="id_ruang" class="block text-sm font-medium text-gray-700">Ruang</label>
                        <select name="id_ruang" id="id_ruang" class="w-full p-2 border border-gray-300 rounded-md"
                            required>
                            <option value="">Pilih Ruang</option>
                            @foreach ($ruangList as $ruang)
                                <option value="{{ $ruang->id_ruang }}"
                                    {{ old('id_ruang') == $ruang->id_ruang ? 'selected' : '' }}>
                                    {{ $ruang->nama_ruang }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_ruang')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="id_Gol" class="block text-sm font-medium text-gray-700">Golongan</label>
                        <select name="id_Gol" id="id_Gol" class="w-full p-2 border border-gray-300 rounded-md" required>
                            <option value="">Pilih Golongan</option>
                            @foreach ($golonganList as $golongan)
                                <option value="{{ $golongan->id_Gol }}"
                                    {{ old('id_Gol') == $golongan->id_Gol ? 'selected' : '' }}>
                                    {{ $golongan->nama_Gol }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_Gol')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600">
                        Simpan Jadwal
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection
