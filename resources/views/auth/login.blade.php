@extends('layouts.auth')

@section('contents')
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang Kembali</h2>
        <p class="text-gray-500">Silakan masuk untuk mengakses panel administrasi</p>
    </div>

    <form id="loginForm" novalidate>
        <!-- Email / Username -->
        <x-forms.input
            icon="custom_username"
            id="username"
            name="username"
            label="Email atau Username"
            placeholder="Masukkan email atau username"
            required="true"
        />

        <!-- Password -->
        <x-forms.password-input />

        <!-- Remember Me -->
        <div class="flex items-center justify-between mb-6">
            <label class="custom-checkbox">
                <input type="checkbox" name="remember" class="w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                <span class="text-sm text-gray-600">Ingat saya</span>
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-full py-3 text-lg mb-4" id="loginBtn">
            <span id="btnText">Masuk</span>
            <span id="btnLoader" class="loading-spinner hidden"></span>
        </button>

        <!-- Back to Public Site -->
        <div class="text-center pt-4 border-t border-gray-200">
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-blue-600 transition inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Halaman Utama
            </a>
        </div>
    </form>
@endsection

@push('scripts')
    <!-- Page Specific JS -->
    <script>
        $(document).ready(function() {
            // Form Submission
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();

                if (!WBS.FormValidator.validate(this)) {
                    WBS.Toast.error('Login Gagal', 'Mohon masukkan email dan password');
                    return;
                }

                // Show loading state
                const btn = $('#loginBtn');
                const btnText = $('#btnText');
                const btnLoader = $('#btnLoader');
                
                btn.prop('disabled', true);
                btnText.text('Memverifikasi...');
                btnLoader.removeClass('hidden');

                // ajax
                $.ajax({
                    url: '{{ route("login") }}',
                    type: 'POST',
                    data: $('#loginForm').serialize(),
                    beforeSend: function() {
                        btn.prop('disabled', true);
                        btnText.text('Memverifikasi...');
                        btnLoader.removeClass('hidden');
                    },
                    success: function(response) {
                        WBS.Toast.success('Login Berhasil', 'Mengalihkan ke dashboard...');
                        setTimeout(function() {
                            window.location.href = '{{ route("dashboard") }}';
                        }, 500);
                        btnText.text('Masuk');
                    },
                    error: function(error) {
                        let errorMsg = 'Terjadi kesalahan saat login. Silahkan coba lagi.';
                        
                        // jika xhr bukan ajax error, tampilkan error
                        if (error.responseJSON && error.responseJSON.message) {
                            errorMsg = error.responseJSON.message;
                        }

                        btn.prop('disabled', false);
                        btnText.text('Masuk');
                        btnLoader.addClass('hidden');
                        WBS.Toast.error('Login Gagal', errorMsg);
                    }
                });
            });
        });
    </script>
@endpush