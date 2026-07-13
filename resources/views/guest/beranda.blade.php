@extends('layouts.guest', ['pageTitle' => 'Beranda'])

@section('content')
    <!-- HERO SECTION -->
    <section class="hero-section py-20 md:py-32">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span class="text-sm text-white/90">Sistem Aktif 24/7</span>
                </div>
                
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    Bersama Menjaga <br>
                    <span class="text-yellow-300">Integritas & Tata Kelola</span>
                </h1>
                
                <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    Laporkan pelanggaran secara aman, rahasia, dan profesional. 
                    Identitas Anda dilindungi sepenuhnya.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#" class="btn bg-white text-blue-800 hover:bg-gray-100 px-8 py-4 text-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Buat Laporan
                    </a>
                    <a href="#" class="btn btn-secondary bg-white/10 backdrop-blur-sm text-white border-white/30 hover:bg-white/20 px-8 py-4 text-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Cek Status Laporan
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- STATISTICS SECTION -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-blue-600 mb-2">
                        <span class="counter" data-target="156">0</span>
                    </div>
                    <p class="text-gray-600">Laporan Diterima</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-green-600 mb-2">
                        <span class="counter" data-target="142">0</span>
                    </div>
                    <p class="text-gray-600">Laporan Ditindaklanjuti</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-yellow-600 mb-2">
                        <span class="counter" data-target="98">0</span>%
                    </div>
                    <p class="text-gray-600">Tingkat Penyelesaian</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-purple-600 mb-2">
                        <span class="counter" data-target="100">0</span>%
                    </div>
                    <p class="text-gray-600">Kerahasiaan Terjaga</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Kenapa Melapor Lewat WBS?
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Sistem kami dirancang untuk memberikan perlindungan maksimal bagi pelapor
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="card card-hover">
                    <div class="card-body text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">100% Rahasia</h3>
                        <p class="text-gray-600">
                            Identitas pelapor dilindungi sepenuhnya. Anda bisa memilih untuk melapor secara anonim.
                        </p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="card card-hover">
                    <div class="card-body text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Profesional</h3>
                        <p class="text-gray-600">
                            Setiap laporan ditangani oleh tim khusus yang berkompeten dan berintegritas.
                        </p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="card card-hover">
                    <div class="card-body text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Cepat & Transparan</h3>
                        <p class="text-gray-600">
                            Pantau perkembangan laporan Anda secara real-time dengan kode tracking unik.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS SECTION -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Cara Melapor
                </h2>
                <p class="text-lg text-gray-600">
                    Proses pelaporan yang mudah dan cepat
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center relative">
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <span class="text-3xl font-bold text-white">1</span>
                        </div>
                    </div>
                    <!-- Connector Line (behind circle) -->
                    <div class="hidden md:block absolute top-10 left-full w-full h-0.5 bg-blue-200 -translate-x-1/2 z-0"></div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 relative z-10">Isi Form Laporan</h3>
                    <p class="text-gray-600 text-sm relative z-10">
                        Lengkapi form pelaporan dengan detail kejadian
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center relative">
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <span class="text-3xl font-bold text-white">2</span>
                        </div>
                    </div>
                    <!-- Connector Line (behind circle) -->
                    <div class="hidden md:block absolute top-10 left-full w-full h-0.5 bg-blue-200 -translate-x-1/2 z-0"></div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 relative z-10">Dapatkan Kode Tracking</h3>
                    <p class="text-gray-600 text-sm relative z-10">
                        Simpan kode unik untuk memantau status laporan
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="text-center relative">
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <span class="text-3xl font-bold text-white">3</span>
                        </div>
                    </div>
                    <!-- Connector Line (behind circle) -->
                    <div class="hidden md:block absolute top-10 left-full w-full h-0.5 bg-blue-200 -translate-x-1/2 z-0"></div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 relative z-10">Verifikasi & Investigasi</h3>
                    <p class="text-gray-600 text-sm relative z-10">
                        Tim kami akan memverifikasi dan menindaklanjuti
                    </p>
                </div>

                <!-- Step 4 (Last - no connector) -->
                <div class="text-center relative">
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <span class="text-3xl font-bold text-white">4</span>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 relative z-10">Pantau Perkembangan</h3>
                    <p class="text-gray-600 text-sm relative z-10">
                        Cek status laporan kapan saja dengan kode tracking
                    </p>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="#" class="btn btn-primary px-8 py-4 text-lg">
                    Mulai Melapor Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="py-20 bg-gradient-to-br from-blue-700 to-blue-900">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Jangan Diam! Laporkan Sekarang
                </h2>
                <p class="text-xl text-white/90 mb-8">
                    Setiap laporan Anda berkontribusi untuk menciptakan lingkungan kerja yang bersih dan profesional
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#" class="btn bg-white text-blue-700 hover:bg-gray-100 px-8 py-4 text-lg">
                        Buat Laporan
                    </a>
                    <a href="#" class="btn bg-white/10 backdrop-blur-sm text-white border-white/30 hover:bg-white/20 px-8 py-4 text-lg">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection