@extends('layouts.app')

@section('title', 'Blank Page')

@stack('style')

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
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Formulir Pendaftaran</h4>
                    </div>
                    <livewire:form-pendaftaran />
                </div>
            </div>
        </section>
    </div>
@endsection

@stack('script')
