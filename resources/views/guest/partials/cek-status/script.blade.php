<script>
    $(document).ready(function() {
        // Mobile menu toggle
        $('#mobileMenuBtn').on('click', function() {
            $('#mobileMenu').toggleClass('hidden');
        });

        // Auto uppercase tracking input
        $('#trackingInput').on('input', function() {
            $(this).val($(this).val().toUpperCase());
        });

        // Mock Data for Demo
        const mockTimeline = [
            {
                status: 'completed',
                title: 'Laporan Diterima',
                description: 'Laporan Anda telah berhasil diterima oleh sistem dan tercatat.',
                date: '05 Juli 2026, 09:30 WIB'
            },
            {
                status: 'completed',
                title: 'Verifikasi Awal',
                description: 'Tim WBS telah melakukan verifikasi kelengkapan data laporan.',
                date: '05 Juli 2026, 14:15 WIB'
            },
            {
                status: 'active',
                title: 'Investigasi Berlangsung',
                description: 'Laporan sedang dalam proses investigasi oleh tim independen.',
                date: '06 Juli 2026, 10:00 WIB'
            },
            {
                status: 'pending',
                title: 'Tindak Lanjut & Penyelesaian',
                description: 'Menunggu hasil investigasi untuk ditindaklanjuti.',
                date: '-'
            }
        ];

        // Form submission
        $('#trackingForm').on('submit', function(e) {
            e.preventDefault();

            const code = $('#trackingInput').val().trim();

            if (!WBS.FormValidator.validate(this)) {
                WBS.Toast.error('Validasi Gagal', 'Mohon masukkan kode tracking');
                return;
            }

            WBS.Loading.show();

            // Simulate API call
            setTimeout(function() {
                WBS.Loading.hide();

                // For demo: if code starts with WBS-, show result. Else show not found.
                if (code.toUpperCase().startsWith('WBS-') && code.length >= 8) {
                    showResult(code);
                } else {
                    showNotFound();
                }
            }, 1500);
        });

        function showResult(code) {
            $('#searchCard').addClass('hidden');
            $('#notFoundSection').addClass('hidden');
            $('#resultSection').removeClass('hidden');

            // Populate data
            $('#displayTrackingCode').text(code);
            $('.copy-btn').attr('data-copy', code);
            $('#reportDate').text('05 Juli 2026');
            $('#reportCategory').text('Kecurangan (Fraud)');
            $('#estimatedDate').text('15 Juli 2026');

            // Render Timeline
            renderTimeline(mockTimeline);
            
            $('html, body').animate({ scrollTop: $('#resultSection').offset().top - 100 }, 500);
        }

        function showNotFound() {
            $('#searchCard').addClass('hidden');
            $('#resultSection').addClass('hidden');
            $('#notFoundSection').removeClass('hidden');
        }

        function renderTimeline(data) {
            const $container = $('#timelineContainer');
            $container.empty();

            data.forEach((item, index) => {
                let icon = '';
                if (item.status === 'completed') icon = '✓';
                else if (item.status === 'active') icon = (index + 1);
                else icon = (index + 1);

                const html = `
                    <div class="timeline-item flex gap-4">
                        <div class="flex flex-col items-center relative">
                            <div class="timeline-dot ${item.status}">${icon}</div>
                            <div class="timeline-line"></div>
                        </div>
                        <div class="timeline-content flex-1 ${index === data.length - 1 ? '' : 'pb-8'}">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 mb-1">
                                <h4 class="font-semibold text-gray-900 ${item.status === 'pending' ? 'text-gray-400' : ''}">${item.title}</h4>
                                <span class="text-xs font-medium ${item.status === 'pending' ? 'text-gray-400' : 'text-blue-600'}">${item.date}</span>
                            </div>
                            <p class="text-sm ${item.status === 'pending' ? 'text-gray-400' : 'text-gray-600'}">${item.description}</p>
                        </div>
                    </div>
                `;
                $container.append(html);
            });
        }

        // Button actions
        $('#btnNewSearch').on('click', function() {
            $('#resultSection').addClass('hidden');
            $('#searchCard').removeClass('hidden');
            $('#trackingInput').val('').focus();
            $('html, body').animate({ scrollTop: $('#searchCard').offset().top - 100 }, 500);
        });

        $('#btnTryAgain').on('click', function() {
            $('#notFoundSection').addClass('hidden');
            $('#searchCard').removeClass('hidden');
            $('#trackingInput').val('').focus();
            $('html, body').animate({ scrollTop: $('#searchCard').offset().top - 100 }, 500);
        });
    });
</script>