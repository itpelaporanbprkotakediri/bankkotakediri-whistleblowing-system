@props([
    'title' => 'Fitur Masih Dalam Tahap Pengembangan',
    'message' => 'Mohon maaf, fitur masih dalam tahap pengembangan. Silahkan coba lagi nanti.'
])

<div class="absolute inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center rounded-xl">
    <div class="bg-white p-6 rounded-xl text-center">
        <div class="flex justify-center mb-4">
            <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h2 class="text-xl font-bold text-gray-900 mb-3">{{ $title }}</h2>
        <p class="text-sm text-gray-600">{{ $message }}</p>
    </div>
</div>