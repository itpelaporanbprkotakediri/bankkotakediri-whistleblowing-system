<div id="resultSection" class="hidden fade-in">
    
    <!-- Report Summary Card -->
    <div class="card p-6 mb-6">
        <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
            <div>
                <p class="text-sm text-gray-500 mb-1">Kode Tracking</p>
                <div class="flex items-center gap-3">
                    <span class="tracking-code text-xl" id="displayTrackingCode">WBS-XXXXXXXX</span>
                    <button class="copy-btn text-gray-400 hover:text-blue-600 transition" data-copy="" title="Salin kode">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3 3m-3-3l3-3"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500 mb-1">Status Saat Ini</p>
                <span class="badge badge-warning text-sm px-4 py-2" id="currentStatusBadge">Sedang Diproses</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
            <div>
                <p class="text-gray-500 mb-1">Tanggal Lapor</p>
                <p class="font-semibold text-gray-900" id="reportDate">-</p>
            </div>
            <div>
                <p class="text-gray-500 mb-1">Kategori</p>
                <p class="font-semibold text-gray-900" id="reportCategory">-</p>
            </div>
            <div>
                <p class="text-gray-500 mb-1">Estimasi Selesai</p>
                <p class="font-semibold text-gray-900" id="estimatedDate">-</p>
            </div>
        </div>
    </div>

    <!-- Timeline Progress -->
    <div class="card p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-6">Riwayat Perkembangan</h3>
        
        <div class="relative" id="timelineContainer">
            <!-- Timeline items will be injected here by jQuery -->
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-col sm:flex-row gap-4 mt-6">
        <button type="button" id="btnNewSearch" class="btn btn-secondary flex-1">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Lacak Laporan Lain
        </button>
        <a href="{{ route('guest.kontak') }}" class="btn btn-primary flex-1 justify-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Hubungi Admin
        </a>
    </div>
</div>