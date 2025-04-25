@extends('layouts.app')

@section('title', 'Edit Jadwal Akademik')

@section('content')

    <div class="bg-white p-2 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 h-4">
            <h2 class="flex items-center justify-center text-sm text-center lg:text-lg font-bold uppercase text-red-600">
                Edit Jadwal Akademik
            </h2>
        </div>
    </div>

    <section class="bg-white py-4 rounded-lg mb-4 antialiased md:py-8">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <form action="{{ route('jadwal-akademik.update', $jadwalAkademik->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="hari" class="block text-sm font-medium text-gray-700">Hari</label>
                        <input type="text" id="hari" name="hari" value="{{ old('hari', $jadwalAkademik->hari) }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                        @error('hari')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Kode_mk" class="block text-sm font-medium text-gray-700">Mata Kuliah (Kode)</label>
                        <select id="Kode_mk" name="Kode_mk"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @foreach ($matkulList as $matkul)
                                <option value="{{ $matkul->Kode_mk }}"
                                    {{ old('Kode_mk', $jadwalAkademik->Kode_mk) == $matkul->Kode_mk ? 'selected' : '' }}>
                                    {{ $matkul->Kode_mk }} - {{ $matkul->Nama_mk }}
                                </option>
                            @endforeach
                        </select>
                        @error('Kode_mk')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="id_ruang" class="block text-sm font-medium text-gray-700">Ruang</label>
                        <select id="id_ruang" name="id_ruang"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @foreach ($ruangList as $ruang)
                                <option value="{{ $ruang->id_ruang }}"
                                    {{ old('id_ruang', $jadwalAkademik->id_ruang) == $ruang->id_ruang ? 'selected' : '' }}>
                                    {{ $ruang->nama_ruang }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_ruang')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="id_Gol" class="block text-sm font-medium text-gray-700">Golongan</label>
                        <select id="id_Gol" name="id_Gol"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            @foreach ($golonganList as $gol)
                                <option value="{{ $gol->id_Gol }}"
                                    {{ old('id_Gol', $jadwalAkademik->id_Gol) == $gol->id_Gol ? 'selected' : '' }}>
                                    {{ $gol->nama_Gol }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_Gol')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('jadwal-akademik.index') }}"
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
