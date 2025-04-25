<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-red-500 text-white md:translate-x-0"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-red-500 text-white">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboardkadinkes.index') }}"
                    class="@if (Route::is('dashboardkadinkes.index')) bg-white text-red-500 @else @endif flex items-center p-2 text-base font-medium rounded-lg hover:bg-white hover:text-red-500">
                    <svg aria-hidden="true"
                        class="@if (Route::is('dashboardkadinkes.index')) text-red-500 @else @endif w-6 h-6 transition duration-75 group-hover:text-red-500"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Beranda</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
