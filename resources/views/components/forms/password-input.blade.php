@props([
    'name' => 'password',
    'id' => 'password',
    'label' => 'Password',
    'min' => 6,
    'required' => true,
    'placeholder' => 'Masukkan password',
    'forgot_password_url' => null,
    'icon' => true,
])

<div class="form-group">
    <div class="flex items-center justify-between mb-2">
        <label class="form-label mb-0">{{ $label }} @if($required)<span class="required">*</span>@endif</label>
        @if ($forgot_password_url)
            <a href="{{ $forgot_password_url }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Lupa password?</a>
        @endif
    </div>
    <div class="relative">
        @if($icon)
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </span>
        @endif
        <input type="password" 
                class="form-control @if($icon) pl-10 @endif pr-10" 
                name="{{ $name }}" 
                id="{{ $id }}"
                placeholder="{{ $placeholder }}" 
                minlength="{{ $min }}"
                @if($required) required @endif>
        <span class="password-toggle" id="togglePassword_{{ $id }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="eyeIcon">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
        </span>
    </div>
    <div class="invalid-feedback">Password wajib diisi</div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Toggle Password Visibility
            $('#togglePassword_{{ $id }}').on('click', function() {
                const passwordInput = $('#{{ $id }}');
                const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
                passwordInput.attr('type', type);
                
                // Toggle icon
                if (type === 'text') {
                    $(this).html(`
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    `);
                } else {
                    $(this).html(`
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    `);
                }
            });
        });
    </script>
@endpush