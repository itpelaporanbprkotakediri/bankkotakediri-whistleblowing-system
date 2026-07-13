<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ config('app.name') }}</title>
    <meta name="description" content="Dashboard - {{ config('app.name', 'Laravel') }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/logo-bpr-kota-square.ico') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/lib/base/css/style.css') }}">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        /* Page-specific styles */
        .stat-card {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #F3F4F6;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
        }

        .stat-card.primary::before { background: linear-gradient(180deg, #1E6FB8, #0A4D8C); }
        .stat-card.warning::before { background: linear-gradient(180deg, #F59E0B, #D97706); }
        .stat-card.info::before { background: linear-gradient(180deg, #3B82F6, #1D4ED8); }
        .stat-card.success::before { background: linear-gradient(180deg, #10B981, #059669); }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .chart-container {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #F3F4F6;
        }

        .chart-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #F3F4F6;
        }

        .chart-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #111827;
        }

        .activity-item {
            padding: 1rem 0;
            border-bottom: 1px solid #F3F4F6;
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .quick-action-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem;
            background: white;
            border: 1px solid #E5E7EB;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            cursor: pointer;
            width: 100%;
            text-align: left;
        }

        .quick-action-btn:hover {
            border-color: #1E6FB8;
            background: #F0F7FF;
            transform: translateY(-2px);
        }

        .quick-action-icon {
            width: 40px;
            height: 40px;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- SIDEBAR -->
    @include('layouts.partials.sidebar')

    <!-- MAIN CONTENT -->
    <div class="admin-main" id="adminMain">
        
        <!-- TOPBAR HEADER -->
        @include('layouts.partials.header', ['breadcrumbs' => $breadcrumbs])

        <!-- DASHBOARD CONTENT -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>

    <!-- Modal Logout (paste di bagian bawah halaman) -->
    <div class="modal-overlay" id="logoutModal">
        <div class="modal modal-sm">
            <div class="modal-body text-center p-8">
                <div class="modal-icon warning">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Konfirmasi Logout</h3>
                <p class="text-gray-600 mb-6">Apakah Anda yakin ingin keluar dari sistem? Anda harus login kembali untuk mengakses panel admin.</p>
                <div class="flex flex-col sm:flex-row gap-3">
                    <button class="btn btn-secondary flex-1" onclick="WBS.Modal.hide('logoutModal')">Batal</button>
                    <button class="btn btn-danger flex-1" id="confirmLogoutBtn">Ya, Logout</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom JS -->
    <script src="{{ asset('assets/lib/base/js/main.js') }}"></script>
    
    <!-- Page Specific JS -->
    <script>
        $(document).ready(function() {
            // User dropdown
            $('#userMenuBtn').on('click', function(e) {
                e.stopPropagation();
                $('#userDropdown').toggleClass('hidden');
            });

            $(document).on('click', function(e) {
                if (!$('#userMenuBtn').is(e.target) && !$('#userMenuBtn').has(e.target).length) {
                    $('#userDropdown').addClass('hidden');
                }
            });
        });
        
        $('.logout-button').on('click', function() {
            WBS.Modal.show('logoutModal');
        });

        $('#confirmLogoutBtn').on('click', function() {
            $.ajax({
                url: "{{ route('logout') }}",
                type: "POST",
                dataType: "JSON",
                beforeSend: function() {
                    $('#confirmLogoutBtn').html('<span class="spinner-border spinner-border-sm mr-2"></span> Logout...').prop('disabled', true);
                },
                success: function (response) {
                    WBS.Modal.hide('logoutModal');
                    WBS.Toast.success(response.message);
                    setTimeout(() => {
                        window.location.href = "{{ route('login') }}";
                    }, 1000);
                },
                error: function (xhr) {
                    WBS.Modal.hide('logoutModal');
                    WBS.Toast.error('Gagal Logout');
                    $('#confirmLogoutBtn').html('<i class="ti ti-logout me-1"></i> Logout').prop('disabled', false);
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>