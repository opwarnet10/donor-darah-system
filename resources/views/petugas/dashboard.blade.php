@extends('layouts.app')

@section('title', 'Dasbor Petugas - Sistem Informasi Donor Darah')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <!-- Menggunakan warna primary (biru) untuk membedakan visual role Petugas -->
        <h2 class="text-primary border-bottom pb-2">Dasbor Petugas UDD</h2>
        <p class="text-muted">Selamat datang, Petugas! (Ini adalah data mockup)</p>
    </div>
</div>

<div class="row">
    <!-- Menu Check-in -->
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm h-100 border-0 border-top border-primary border-3">
            <div class="card-body text-center">
                <h5 class="card-title mt-2">Check-in Pendonor</h5>
                <p class="card-text text-muted">Verifikasi kehadiran dan kuesioner pendonor terdaftar.</p>
                <a href="#" class="btn btn-outline-primary btn-sm mt-2">Buka Antrean</a>
            </div>
        </div>
    </div>

    <!-- Menu Seleksi & Donasi -->
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm h-100 border-0 border-top border-primary border-3">
            <div class="card-body text-center">
                <h5 class="card-title mt-2">Seleksi & Donasi</h5>
                <p class="card-text text-muted">Input hasil seleksi medis dan catat penyumbangan darah.</p>
                <a href="#" class="btn btn-outline-primary btn-sm mt-2">Catat Donasi</a>
            </div>
        </div>
    </div>

    <!-- Menu Inventaris -->
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm h-100 border-0 border-top border-primary border-3">
            <div class="card-body text-center">
                <h5 class="card-title mt-2">Inventaris Darah</h5>
                <p class="card-text text-muted">Kelola unit komponen darah, pelulusan, dan pantau persediaan.</p>
                <a href="#" class="btn btn-outline-primary btn-sm mt-2">Kelola Stok</a>
            </div>
        </div>
    </div>

    <!-- Menu Notifikasi -->
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm h-100 border-0 border-top border-primary border-3">
            <div class="card-body text-center">
                <h5 class="card-title mt-2">Pemberitahuan</h5>
                <p class="card-text text-muted">Pilih pendonor sesuai riwayat dan kirim notifikasi stok rendah.</p>
                <a href="#" class="btn btn-outline-primary btn-sm mt-2">Kirim Broadcast</a>
            </div>
        </div>
    </div>
</div>
@endsection