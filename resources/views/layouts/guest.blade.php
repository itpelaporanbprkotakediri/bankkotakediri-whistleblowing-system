<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        if (isset($pageTitle)) {
            $pageTitle = "$pageTitle - " . config('app.name', 'Whistleblowing System');
        } else {
            $pageTitle = config('app.name', 'Whistleblowing System');
        }
    @endphp
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="Sistem pelaporan pelanggaran Perumda BPR Bank Kota Kediri. Laporkan pelanggaran secara aman dan rahasia.">

    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/logo-bpr-kota-square.ico') }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/lib/base/css/style.css') }}">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @stack('styles')
</head>
<body class="bg-gray-50">

    <!-- HEADER -->
    <header class="public-header">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo & Brand -->
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-gray-900">Whistleblowing System</h1>
                        <p class="text-xs text-gray-500">Perumda BPR Bank Kota Kediri</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center gap-2">
                    <a href="{{ route('guest.beranda') }}" class="nav-link {{ Route::is('guest.beranda') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('guest.lapor') }}" class="nav-link {{ Route::is('guest.lapor') ? 'active' : '' }}">Lapor</a>
                    <a href="{{ route('guest.cek-status') }}" class="nav-link {{ Route::is('guest.cek-status') ? 'active' : '' }}">Cek Status</a>
                    <a href="{{ route('guest.panduan') }}" class="nav-link {{ Route::is('guest.panduan') ? 'active' : '' }}">Panduan</a>
                    <a href="{{ route('guest.kontak') }}" class="nav-link {{ Route::is('guest.kontak') ? 'active' : '' }}">Kontak</a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition" id="mobileMenuBtn">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div class="md:hidden hidden mt-4 pb-4 border-t border-gray-200" id="mobileMenu">
                <div class="flex flex-col gap-2 pt-4">
                    <a href="{{ route('guest.beranda') }}" class="nav-link {{ Route::is('guest.beranda') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('guest.lapor') }}" class="nav-link {{ Route::is('guest.lapor') ? 'active' : '' }}">Lapor</a>
                    <a href="{{ route('guest.cek-status') }}" class="nav-link {{ Route::is('guest.cek-status') ? 'active' : '' }}">Cek Status</a>
                    <a href="{{ route('guest.panduan') }}" class="nav-link {{ Route::is('guest.panduan') ? 'active' : '' }}">Panduan</a>
                    <a href="{{ route('guest.kontak') }}" class="nav-link {{ Route::is('guest.kontak') ? 'active' : '' }}">Kontak</a>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white">
        <!-- Main Footer -->
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- About -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-white/80">WBS</h3>
                            <p class="text-xs text-gray-400">{{ config('app.company_name') }}</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Sistem pelaporan pelanggaran untuk menjaga integritas dan tata kelola yang baik di lingkungan {{ config('app.company_name') }}.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-semibold text-white/80 mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('guest.beranda') }}" class="text-gray-400 hover:text-white transition">Beranda</a></li>
                        <li><a href="{{ route('guest.lapor') }}" class="text-gray-400 hover:text-white transition">Buat Laporan</a></li>
                        <li><a href="{{ route('guest.cek-status') }}" class="text-gray-400 hover:text-white transition">Cek Status Laporan</a></li>
                        <li><a href="{{ route('guest.panduan') }}" class="text-gray-400 hover:text-white transition">Panduan Pelaporan</a></li>
                    </ul>
                </div>

                <!-- Information -->
                <div>
                    <h4 class="font-semibold text-white/80 mb-4">Informasi</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Perlindungan Pelapor</a></li>
                        <li><a href="{{ route('guest.kontak') }}" class="text-gray-400 hover:text-white transition">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-semibold text-white/80 mb-4">Kontak</h4>
                    <ul class="space-y-3 text-sm">
                        @foreach(config('app.company.address') as $address)
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="text-gray-400">{{ $address }}</span>
                            </li>
                        @endforeach
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="text-gray-400">{{ config('app.company.phone.kantor_pusat') }}</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-400">{{ config('app.company.email.pengaduan') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-800">
            <div class="container mx-auto px-4 py-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-sm text-gray-400">
                        &copy; 2026 Perumda BPR Bank Kota Kediri. All rights reserved.
                    </p>
                    <div class="flex items-center gap-4">
                        <a href="{{ config('app.company.social_media_links.facebook') }}" class="text-gray-400 hover:text-white transition">
                            <i class="bi bi-facebook text-xl"></i>
                        </a>
                        <a href="{{ config('app.company.social_media_links.instagram') }}" class="text-gray-400 hover:text-white transition">
                            <i class="bi bi-instagram text-xl"></i>
                        </a>
                        <a href="{{ config('app.company.social_media_links.whatsapp') }}" class="text-gray-400 hover:text-white transition">
                            <i class="bi bi-whatsapp text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Custom JS -->
    <script src="{{ asset('assets/lib/base/js/main.js') }}"></script>
    
    <!-- Page Specific JS -->
    <script>
        $(document).ready(function() {
            // Mobile menu toggle
            $('#mobileMenuBtn').on('click', function() {
                $('#mobileMenu').toggleClass('hidden');
            });
        });
    </script>

    @stack('scripts')
</body>
</html>