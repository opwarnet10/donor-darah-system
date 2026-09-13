@extends('layouts.app')

@section('title', 'Profil Pendonor - Sistem Informasi Donor Darah')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h2 class="text-danger border-bottom pb-2">Profil Pendonor</h2>
        <p class="text-muted">Kelola dan tinjau informasi identitas serta data diri Anda.</p>
    </div>
</div>

<div class="row">
    <!-- Kartu Informasi Utama -->
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 border-top border-danger border-3 text-center p-4">
            <div class="mb-3">
                <!-- Avatar Dummy Sederhana -->
                <div class="bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center fw-bold fs-3" style="width: 80px; height: 80px;">
                    {{ substr($donor['nama_lengkap'], 0, 1) }}
                </div>
            }</div>
            <h4 class="fw-bold mb-1">{{ $donor['nama_lengkap'] }}</h4>
            <p class="text-muted mb-2">No. Pendonor: <span class="fw-semibold text-dark">{{ $donor['nomor_donor'] }}</span></p>
            <div>
                <span class="badge bg-danger fs-6 px-3 py-2">Gol. Darah: {{ $donor['golongan_darah'] }} ({{ $donor['rhesus'] }})</span>
            </div>
        </div>
    </div>

    <!-- Detail Informasi -->
    <div class="col-md-8 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 text-danger fw-bold">Informasi Detail Pendonor</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4 fw-semibold text-muted">NIK</div>
                    <div class="col-sm-8">{{ $donor['nik'] }}</div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-semibold text-muted">Jenis Kelamin</div>
                    <div class="col-sm-8">{{ $donor['jenis_kelamin'] == 'LAKI_LAKI' ? 'Laki-laki' : 'Perempuan' }}</div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-semibold text-muted">Tanggal Lahir</div>
                    <div class="col-sm-8">{{ $donor['tanggal_lahir'] }}</div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-semibold text-muted">Nomor Telepon / HP</div>
                    <div class="col-sm-8">{{ $donor['nomor_hp'] }}</div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-semibold text-muted">Email (Akun)</div>
                    <div class="col-sm-8">{{ $donor['email'] }}</div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-sm-4 fw-semibold text-muted">Alamat Domisili</div>
                    <div class="col-sm-8">{{ $donor['alamat'] }}</div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <!-- Tombol edit profil sebagai placeholder UI -->
                    <button type="button" class="btn btn-outline-danger px-4" onclick="alert('Fitur edit profil akan dikembangkan pada tahap selanjutnya.')">Edit Profil</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection