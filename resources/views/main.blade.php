@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Formulir Pendafataran IDN</h1>
            </div>
            <div class="section-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Periksa Kuota</h4>
                    </div>
                    <livewire:cabang-kuota-card />
                </div>

                <livewire:form-pendaftaran />

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
