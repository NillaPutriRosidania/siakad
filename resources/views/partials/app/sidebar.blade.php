<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-red-500 text-white md:translate-x-0"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-red-500 text-white">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard.index') }}"
                    class="@if (Route::is('dashboard.index')) bg-white text-red-500 @else @endif flex items-center p-2 text-base font-medium rounded-lg hover:bg-white hover:text-red-500">
                    <svg aria-hidden="true"
                        class="@if (Route::is('dashboard.index')) text-red-500 @else @endif w-6 h-6 transition duration-75 group-hover:text-red-500"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Beranda</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="@if (Route::is('golongan.index') || Route::is('mahasiswa.index')) bg-white text-red-500 @else @endif flex items-center p-2 w-full text-base font-medium rounded-lg transition duration-75 group hover:text-red-500 hover:bg-white"
                    aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages" id="master-menu-button">
                    <svg aria-hidden="true"
                        class="@if (Route::is('mahasiswa.index') || Route::is('mahasiswa.index')) text-red-500 @else @endif flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-red-500"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Master</span>
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('golongan.index') }}"
                            class="@if (Route::is('golongan.index')) bg-white text-red-500 @else @endif flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-white hover:text-red-500">
                            Golongan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa.index') }}"
                            class="@if (Route::is('mahasiswa.index')) bg-white text-red-500 @else text-white @endif flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-white hover:text-red-500">
                            Mahasiswa
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('matakuliah.index') }}"
                            class="@if (Route::is('matakuliah.index')) bg-white text-red-500 @else text-white @endif flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-white hover:text-red-500">
                            Mata Kuliah
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dosen.index') }}"
                            class="@if (Route::is('dosen.index')) bg-white text-red-500 @else text-white @endif flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-white hover:text-red-500">
                            Dosen
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('ruang.index') }}"
                            class="@if (Route::is('ruang.index')) bg-white text-red-500 @else text-white @endif flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-white hover:text-red-500">
                            Ruang
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button"
                    class="@if (Route::is('golongan.index') || Route::is('mahasiswa.index')) bg-white text-red-500 @else @endif flex items-center p-2 w-full text-base font-medium rounded-lg transition duration-75 group hover:text-red-500 hover:bg-white"
                    aria-controls="dropdown-akademik" data-collapse-toggle="dropdown-akademik" id="master-menu-button">
                    <svg aria-hidden="true"
                        class="@if (Route::is('mahasiswa.index') || Route::is('mahasiswa.index')) text-red-500 @else @endif flex-shrink-0 w-6 h-6 transition duration-75 group-hover:text-red-500"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Akademik</span>
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-akademik" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('pengampu.index') }}"
                            class="@if (Route::is('pengampu.index')) bg-white text-red-500 @else @endif flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-white hover:text-red-500">
                            Pengampu
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('jadwal-akademik.index') }}"
                            class="@if (Route::is('jadwal-akademik.index')) bg-white text-red-500 @else @endif flex items-center p-2 pl-11 w-full text-base font-medium rounded-lg transition duration-75 group hover:bg-white hover:text-red-500">
                            Jadwal Akademik
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<script>
    const masterMenuButton = document.getElementById('master-menu-button');
    const dropdownPages = document.getElementById('dropdown-pages');
    masterMenuButton.addEventListener('click', () => {
        dropdownPages.classList.toggle('hidden');
    });

    const analisisMenuButton = document.getElementById('analisis-menu-button');
    const dropdownAnalisis = document.getElementById('dropdown-akademik');
    analisisMenuButton.addEventListener('click', () => {
        dropdownAnalisis.classList.toggle('hidden');
    });
</script>
