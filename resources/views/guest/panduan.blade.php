@extends('layouts.guest')

@push('styles')
    <style>
        /* Page-specific styles */
        .faq-item {
            border: 1px solid #E5E7EB;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-color: #1E6FB8;
        }

        .faq-item.active {
            border-color: #1E6FB8;
            box-shadow: 0 4px 6px -1px rgba(30, 111, 184, 0.1);
        }

        .faq-question {
            padding: 1.25rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            background: white;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: #F0F7FF;
        }

        .faq-item.active .faq-question {
            background: #E6F0F9;
        }

        .faq-question h3 {
            font-weight: 600;
            color: #1F2937;
            flex: 1;
        }

        .faq-icon {
            width: 24px;
            height: 24px;
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .faq-answer-content {
            padding: 0 1.25rem 1.25rem;
            color: #4B5563;
            line-height: 1.7;
        }

        .guide-card {
            background: white;
            border-radius: 0.75rem;
            padding: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .guide-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-color: #1E6FB8;
        }

        .guide-icon {
            width: 64px;
            height: 64px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
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
                    <span class="text-white font-medium">Panduan Pelaporan</span>
                </nav>
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Panduan & FAQ</h1>
                <p class="text-white/90 text-lg">Informasi lengkap tentang cara melapor dan pertanyaan umum</p>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <main class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                
                <!-- GUIDE SECTION -->
                <section class="mb-16">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Panduan Pelaporan</h2>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                            Ikuti langkah-langkah berikut untuk membuat laporan yang efektif
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Guide 1 -->
                        <div class="guide-card">
                            <div class="guide-icon bg-blue-100">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">1. Persiapkan Informasi</h3>
                            <p class="text-gray-600">
                                Kumpulkan semua informasi relevan sebelum melapor: tanggal, lokasi, pihak terlibat, dan kronologi kejadian.
                            </p>
                        </div>

                        <!-- Guide 2 -->
                        <div class="guide-card">
                            <div class="guide-icon bg-green-100">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">2. Pilih Jenis Laporan</h3>
                            <p class="text-gray-600">
                                Tentukan apakah Anda ingin melapor secara anonim atau dengan identitas. Keduanya dijamin kerahasiaannya.
                            </p>
                        </div>

                        <!-- Guide 3 -->
                        <div class="guide-card">
                            <div class="guide-icon bg-yellow-100">
                                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">3. Isi Form dengan Detail</h3>
                            <p class="text-gray-600">
                                Jelaskan kronologi secara jelas dan objektif. Sertakan bukti pendukung jika ada untuk memperkuat laporan.
                            </p>
                        </div>

                        <!-- Guide 4 -->
                        <div class="guide-card">
                            <div class="guide-icon bg-purple-100">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">4. Simpan Kode Tracking</h3>
                            <p class="text-gray-600">
                                Setelah mengirim laporan, Anda akan mendapat kode tracking unik. Simpan dengan aman untuk memantau status.
                            </p>
                        </div>

                        <!-- Guide 5 -->
                        <div class="guide-card">
                            <div class="guide-icon bg-red-100">
                                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">5. Pantau Perkembangan</h3>
                            <p class="text-gray-600">
                                Gunakan kode tracking untuk mengecek status laporan Anda secara berkala di halaman Cek Status.
                            </p>
                        </div>

                        <!-- Guide 6 -->
                        <div class="guide-card">
                            <div class="guide-icon bg-indigo-100">
                                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">6. Kooperatif dengan Tim</h3>
                            <p class="text-gray-600">
                                Jika tim investigasi membutuhkan klarifikasi, berikan informasi tambahan untuk membantu proses investigasi.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- PROTECTION INFO -->
                <section class="mb-16">
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 md:p-12">
                        <div class="grid md:grid-cols-2 gap-8 items-center">
                            <div>
                                <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                    Perlindungan Pelapor
                                </div>
                                <h2 class="text-3xl font-bold text-gray-900 mb-4">Identitas Anda Aman Bersama Kami</h2>
                                <p class="text-gray-700 mb-6 leading-relaxed">
                                    Kami berkomitmen penuh untuk melindungi setiap pelapor dari segala bentuk ancaman, 
                                    intimidasi, atau tindakan balasan. Kerahasiaan identitas adalah prioritas utama kami.
                                </p>
                                <div class="space-y-3">
                                    <div class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span class="text-gray-700">Data terenkripsi dan disimpan dengan aman</span>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span class="text-gray-700">Akses terbatas hanya untuk tim investigasi</span>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span class="text-gray-700">Perlindungan hukum sesuai regulasi yang berlaku</span>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:flex justify-center">
                                <div class="relative">
                                    <div class="w-64 h-64 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                                        <svg class="w-32 h-32 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <div class="absolute -top-4 -right-4 w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- FAQ SECTION -->
                <section class="mb-16">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Pertanyaan Umum (FAQ)</h2>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                            Jawaban untuk pertanyaan yang sering diajukan tentang sistem pelaporan
                        </p>
                    </div>

                    <div class="max-w-3xl mx-auto">
                        <!-- FAQ 1 -->
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Apa itu Whistleblowing System (WBS)?</h3>
                                <svg class="faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Whistleblowing System (WBS) adalah saluran pelaporan yang memungkinkan karyawan, mitra kerja, 
                                    dan masyarakat umum untuk melaporkan dugaan pelanggaran secara aman dan rahasia. 
                                    Sistem ini bertujuan untuk mendeteksi dan mencegah pelanggaran lebih dini, 
                                    serta menciptakan lingkungan kerja yang bersih dan berintegritas.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Apa saja jenis pelanggaran yang bisa dilaporkan?</h3>
                                <svg class="faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Anda dapat melaporkan berbagai jenis pelanggaran, antara lain:
                                    <ul class="list-disc list-inside mt-2 space-y-1">
                                        <li>Kecurangan (fraud) dan korupsi</li>
                                        <li>Penggelapan aset perusahaan</li>
                                        <li>Penyuapan dan gratifikasi</li>
                                        <li>Konflik kepentingan</li>
                                        <li>Pelecehan, intimidasi, atau diskriminasi</li>
                                        <li>Pelanggaran prosedur dan regulasi</li>
                                        <li>Kebocoran informasi rahasia</li>
                                        <li>Pelanggaran kode etik perusahaan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Apakah saya bisa melapor secara anonim?</h3>
                                <svg class="faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    <strong>Ya, tentu saja!</strong> Anda memiliki pilihan untuk melapor secara anonim (tanpa mencantumkan identitas) 
                                    atau dengan identitas. Kedua opsi tersebut dijamin kerahasiaannya. 
                                    Namun, pelaporan dengan identitas dapat membantu tim investigasi dalam proses klarifikasi 
                                    dan tindak lanjut yang lebih efektif.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Bagaimana cara memantau status laporan saya?</h3>
                                <svg class="faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Setelah mengirim laporan, Anda akan menerima <strong>kode tracking unik</strong> (contoh: WBS-XXXXXXXX). 
                                    Simpan kode ini dengan aman. Anda dapat menggunakan kode tersebut di halaman 
                                    <a href="cek-status.html" class="text-blue-600 hover:text-blue-800 font-medium">Cek Status Laporan</a> 
                                    untuk memantau perkembangan laporan Anda secara real-time.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Berapa lama proses investigasi berlangsung?</h3>
                                <svg class="faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Durasi investigasi bervariasi tergantung kompleksitas kasus. Secara umum:
                                    <ul class="list-disc list-inside mt-2 space-y-1">
                                        <li><strong>Verifikasi awal:</strong> 1-3 hari kerja</li>
                                        <li><strong>Investigasi:</strong> 7-30 hari kerja</li>
                                        <li><strong>Tindak lanjut:</strong> Sesuai dengan hasil investigasi</li>
                                    </ul>
                                    Anda akan mendapat update status melalui halaman cek status laporan.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 6 -->
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Apakah saya akan mendapat perlindungan jika melapor?</h3>
                                <svg class="faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    <strong>Ya, absolutely!</strong> Kami memiliki kebijakan perlindungan pelapor yang ketat. 
                                    Setiap pelapor dilindungi dari:
                                    <ul class="list-disc list-inside mt-2 space-y-1">
                                        <li>PHAK atau tindakan disipliner yang tidak adil</li>
                                        <li>Intimidasi, ancaman, atau pelecehan</li>
                                        <li>Diskriminasi dalam bentuk apapun</li>
                                        <li>Tindakan balasan dari pihak yang dilaporkan</li>
                                    </ul>
                                    Perlindungan ini berlaku sesuai dengan regulasi dan hukum yang berlaku.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 7 -->
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Apa yang terjadi jika saya membuat laporan palsu?</h3>
                                <svg class="faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Pelaporan palsu atau fitnah yang dilakukan dengan sengaja dapat dikenakan sanksi sesuai 
                                    dengan ketentuan yang berlaku, termasuk tindakan hukum. Kami mendorong setiap pelapor 
                                    untuk menyampaikan informasi yang sebenar-benarnya berdasarkan fakta yang diketahui. 
                                    Namun, jika Anda melaporkan dengan niat baik (good faith) meskipun informasi tidak lengkap, 
                                    Anda tetap mendapat perlindungan.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 8 -->
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>File apa saja yang bisa dilampirkan sebagai bukti?</h3>
                                <svg class="faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Anda dapat melampirkan bukti dalam format:
                                    <ul class="list-disc list-inside mt-2 space-y-1">
                                        <li><strong>Gambar:</strong> JPG, PNG (maks. 10MB per file)</li>
                                        <li><strong>Dokumen:</strong> PDF, DOC, DOCX (maks. 10MB per file)</li>
                                    </ul>
                                    Maksimal 5 file yang dapat diupload dalam satu laporan. Pastikan file yang dilampirkan 
                                    relevan dengan laporan untuk membantu proses investigasi.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 9 -->
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Bagaimana jika saya lupa menyimpan kode tracking?</h3>
                                <svg class="faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Jika Anda melapor dengan identitas dan mencantumkan email, kami dapat mengirimkan kode tracking 
                                    ke email Anda. Namun, untuk laporan anonim, kode tracking adalah satu-satunya cara untuk 
                                    memantau status laporan. Oleh karena itu, <strong>sangat penting untuk menyimpan kode tracking 
                                    dengan aman</strong> segera setelah laporan dikirim.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 10 -->
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Siapa yang bisa mengakses data laporan saya?</h3>
                                <svg class="faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                            <div class="faq-answer">
                                <div class="faq-answer-content">
                                    Data laporan Anda hanya dapat diakses oleh <strong>tim investigasi WBS yang berwenang</strong> 
                                    dan telah melalui proses verifikasi keamanan. Akses dibatasi secara ketat dan dicatat 
                                    dalam sistem audit trail. Tidak ada pihak lain yang dapat mengakses data laporan Anda 
                                    tanpa persetujuan yang sah sesuai dengan kebijakan privasi perusahaan.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- CTA SECTION -->
                <section class="bg-gradient-to-br from-blue-700 to-blue-900 rounded-2xl p-8 md:p-12 text-center">
                    <h2 class="text-3xl font-bold text-white mb-4">Masih Ada Pertanyaan?</h2>
                    <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">
                        Jika Anda memiliki pertanyaan lain atau membutuhkan bantuan, jangan ragu untuk menghubungi kami
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="kontak.html" class="btn bg-white text-blue-700 hover:bg-gray-100 px-8 py-4 text-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Hubungi Kami
                        </a>
                        <a href="lapor.html" class="btn bg-white/10 backdrop-blur-sm text-white border-white/30 hover:bg-white/20 px-8 py-4 text-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Buat Laporan
                        </a>
                    </div>
                </section>

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

            // FAQ Accordion
            $('.faq-question').on('click', function() {
                const $item = $(this).closest('.faq-item');
                const $answer = $item.find('.faq-answer');
                const isActive = $item.hasClass('active');

                // Close all FAQ items
                $('.faq-item').removeClass('active');
                $('.faq-answer').css('max-height', '0');

                // Open clicked item if it wasn't active
                if (!isActive) {
                    $item.addClass('active');
                    $answer.css('max-height', $answer[0].scrollHeight + 'px');
                }
            });

            // Open first FAQ by default
            $('.faq-item').first().addClass('active');
            $('.faq-item').first().find('.faq-answer').css('max-height', 
                $('.faq-item').first().find('.faq-answer')[0].scrollHeight + 'px'
            );
        });
    </script>
@endpush