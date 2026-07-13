<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => 'Asia/Jakarta',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'id'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'id'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'id_ID'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', (string) env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'file'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Domain
    |--------------------------------------------------------------------------
    |
    | This value is used to generate URLs in the application.
    |
    */
    'domain' => env('APP_DOMAIN', 'localhost.test'),

    /*
    |--------------------------------------------------------------------------
    | Company Name
    |--------------------------------------------------------------------------
    |
    | This value is used to display the company name in the application.
    |
    */
    'company' => [
        'name' => env('COMPANY_NAME', 'PERUMDA BPR Bank Kota Kediri'),
        'address' => [
            'kantor_pusat' => 'Jl. Brawijaya No. 40 Ruko Brawijaya Blok A1–A2, Kel. Pocanan, Kota Kediri',
            'kantor_cabang_ngawi' => 'Jl. Ir. Soekarno No. 2 Ngawi',
        ],
        'phone' => [
            'kantor_pusat' => '0822-5727-2294',
            'kantor_cabang_ngawi' => '0812-2673-3075',
        ],
        'social_media_links' => [
            'facebook' => 'https://www.facebook.com/bankkotakediri/',
            'instagram' => 'https://www.instagram.com/bankkotakediri/',
            'whatsapp' => "https://wa.me/6282257272294",
        ],
        'email' => [
            'pengaduan' => 'wbs@bprbankkotakediri.co.id',
        ],
        'jam_operasional' => [
            'hari_mulai' => 'Senin',
            'hari_selesai' => 'Jumat',
            'jam_buka' => '08.00',
            'jam_tutup' => '16.00'
        ],
        'tagline' => [
            'first' => 'Menjaga Integritas',
            'second' => 'Membangun Kepercayaan'
        ],
        'description' => [
            'auth' => 'Panel administrasi Whistleblowing System. Akses terbatas hanya untuk personel yang berwenang. Seluruh aktivitas dicatat dalam sistem audit.'
        ],
        'features' => [
            'Enkripsi End-to-End', 'Audit Trail'
        ]
    ],
    'company_name' => env('COMPANY_NAME', 'PERUMDA BPR Bank Kota Kediri'),
];
