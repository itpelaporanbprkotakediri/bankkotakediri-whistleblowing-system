@extends('layouts.guest', ['pageTitle' => 'Cek Status'])

@push('styles')
    @include('guest.partials.cek-status.style')
@endpush

@section('content')
    <!-- PAGE HEADER -->
    @include('guest.partials.cek-status.page-header')

    <!-- MAIN CONTENT -->
    <main class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                
                <!-- SEARCH FORM -->
                @include('guest.partials.cek-status.search-form')

                <!-- RESULT SECTION (Hidden by default) -->
                @include('guest.partials.cek-status.result-section')

                <!-- NOT FOUND SECTION (Hidden by default) -->
                @include('guest.partials.cek-status.not-found-section')

            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <!-- Page Specific JS -->
    @include('guest.partials.cek-status.script')
@endpush