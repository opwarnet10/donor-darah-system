@extends('layouts.app')

@section('title', 'Beranda - Sistem Informasi Donor Darah')

@section('content')
<div class="row mt-4">
    <div class="col-md-8 mx-auto text-center">
        <div class="card shadow-sm">
            <div class="card-body py-5">
                <h1 class="display-6 fw-bold text-danger mb-3">Sistem Informasi Donor Darah</h1>
                <p class="lead text-muted mb-4">Mendukung penyediaan darah yang aman dan tepat waktu untuk menyelamatkan nyawa.</p>
                <hr class="my-4">
                <p class="mb-4">Silakan login sesuai dengan peran Anda (Tampilan Mockup):</p>
                
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <!-- Tautan ini sekarang mengarah ke rute yang benar -->
                    <a href="{{ route('pendonor.dashboard') }}" class="btn btn-outline-danger px-4 gap-3">Login Pendonor</a>
                    <a href="{{ route('petugas.dashboard') }}" class="btn btn-outline-primary px-4">Login Petugas</a>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark px-4">Login Admin</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection