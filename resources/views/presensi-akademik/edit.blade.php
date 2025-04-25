@extends('layouts.app')

@section('title', 'Edit Presensi Akademik')

@section('content')

    <div class="bg-white p-2 mb-4 border-2 border-white rounded-lg">
        <div class="flex justify-center items-center rounded-lg border-gray-300 h-4">
            <h2 class="flex items-center justify-center text-sm text-center lg:text-lg font-bold uppercase text-red-600">
                Edit Presensi Akademik
            </h2>
        </div>
    </div>

    <section class="bg-white py-4 rounded-lg mb-4 antialiased md:py-8">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mx-auto max-w-5xl">
                <form action="{{ route('presensi-akademik.update', $presensi->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="hari" class="block text-sm font-medium text-gray-700">Hari</label>
                        <input type="text" name="hari" id="hari"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                            value="{{ old('hari', $presensi->hari) }}" required>
                        @error('hari')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                            value="{{ old('tanggal', $presensi->tanggal) }}" required>
                        @error('tanggal')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="status_kehadiran" class="block text-sm font-medium text-gray-700">Status
                            Kehadiran</label>
                        <select id="status_kehadiran" name="status_kehadiran"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                            <option value="" disabled>Pilih Status Kehadiran</option>
                            <option value="Hadir"
                                {{ old('status_kehadiran', $presensi->status_kehadiran) == 'Hadir' ? 'selected' : '' }}>
                                Hadir</option>
                            <option value="Izin"
                                {{ old('status_kehadiran', $presensi->status_kehadiran) == 'Izin' ? 'selected' : '' }}>Izin
                            </option>
                            <option value="Sakit"
                                {{ old('status_kehadiran', $presensi->status_kehadiran) == 'Sakit' ? 'selected' : '' }}>
                                Sakit</option>
                            <option value="Alpha"
                                {{ old('status_kehadiran', $presensi->status_kehadiran) == 'Alpha' ? 'selected' : '' }}>
                                Alpha</option>
                        </select>
                        @error('status_kehadiran')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="NIM" class="block text-sm font-medium text-gray-700">Mahasiswa (NIM)</label>
                        <select id="NIM" name="NIM" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                            required>
                            <option value="" disabled>Pilih Mahasiswa</option>
                            @foreach ($mahasiswaList as $mhs)
                                <option value="{{ $mhs->NIM }}"
                                    {{ old('NIM', $presensi->NIM) == $mhs->NIM ? 'selected' : '' }}>
                                    {{ $mhs->NIM }} - {{ $mhs->Nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('NIM')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="Kode_mk" class="block text-sm font-medium text-gray-700">Mata Kuliah (Kode)</label>
                        <select id="Kode_mk" name="Kode_mk" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                            required>
                            <option value="" disabled>Pilih Mata Kuliah</option>
                            @foreach ($matkulList as $matkul)
                                <option value="{{ $matkul->Kode_mk }}"
                                    {{ old('Kode_mk', $presensi->Kode_mk) == $matkul->Kode_mk ? 'selected' : '' }}>
                                    {{ $matkul->Kode_mk }} - {{ $matkul->Nama_mk }}
                                </option>
                            @endforeach
                        </select>
                        @error('Kode_mk')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('presensi-akademik.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50">
                            Kembali
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700">
                            Perbarui
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
