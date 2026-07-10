@props([
    'name', 
    'label', 
    'placeholder' => '', 
    'value' => '', 
    'required' => false, 
    'icon' => null
])
<div class="form-group">
    <label class="form-label">{{ $label }} @if($required)<span class="required">*</span>@endif</label>
    <div class="relative">
        @if($icon)
            @if($icon === 'custom_username')
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </span>
            @elseif($icon === 'custom_email')
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </span>
            @else
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    <i class="bi bi-{{ $icon }}"></i>
                </span>
            @endif
        @endif
        <input type="text" 
                class="form-control @if($icon) pl-10 @endif" 
                name="{{ $name }}" 
                placeholder="{{ $placeholder }}" 
                value="{{ old($name, $value) }}" 
                @if($required) required @endif>
    </div>
    <div class="invalid-feedback">{{ $label }} wajib diisi</div>
</div>