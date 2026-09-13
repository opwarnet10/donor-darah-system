@extends('layouts.app')

@section('title', 'Dasbor Admin - Sistem Informasi Donor Darah')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <!-- Menggunakan warna dark untuk membedakan visual role Admin -->
        <h2 class="text-dark border-bottom pb-2">Dasbor Administrator</h2>
        <p class="text-muted">Selamat datang, Admin! (Ini adalah data mockup)</p>
    </div>
</div>

<div class="row">
    <!-- Menu Kelola Petugas -->
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm h-100 border-0 border-top border-dark border-3">
            <div class="card-body text-center">
                <h5 class="card-title mt-2">Kelola Akun Petugas</h5>
                <p class="card-text text-muted">Tambah, ubah, atau nonaktifkan akun petugas UDD.</p>
                <a href="#" class="btn btn-outline-dark btn-sm mt-2">Kelola Petugas</a>
            </div>
        </div>
    </div>

    <!-- Menu Kelola Jadwal -->
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm h-100 border-0 border-top border-dark border-3">
            <div class="card-body text-center">
                <h5 class="card-title mt-2">Jadwal Pelayanan</h5>
                <p class="card-text text-muted">Atur jadwal, tanggal, dan kuota pelayanan donor.</p>
                <a href="#" class="btn btn-outline-dark btn-sm mt-2">Atur Jadwal</a>
            </div>
        </div>
    </div>

    <!-- Menu Kelola Kuesioner -->
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm h-100 border-0 border-top border-dark border-3">
            <div class="card-body text-center">
                <h5 class="card-title mt-2">Pertanyaan Kuesioner</h5>
                <p class="card-text text-muted">Kelola master pertanyaan kuesioner pradonasi.</p>
                <a href="#" class="btn btn-outline-dark btn-sm mt-2">Kelola Kuesioner</a>
            </div>
        </div>
    </div>

    <!-- Menu Ambang Stok -->
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm h-100 border-0 border-top border-dark border-3">
            <div class="card-body text-center">
                <h5 class="card-title mt-2">Ambang Persediaan</h5>
                <p class="card-text text-muted">Atur batas minimum stok untuk pemicu notifikasi.</p>
                <a href="#" class="btn btn-outline-dark btn-sm mt-2">Atur Ambang Stok</a>
            </div>
        </div>
    </div>
</div>
@endsection