<div class="card p-8 mb-8 relative" id="searchCard">
    <div class="text-center mb-6">
        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Masukkan Kode Tracking</h2>
        <p class="text-gray-600">Kode tracking terdiri dari 12 karakter (contoh: WBS-XXXXXXXX)</p>
    </div>

    <form id="trackingForm" class="space-y-4">
        <div class="relative">
            <input type="text" 
                    id="trackingInput" 
                    class="form-control text-center text-lg font-mono tracking-widest uppercase py-4" 
                    placeholder="WBS-XXXXXXXX" 
                    maxlength="12"
                    required>
            <div class="invalid-feedback text-center">Kode tracking wajib diisi</div>
        </div>
        <button type="submit" class="btn btn-primary w-full py-4 text-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            Lacak Status
        </button>
    </form>

    <div class="mt-6 pt-6 border-t border-gray-200 text-center">
        <p class="text-sm text-gray-500 mb-3">Belum punya kode tracking?</p>
        <a href="{{ route('guest.lapor') }}" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center gap-2">
            Buat Laporan Baru
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
        </a>
    </div>

    {{-- Overlay: Dalam tahap pengembangan --}}
    <x-overlay.in-development-card />
</div>