@extends('layouts.guest')

@push('styles')
    <style>
        /* Page-specific styles */
        .contact-info-card {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #E5E7EB;
        }

        .contact-info-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-color: #1E6FB8;
        }

        .contact-icon {
            width: 48px;
            height: 48px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .map-container {
            background: #E5E7EB;
            border-radius: 0.75rem;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .map-placeholder-pattern {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: 
                linear-gradient(45deg, #F3F4F6 25%, transparent 25%), 
                linear-gradient(-45deg, #F3F4F6 25%, transparent 25%), 
                linear-gradient(45deg, transparent 75%, #F3F4F6 75%), 
                linear-gradient(-45deg, transparent 75%, #F3F4F6 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
            opacity: 0.5;
        }
    </style>
@endpush

@section('content')
    <section class="bg-gradient-to-br from-blue-700 to-blue-900 py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <nav class="flex items-center gap-2 text-sm text-white/80 mb-4">
                    <a href="{{ route('guest.beranda') }}" class="hover:text-white transition">Beranda</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-white font-medium">Kontak Kami</span>
                </nav>
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Hubungi Kami</h1>
                <p class="text-white/90 text-lg">Kami siap membantu dan menerima masukan Anda</p>
            </div>
        </div>
    </section>

    <main class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Important Notice -->
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8 rounded-r-lg border">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-yellow-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-yellow-900 mb-1">Catatan Penting</h3>
                            <p class="text-sm text-yellow-800">
                                Halaman ini untuk <strong>pertanyaan umum</strong> seputar sistem WBS. 
                                Jika Anda ingin <strong>melaporkan pelanggaran</strong>, silakan gunakan halaman 
                                <a href="{{ route('guest.lapor') }}" class="font-bold underline hover:text-yellow-900">Buat Laporan</a> 
                                untuk menjamin kerahasiaan dan keamanan data Anda.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid lg:grid-cols-3 gap-8 mb-12">
                    <!-- Contact Info -->
                    <div class="lg:col-span-1 space-y-6">
                        <div class="contact-info-card">
                            <div class="flex items-start gap-4">
                                <div class="contact-icon bg-blue-100">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">Alamat Kantor Pusat</h3>
                                    <p class="text-sm text-gray-600 leading-relaxed">
                                        {{ config('app.company.address.kantor_pusat') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="contact-info-card">
                            <div class="flex items-start gap-4">
                                <div class="contact-icon bg-blue-100">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">Alamat Kantor Cabang Ngawi</h3>
                                    <p class="text-sm text-gray-600 leading-relaxed">
                                        {{ config('app.company.address.kantor_cabang_ngawi') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="contact-info-card">
                            <div class="flex items-start gap-4">
                                <div class="contact-icon bg-green-100">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">Telepon</h3>
                                    <p class="text-sm text-gray-600">{{ config('app.company.phone.kantor_pusat') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="contact-info-card">
                            <div class="flex items-start gap-4">
                                <div class="contact-icon bg-purple-100">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">Email</h3>
                                    <p class="text-sm text-gray-600">{{ config('app.company.email.pengaduan') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="contact-info-card">
                            <div class="flex items-start gap-4">
                                <div class="contact-icon bg-yellow-100">
                                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">Jam Operasional</h3>
                                    <p class="text-sm text-gray-600">{{ config('app.company.jam_operasional.hari_mulai') }} - {{ config('app.company.jam_operasional.hari_selesai') }}</p>
                                    <p class="text-sm text-gray-600 font-semibold">{{ config('app.company.jam_operasional.jam_buka') }} - {{ config('app.company.jam_operasional.jam_tutup') }} WIB</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="lg:col-span-2 relative">
                        <div class="bg-white rounded-xl shadow-md p-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">Kirim Pesan</h2>
                            <p class="text-gray-600 mb-6">Punya pertanyaan seputar sistem WBS? Kirim pesan kepada kami.</p>

                            <form id="contactForm" novalidate>
                                <div class="grid md:grid-cols-2 gap-4 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Nama Lengkap <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Masukkan nama Anda" required>
                                        <div class="invalid-feedback">Nama wajib diisi</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email <span class="required">*</span></label>
                                        <input type="email" class="form-control" name="email" placeholder="nama@email.com" required>
                                        <div class="invalid-feedback">Email wajib diisi dengan format benar</div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label">Nomor Telepon</label>
                                    <input type="tel" class="form-control" name="phone" placeholder="Contoh: 08123456789">
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label">Subjek <span class="required">*</span></label>
                                    <select class="form-control" name="subject" required>
                                        <option value="">-- Pilih Subjek --</option>
                                        <option value="info">Pertanyaan Informasi</option>
                                        <option value="technical">Kendala Teknis</option>
                                        <option value="suggestion">Saran & Masukan</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback">Subjek wajib dipilih</div>
                                </div>

                                <div class="form-group mb-6">
                                    <label class="form-label">Pesan <span class="required">*</span></label>
                                    <textarea class="form-control" name="message" rows="4" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                                    <div class="invalid-feedback">Pesan wajib diisi</div>
                                </div>

                                <button type="submit" class="btn btn-primary w-full md:w-auto px-8 py-3" disabled>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                    </svg>
                                    Kirim Pesan
                                </button>
                            </form>
                        </div>
                        {{-- Overlay: Dalam tahap pengembangan --}}
                        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center rounded-xl">
                            <div class="bg-white p-6 rounded-xl text-center">
                                <div class="flex justify-center mb-4">
                                    <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h2 class="text-xl font-bold text-gray-900 mb-3">Fitur Masih Dalam Tahap Pengembangan</h2>
                                <p class="text-sm text-gray-600">Mohon maaf, fitur pengiriman pesan masih dalam tahap pengembangan. Silahkan coba lagi nanti.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Mobile menu toggle
            $('#mobileMenuBtn').on('click', function() {
                $('#mobileMenu').toggleClass('hidden');
            });

            // Contact Form Submission
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();

                if (!WBS.FormValidator.validate(this)) {
                    WBS.Toast.error('Validasi Gagal', 'Mohon lengkapi semua field yang wajib diisi');
                    return;
                }

                WBS.Loading.show();

                // Simulate API call
                // setTimeout(function() {
                //     WBS.Loading.hide();
                //     WBS.Toast.success('Pesan Terkirim', 'Terima kasih, pesan Anda akan segera kami balas.');
                //     $('#contactForm')[0].reset();
                // }, 1500);
                
                WBS.Toast.error('Pesan Gagal Terkirim', 'Fitur masih dalam tahap pengembangan');
                WBS.Loading.hide();
            });
        });
    </script>
@endpush