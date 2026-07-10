/**
 * ========================================
 * WHISTLEBLOWING SYSTEM - PERUMDA BPR BANK KOTA KEDIRI
 * Global JavaScript (jQuery-based)
 * ========================================
 */

(function($) {
    'use strict';

    // ========================================
    // 1. TOAST NOTIFICATION SYSTEM
    // ========================================
    const Toast = {
        container: null,

        init: function() {
            if ($('.toast-container').length === 0) {
                $('body').append('<div class="toast-container"></div>');
            }
            this.container = $('.toast-container');
        },

        show: function(options) {
            const defaults = {
                type: 'info',
                title: '',
                message: '',
                duration: 5000,
                dismissible: true
            };

            const settings = $.extend({}, defaults, options);
            
            if (!this.container) this.init();

            const icons = {
                success: '✓',
                error: '✕',
                warning: '⚠',
                info: 'ℹ'
            };

            const toast = $(`
                <div class="toast ${settings.type}">
                    <div class="toast-icon">${icons[settings.type]}</div>
                    <div class="toast-content">
                        ${settings.title ? `<div class="toast-title">${settings.title}</div>` : ''}
                        <div class="toast-message">${settings.message}</div>
                    </div>
                    ${settings.dismissible ? '<button class="toast-close">&times;</button>' : ''}
                </div>
            `);

            this.container.append(toast);

            // Close button
            toast.find('.toast-close').on('click', function() {
                Toast.dismiss(toast);
            });

            // Auto dismiss
            if (settings.duration > 0) {
                setTimeout(() => {
                    Toast.dismiss(toast);
                }, settings.duration);
            }

            return toast;
        },

        dismiss: function(toast) {
            toast.css({
                animation: 'slideInRight 0.3s ease reverse'
            });
            setTimeout(() => {
                toast.remove();
            }, 300);
        },

        success: function(title, message) {
            return this.show({ type: 'success', title, message });
        },

        error: function(title, message) {
            return this.show({ type: 'error', title, message, duration: 7000 });
        },

        warning: function(title, message) {
            return this.show({ type: 'warning', title, message });
        },

        info: function(title, message) {
            return this.show({ type: 'info', title, message });
        }
    };

    // ========================================
    // 2. LOADING OVERLAY
    // ========================================
    const Loading = {
        overlay: null,

        init: function() {
            if ($('.loading-overlay').length === 0) {
                $('body').append(`
                    <div class="loading-overlay">
                        <div class="text-center">
                            <div class="loading-spinner dark" style="width: 50px; height: 50px; border-width: 5px;"></div>
                            <p class="mt-4 text-gray-600 font-medium">Memuat...</p>
                        </div>
                    </div>
                `);
            }
            this.overlay = $('.loading-overlay');
        },

        show: function() {
            if (!this.overlay) this.init();
            this.overlay.addClass('active');
        },

        hide: function() {
            if (!this.overlay) this.init();
            this.overlay.removeClass('active');
        }
    };

    // ========================================
    // 3. MODAL SYSTEM (DIPERBAIKI)
    // ========================================
    const Modal = {
        show: function(modalId) {
            const $modal = $(`#${modalId}`);
            $modal.addClass('active');
            $('body').css('overflow', 'hidden');
        },

        hide: function(modalId) {
            const $modal = $(`#${modalId}`);
            $modal.removeClass('active');
            $('body').css('overflow', '');
        },

        confirm: function(options) {
            const defaults = {
                title: 'Konfirmasi',
                message: 'Apakah Anda yakin?',
                confirmText: 'Ya',
                cancelText: 'Batal',
                type: 'warning',
                onConfirm: function() {}
            };

            const settings = $.extend({}, defaults, options);

            // Tentukan warna tombol berdasarkan tipe
            let btnClass = 'btn-primary';
            if (settings.type === 'danger') btnClass = 'btn-danger';
            else if (settings.type === 'warning') btnClass = 'btn-primary';

            // Tentukan ikon berdasarkan tipe
            let iconSvg = '';
            if (settings.type === 'danger') {
                iconSvg = `<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>`;
            } else if (settings.type === 'warning') {
                iconSvg = `<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>`;
            } else {
                iconSvg = `<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>`;
            }

            const modal = $(`
                <div class="modal-overlay" id="confirmModal">
                    <div class="modal modal-sm">
                        <div class="modal-body text-center p-8">
                            <div class="modal-icon ${settings.type}">
                                ${iconSvg}
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">${settings.title}</h3>
                            <p class="text-gray-600 mb-6">${settings.message}</p>
                            <div class="flex flex-col sm:flex-row gap-3">
                                <button class="btn btn-secondary flex-1 modal-cancel">${settings.cancelText}</button>
                                <button class="btn ${btnClass} flex-1 modal-confirm">${settings.confirmText}</button>
                            </div>
                        </div>
                    </div>
                </div>
            `);

            $('body').append(modal);

            // ✅ FIX: Force reflow agar animasi fade-in berjalan
            // Browser perlu merender state awal (opacity: 0) sebelum transisi
            void modal[0].offsetHeight; // trigger reflow
            
            // Baru tambahkan class active setelah reflow
            requestAnimationFrame(() => {
                modal.addClass('active');
            });

            // Event handlers
            modal.find('.modal-confirm').on('click', function() {
                // Fade out dulu sebelum hapus
                modal.removeClass('active');
                setTimeout(() => {
                    settings.onConfirm();
                    modal.remove();
                    $('body').css('overflow', '');
                }, 300); // Sesuaikan dengan durasi transisi CSS (0.3s)
            });

            modal.find('.modal-cancel, .modal-close').on('click', function() {
                modal.removeClass('active');
                setTimeout(() => {
                    modal.remove();
                    $('body').css('overflow', '');
                }, 300);
            });

            modal.on('click', function(e) {
                if (e.target === this) {
                    modal.removeClass('active');
                    setTimeout(() => {
                        modal.remove();
                        $('body').css('overflow', '');
                    }, 300);
                }
            });
        }
    };

    // ========================================
    // 4. FORM VALIDATION HELPER
    // ========================================
    const FormValidator = {
        validate: function(form) {
            let isValid = true;
            
            $(form).find('[required]').each(function() {
                const field = $(this);
                const value = field.val();
                
                if (!value || value.trim() === '') {
                    field.addClass('is-invalid');
                    isValid = false;
                } else {
                    field.removeClass('is-invalid');
                }
            });

            return isValid;
        },

        clearErrors: function(form) {
            $(form).find('.is-invalid').removeClass('is-invalid');
        }
    };

    // ========================================
    // 5. TRACKING CODE GENERATOR
    // ========================================
    const TrackingCode = {
        generate: function() {
            const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
            let code = 'WBS-';
            for (let i = 0; i < 8; i++) {
                code += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            return code;
        },

        format: function(code) {
            return code.toUpperCase().replace(/[^A-Z0-9-]/g, '');
        }
    };

    // ========================================
    // 6. SIDEBAR TOGGLE (Admin) - DIPERBAIKI v2
    // ========================================
    function initSidebar() {
        // Desktop: Toggle collapse
        $(document).on('click', '.sidebar-toggle', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const $sidebar = $('#adminSidebar');
            const $main = $('#adminMain');
            
            // Hanya bekerja di desktop (>768px)
            if ($(window).width() > 768) {
                $sidebar.toggleClass('collapsed');
                $main.toggleClass('expanded');
                
                // Simpan preferensi ke localStorage
                const isCollapsed = $sidebar.hasClass('collapsed');
                localStorage.setItem('wbs_sidebar_collapsed', isCollapsed);
            }
        });

        // Mobile: Toggle open/close
        $(document).on('click', '.mobile-menu-toggle', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const $sidebar = $('#adminSidebar');
            const $overlay = $('#sidebarOverlay');
            
            // Hanya bekerja di mobile (<=768px)
            if ($(window).width() <= 768) {
                $sidebar.toggleClass('mobile-open');
                $overlay.toggleClass('active');
                $('body').toggleClass('overflow-hidden');
            }
        });

        // Close sidebar saat klik overlay (mobile)
        $(document).on('click', '#sidebarOverlay', function() {
            $('#adminSidebar').removeClass('mobile-open');
            $(this).removeClass('active');
            $('body').removeClass('overflow-hidden');
        });

        // Close sidebar saat klik menu item (mobile)
        $(document).on('click', '.sidebar-menu-item', function() {
            if ($(window).width() <= 768) {
                $('#adminSidebar').removeClass('mobile-open');
                $('#sidebarOverlay').removeClass('active');
                $('body').removeClass('overflow-hidden');
            }
        });

        // Close sidebar dengan tombol Escape
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $(window).width() <= 768) {
                $('#adminSidebar').removeClass('mobile-open');
                $('#sidebarOverlay').removeClass('active');
                $('body').removeClass('overflow-hidden');
            }
        });

        // Restore state dari localStorage saat load
        if ($(window).width() > 768) {
            const savedState = localStorage.getItem('wbs_sidebar_collapsed');
            if (savedState === 'true') {
                $('#adminSidebar').addClass('collapsed');
                $('#adminMain').addClass('expanded');
            }
        }

        // Handle resize window
        let resizeTimer;
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if ($(window).width() > 768) {
                    // Reset mobile state saat kembali ke desktop
                    $('#adminSidebar').removeClass('mobile-open');
                    $('#sidebarOverlay').removeClass('active');
                    $('body').removeClass('overflow-hidden');
                }
            }, 250);
        });
    }

    // ========================================
    // 7. SMOOTH SCROLL
    // ========================================
    function initSmoothScroll() {
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 600);
            }
        });
    }

    // ========================================
    // 8. FILE UPLOAD PREVIEW
    // ========================================
    function initFileUpload() {
        $('.file-upload').each(function() {
            const uploadArea = $(this);
            const input = uploadArea.find('input[type="file"]');
            const preview = uploadArea.find('.file-preview');

            uploadArea.on('click', function() {
                input.click();
            });

            uploadArea.on('dragover', function(e) {
                e.preventDefault();
                uploadArea.addClass('dragover');
            });

            uploadArea.on('dragleave', function() {
                uploadArea.removeClass('dragover');
            });

            uploadArea.on('drop', function(e) {
                e.preventDefault();
                uploadArea.removeClass('dragover');
                const files = e.originalEvent.dataTransfer.files;
                input[0].files = files;
                handleFiles(files);
            });

            input.on('change', function() {
                handleFiles(this.files);
            });

            function handleFiles(files) {
                if (files.length > 0) {
                    const fileNames = Array.from(files).map(f => f.name).join(', ');
                    preview.html(`<p class="text-sm text-gray-600">${files.length} file terpilih: ${fileNames}</p>`);
                }
            }
        });
    }

    // ========================================
    // 9. TOOLTIP
    // ========================================
    function initTooltips() {
        $('[data-tooltip]').each(function() {
            const tooltip = $(this).attr('data-tooltip');
            $(this).attr('title', tooltip);
        });
    }

    // ========================================
    // 10. COUNTER ANIMATION
    // ========================================
    function animateCounter(element) {
        const $this = $(element);
        const target = parseInt($this.attr('data-target'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(function() {
            current += step;
            if (current >= target) {
                $this.text(target.toLocaleString('id-ID'));
                clearInterval(timer);
            } else {
                $this.text(Math.floor(current).toLocaleString('id-ID'));
            }
        }, 16);
    }

    function initCounters() {
        $('.counter').each(function() {
            const counter = $(this);
            if (counter.hasClass('animated')) return;

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        animateCounter(counter);
                        counter.addClass('animated');
                        observer.unobserve(counter[0]);
                    }
                });
            });

            observer.observe(counter[0]);
        });
    }

    // ========================================
    // 11. COPY TO CLIPBOARD
    // ========================================
    function copyToClipboard(text) {
        const $temp = $('<input>');
        $('body').append($temp);
        $temp.val(text).select();
        document.execCommand('copy');
        $temp.remove();
        Toast.success('Berhasil', 'Kode berhasil disalin ke clipboard');
    }

    // ========================================
    // 12. DATE FORMATTER
    // ========================================
    const DateFormatter = {
        format: function(date, format = 'DD MMMM YYYY') {
            const d = new Date(date);
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                          'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            
            const day = d.getDate();
            const month = months[d.getMonth()];
            const year = d.getFullYear();
            
            return format
                .replace('DD', day)
                .replace('MMMM', month)
                .replace('YYYY', year);
        },

        relative: function(date) {
            const d = new Date(date);
            const now = new Date();
            const diff = Math.floor((now - d) / 1000);

            if (diff < 60) return 'Baru saja';
            if (diff < 3600) return Math.floor(diff / 60) + ' menit lalu';
            if (diff < 86400) return Math.floor(diff / 3600) + ' jam lalu';
            if (diff < 604800) return Math.floor(diff / 86400) + ' hari lalu';
            
            return this.format(date);
        }
    };

    // ========================================
    // 13. INITIALIZE ALL
    // ========================================
    $(document).ready(function() {
        Toast.init();
        Loading.init();
        initSidebar();
        initSmoothScroll();
        initFileUpload();
        initTooltips();
        initCounters();

        // Global event handlers
        $(document).on('click', '.copy-btn', function() {
            const text = $(this).attr('data-copy');
            copyToClipboard(text);
        });

        $(document).on('click', '[data-modal]', function() {
            const modalId = $(this).attr('data-modal');
            Modal.show(modalId);
        });

        $(document).on('click', '.modal-close, .modal-cancel', function() {
            const modal = $(this).closest('.modal-overlay');
            modal.removeClass('active');
            $('body').css('overflow', '');
        });

        $(document).on('click', '.modal-overlay', function(e) {
            if (e.target === this) {
                $(this).removeClass('active');
                $('body').css('overflow', '');
            }
        });

        // Remove invalid class on input
        $(document).on('input change', '.form-control', function() {
            $(this).removeClass('is-invalid');
        });

        // Expose utilities globally
        window.WBS = {
            Toast: Toast,
            Loading: Loading,
            Modal: Modal,
            FormValidator: FormValidator,
            TrackingCode: TrackingCode,
            DateFormatter: DateFormatter,
            copyToClipboard: copyToClipboard
        };

        console.log('%c✓ Whistleblowing System Initialized', 'color: #0A4D8C; font-weight: bold; font-size: 14px;');
    });

})(jQuery);