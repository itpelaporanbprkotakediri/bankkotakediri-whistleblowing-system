@extends('layouts.app', $breadcrumbs = [
    [
        'label' => 'Dashboard',
        'url' => route('dashboard'),
    ]
])

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Dashboard</h1>
            <p class="text-gray-500 mt-1">Selamat datang kembali, Admin! Berikut ringkasan sistem WBS.</p>
        </div>
        <div class="flex items-center gap-2">
            <select class="form-control text-sm py-2 px-3 w-auto">
                <option>7 Hari Terakhir</option>
                <option selected>30 Hari Terakhir</option>
                <option>3 Bulan Terakhir</option>
                <option>Tahun Ini</option>
            </select>
            <button class="btn btn-primary text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Export
            </button>
        </div>
    </div>

    <!-- STATISTICS CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Laporan -->
        <div class="stat-card primary">
            <div class="flex items-center justify-between mb-4">
                <div class="stat-icon bg-blue-100">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-full flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                    </svg>
                    +12.5%
                </span>
            </div>
            <div>
                <p class="text-sm text-gray-500 mb-1">Total Laporan</p>
                <h3 class="text-3xl font-bold text-gray-900">156</h3>
                <p class="text-xs text-gray-400 mt-1">+18 dari bulan lalu</p>
            </div>
        </div>

        <!-- Pending -->
        <div class="stat-card warning">
            <div class="flex items-center justify-between mb-4">
                <div class="stat-icon bg-yellow-100">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-yellow-600 bg-yellow-50 px-2 py-1 rounded-full">
                    Perlu Aksi
                </span>
            </div>
            <div>
                <p class="text-sm text-gray-500 mb-1">Menunggu Verifikasi</p>
                <h3 class="text-3xl font-bold text-gray-900">12</h3>
                <p class="text-xs text-gray-400 mt-1">Rata-rata 2 hari</p>
            </div>
        </div>

        <!-- Diproses -->
        <div class="stat-card info">
            <div class="flex items-center justify-between mb-4">
                <div class="stat-icon bg-blue-100">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded-full">
                    Aktif
                </span>
            </div>
            <div>
                <p class="text-sm text-gray-500 mb-1">Sedang Diproses</p>
                <h3 class="text-3xl font-bold text-gray-900">8</h3>
                <p class="text-xs text-gray-400 mt-1">5 investigasi berjalan</p>
            </div>
        </div>

        <!-- Selesai -->
        <div class="stat-card success">
            <div class="flex items-center justify-between mb-4">
                <div class="stat-icon bg-green-100">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-full flex items-center gap-1">
                    98%
                </span>
            </div>
            <div>
                <p class="text-sm text-gray-500 mb-1">Laporan Selesai</p>
                <h3 class="text-3xl font-bold text-gray-900">136</h3>
                <p class="text-xs text-gray-400 mt-1">Tingkat penyelesaian tinggi</p>
            </div>
        </div>
    </div>

    <!-- CHARTS SECTION -->
    <div class="grid lg:grid-cols-3 gap-6 mb-6">
        <!-- Bar Chart: Laporan per Bulan -->
        <div class="chart-container lg:col-span-2">
            <div class="chart-header">
                <div>
                    <h3 class="chart-title">Tren Laporan Masuk</h3>
                    <p class="text-sm text-gray-500">Jumlah laporan per bulan (2026)</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="flex items-center gap-1 text-xs text-gray-500">
                        <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                        Laporan
                    </span>
                    <span class="flex items-center gap-1 text-xs text-gray-500">
                        <span class="w-3 h-3 rounded-full bg-green-500"></span>
                        Selesai
                    </span>
                </div>
            </div>
            <div class="relative" style="height: 300px;">
                <canvas id="monthlyChart"></canvas>
            </div>
        </div>

        <!-- Donut Chart: Kategori -->
        <div class="chart-container">
            <div class="chart-header">
                <div>
                    <h3 class="chart-title">Kategori Pelanggaran</h3>
                    <p class="text-sm text-gray-500">Distribusi laporan</p>
                </div>
            </div>
            <div class="relative" style="height: 220px;">
                <canvas id="categoryChart"></canvas>
            </div>
            <div class="mt-4 space-y-2">
                <div class="flex items-center justify-between text-sm">
                    <span class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                        Kecurangan
                    </span>
                    <span class="font-semibold text-gray-700">35%</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-red-500"></span>
                        Korupsi
                    </span>
                    <span class="font-semibold text-gray-700">25%</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                        Penggelapan
                    </span>
                    <span class="font-semibold text-gray-700">20%</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-purple-500"></span>
                        Lainnya
                    </span>
                    <span class="font-semibold text-gray-700">20%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- BOTTOM SECTION: Recent Reports & Quick Actions -->
    <div class="grid lg:grid-cols-3 gap-6">
        
        <!-- Recent Reports Table -->
        <div class="chart-container lg:col-span-2">
            <div class="chart-header">
                <div>
                    <h3 class="chart-title">Laporan Terbaru</h3>
                    <p class="text-sm text-gray-500">5 laporan yang baru masuk</p>
                </div>
                <a href="laporan.html" class="text-sm text-blue-600 hover:text-blue-800 font-medium inline-flex items-center gap-1">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="font-mono text-sm font-semibold text-blue-600">WBS-A7K2M9P3</span>
                            </td>
                            <td>
                                <span class="text-sm text-gray-700">Kecurangan</span>
                            </td>
                            <td class="text-sm text-gray-600">06 Jul 2026</td>
                            <td>
                                <span class="badge badge-warning">
                                    <span class="status-dot warning"></span>
                                    Pending
                                </span>
                            </td>
                            <td>
                                <a href="laporan-detail.html" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="font-mono text-sm font-semibold text-blue-600">WBS-B3N8Q1R5</span>
                            </td>
                            <td>
                                <span class="text-sm text-gray-700">Korupsi</span>
                            </td>
                            <td class="text-sm text-gray-600">05 Jul 2026</td>
                            <td>
                                <span class="badge badge-info">
                                    <span class="status-dot info"></span>
                                    Investigasi
                                </span>
                            </td>
                            <td>
                                <a href="laporan-detail.html" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="font-mono text-sm font-semibold text-blue-600">WBS-C9P2T6W4</span>
                            </td>
                            <td>
                                <span class="text-sm text-gray-700">Penggelapan</span>
                            </td>
                            <td class="text-sm text-gray-600">04 Jul 2026</td>
                            <td>
                                <span class="badge badge-info">
                                    <span class="status-dot info"></span>
                                    Investigasi
                                </span>
                            </td>
                            <td>
                                <a href="laporan-detail.html" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="font-mono text-sm font-semibold text-blue-600">WBS-D5H7J2K8</span>
                            </td>
                            <td>
                                <span class="text-sm text-gray-700">Konflik Kepentingan</span>
                            </td>
                            <td class="text-sm text-gray-600">03 Jul 2026</td>
                            <td>
                                <span class="badge badge-success">
                                    <span class="status-dot success"></span>
                                    Selesai
                                </span>
                            </td>
                            <td>
                                <a href="laporan-detail.html" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="font-mono text-sm font-semibold text-blue-600">WBS-E1L4M6N9</span>
                            </td>
                            <td>
                                <span class="text-sm text-gray-700">Pelecehan</span>
                            </td>
                            <td class="text-sm text-gray-600">02 Jul 2026</td>
                            <td>
                                <span class="badge badge-success">
                                    <span class="status-dot success"></span>
                                    Selesai
                                </span>
                            </td>
                            <td>
                                <a href="laporan-detail.html" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Detail</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right Column: Quick Actions + Activity -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="chart-container">
                <div class="chart-header">
                    <h3 class="chart-title">Aksi Cepat</h3>
                </div>
                <div class="space-y-3">
                    <a href="laporan.html" class="quick-action-btn">
                        <div class="quick-action-icon bg-blue-100">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Lihat Semua Laporan</p>
                            <p class="text-xs text-gray-500">156 laporan total</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>

                    <a href="users.html" class="quick-action-btn">
                        <div class="quick-action-icon bg-green-100">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Kelola Pengguna</p>
                            <p class="text-xs text-gray-500">8 admin aktif</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>

                    <a href="settings.html" class="quick-action-btn">
                        <div class="quick-action-icon bg-purple-100">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-900">Pengaturan Sistem</p>
                            <p class="text-xs text-gray-500">Konfigurasi WBS</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="chart-container">
                <div class="chart-header">
                    <h3 class="chart-title">Aktivitas Terbaru</h3>
                </div>
                <div>
                    <div class="activity-item">
                        <div class="activity-icon bg-yellow-100">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-900 font-medium">Laporan baru masuk</p>
                            <p class="text-xs text-gray-500 truncate">WBS-A7K2M9P3 - Kecurangan</p>
                            <p class="text-xs text-gray-400 mt-1">5 menit lalu</p>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon bg-blue-100">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-900 font-medium">Investigasi dimulai</p>
                            <p class="text-xs text-gray-500 truncate">WBS-B3N8Q1R5 oleh Admin</p>
                            <p class="text-xs text-gray-400 mt-1">1 jam lalu</p>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon bg-green-100">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-900 font-medium">Laporan diselesaikan</p>
                            <p class="text-xs text-gray-500 truncate">WBS-D5H7J2K8 - Selesai</p>
                            <p class="text-xs text-gray-400 mt-1">3 jam lalu</p>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon bg-purple-100">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-900 font-medium">Admin baru ditambahkan</p>
                            <p class="text-xs text-gray-500 truncate">budi.santoso@bprkediri.co.id</p>
                            <p class="text-xs text-gray-400 mt-1">Kemarin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // ========================================
        // CHART: Monthly Reports (Bar Chart)
        // ========================================
        const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
        new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
                datasets: [{
                        label: 'Laporan Masuk',
                        data: [18, 22, 15, 28, 24, 31, 18],
                        backgroundColor: 'rgba(30, 111, 184, 0.8)',
                        borderColor: '#1E6FB8',
                        borderWidth: 1,
                        borderRadius: 6,
                        barPercentage: 0.6,
                    },
                    {
                        label: 'Laporan Selesai',
                        data: [16, 20, 14, 26, 22, 29, 15],
                        backgroundColor: 'rgba(16, 185, 129, 0.8)',
                        borderColor: '#10B981',
                        borderWidth: 1,
                        borderRadius: 6,
                        barPercentage: 0.6,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1F2937',
                        titleFont: {
                            family: 'Outfit',
                            size: 13
                        },
                        bodyFont: {
                            family: 'Outfit',
                            size: 12
                        },
                        padding: 12,
                        cornerRadius: 8,
                        displayColors: true,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)',
                            drawBorder: false,
                        },
                        ticks: {
                            font: {
                                family: 'Outfit',
                                size: 11
                            },
                            color: '#6B7280',
                            stepSize: 10,
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                            font: {
                                family: 'Outfit',
                                size: 11
                            },
                            color: '#6B7280',
                        }
                    }
                }
            }
        });

        // ========================================
        // CHART: Category (Doughnut Chart)
        // ========================================
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['Kecurangan', 'Korupsi', 'Penggelapan', 'Lainnya'],
                datasets: [{
                    data: [35, 25, 20, 20],
                    backgroundColor: [
                        '#3B82F6',
                        '#EF4444',
                        '#F59E0B',
                        '#A855F7',
                    ],
                    borderWidth: 0,
                    hoverOffset: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1F2937',
                        titleFont: {
                            family: 'Outfit',
                            size: 13
                        },
                        bodyFont: {
                            family: 'Outfit',
                            size: 12
                        },
                        padding: 12,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.parsed + '%';
                            }
                        }
                    }
                }
            }
        });
    </script>
@endpush
