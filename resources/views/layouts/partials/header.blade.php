<header class="bg-white shadow-sm sticky top-0 z-30">
    <div class="flex items-center justify-between px-6 py-4">
        <div class="flex items-center gap-4">
            <!-- ✅ FIX: Hanya tampil di desktop -->
            <button class="sidebar-toggle hidden md:block p-2 hover:bg-gray-100 rounded-lg transition" title="Toggle Sidebar">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- ✅ FIX: Hanya tampil di mobile -->
            <button class="mobile-menu-toggle md:hidden p-2 hover:bg-gray-100 rounded-lg transition" title="Buka Menu">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <nav class="hidden md:flex items-center gap-2 text-sm">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!$loop->last)
                        <a href="{{ $breadcrumb['url'] }}" class="text-gray-500 hover:text-blue-800 transition">{{ $breadcrumb['label'] }}</a>
                        <i class="bi bi-chevron-right"></i>
                    @else
                        <span class="text-gray-900 font-medium">{{ $breadcrumb['label'] }}</span>
                    @endif
                @endforeach
            </nav>
        </div>

        <div class="flex items-center gap-3">
            <div class="hidden lg:flex items-center">
                <div class="relative">
                    <input type="text" placeholder="Cari laporan..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 w-64 text-sm">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>

            <div class="hidden md:block w-px h-8 bg-gray-200"></div>

            <div class="relative" id="userMenu">
                <button class="flex items-center gap-3 p-2 hover:bg-gray-100 rounded-lg transition" id="userMenuBtn">
                    <div class="w-9 h-9 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold text-sm">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ ucfirst(auth()->user()->roles->first()->name) }}</p>
                    </div>
                    <svg class="w-4 h-4 text-gray-500 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div class="hidden absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50" id="userDropdown">
                    <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span class="text-sm text-gray-700">Profil Saya</span>
                    </a>
                    <a href="settings.html" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50 transition">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-sm text-gray-700">Pengaturan</span>
                    </a>
                    <div class="border-t border-gray-200 my-2"></div>
                    <button type="button" class="flex items-center text-red-600 gap-3 px-4 py-2 hover:bg-red-50 transition w-full text-left logout-button">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span class="text-sm">Logout</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>