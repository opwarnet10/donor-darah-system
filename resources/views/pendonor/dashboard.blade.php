@extends('layouts.app')

@section('title', 'Dasbor Pendonor - Sistem Informasi Donor Darah')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h2 class="text-danger border-bottom pb-2">Dasbor Pendonor</h2>
        <p class="text-muted">Selamat datang, Pendonor! (Ini adalah data mockup)</p>
    </div>
</div>

<div class="row">
    <!-- Menu Profil -->
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100 border-0 border-top border-danger border-3">
            <div class="card-body text-center">
                <h5 class="card-title mt-2">Profil Saya</h5>
                <p class="card-text text-muted">Kelola data diri dan golongan darah Anda.</p>
                <a href="{{ route('pendonor.profil') }}" class="btn btn-outline-danger btn-sm mt-2">Lihat Profil</a>
            </div>
        </div>
    </div>

    <!-- Menu Jadwal -->
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100 border-0 border-top border-danger border-3">
            <div class="card-body text-center">
                <h5 class="card-title mt-2">Pemesanan Donor</h5>
                <p class="card-text text-muted">Cari jadwal pelayanan UDD dan lakukan pemesanan.</p>
                <a href="{{ route('pendonor.schedule') }}" class="btn btn-outline-danger btn-sm mt-2">Cari Jadwal</a>
            </div>
        </div>
    </div>

    <!-- Menu Riwayat -->
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100 border-0 border-top border-danger border-3">
            <div class="card-body text-center">
                <h5 class="card-title mt-2">Riwayat Donor</h5>
                <p class="card-text text-muted">Pantau riwayat penyumbangan darah Anda sebelumnya.</p>
                <a href="#" class="btn btn-outline-danger btn-sm mt-2">Lihat Riwayat</a>
            </div>
        </div>
    </div>
</div>
@endsection