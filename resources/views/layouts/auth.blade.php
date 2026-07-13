<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Login - {{ config('app.name', 'Laravel') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/logo-bpr-kota-square.ico') }}">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/lib/base/css/style.css') }}">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        /* Page-specific styles */
        .login-container {
            min-height: 100vh;
        }

        .form-side {
            background-color: white;
        }

        .branding-side {
            background: linear-gradient(135deg, var(--primary-700) 0%, var(--primary-900) 100%);
            position: relative;
            overflow: hidden;
        }

        .branding-side::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }

        .branding-pattern {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #9CA3AF;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: #4B5563;
        }

        .form-container {
            max-width: 480px;
            margin: 0 auto;
            padding: 2rem;
        }

        @media (min-width: 1024px) {
            .form-container {
                padding: 3rem;
            }
        }
    </style>
</head>
<body>

    <div class="login-container flex flex-col lg:flex-row">
        
        <!-- LEFT SIDE: Login Form -->
        <div class="form-side w-full lg:w-1/2 flex items-center justify-center">
            <div class="form-container w-full">
                <!-- Logo -->
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">Whistleblowing System</h1>
                        <p class="text-xs text-gray-500">{{ config('app.company.name') }}</p>
                    </div>
                </div>

                @yield('content')
            </div>
        </div>

        <!-- RIGHT SIDE: Branding -->
        <div class="branding-side hidden lg:flex lg:w-1/2 flex-col justify-between p-12 text-white relative">
            <div class="branding-pattern"></div>
            
            <!-- Logo -->
            <div class="relative z-10 flex items-center gap-3">
                <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center border border-white/20">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-white">Whistleblowing System</h1>
                    <p class="text-sm text-white/70">{{ config('app.company.name') }}</p>
                </div>
            </div>

            <!-- Center Content -->
            <div class="relative z-10 max-w-lg">
                <h2 class="text-4xl font-bold mb-4 leading-tight text-white">
                    {{ config('app.company.tagline.first') }},<br>
                    <span class="text-yellow-300">{{ config('app.company.tagline.second') }}.</span>
                </h2>
                <p class="text-lg text-white/80 leading-relaxed mb-8">
                    {{ config('app.company.description.auth') }}
                </p>

                <div class="flex items-center gap-6">
                    @foreach(config('app.company.features') as $feature)
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            <span class="text-sm text-white/90">{{ $feature }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Footer -->
            <div class="relative z-10 text-sm text-white/60">
                &copy; 2026 Nama Perusahaan. All rights reserved.
            </div>
        </div>
    </div>

    <!-- Custom JS -->
    <script src="{{ asset('assets/lib/base/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>