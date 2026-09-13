@extends('layouts.app')

@section('title', 'Jadwal Pelayanan Donor - Sistem Informasi Donor Darah')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h2 class="text-danger border-bottom pb-2">Jadwal Pelayanan Donor</h2>
        <p class="text-muted">Berikut adalah daftar lokasi dan waktu pelayanan donor darah yang tersedia.</p>
    </div>
</div>

<div class="row">
    @foreach($jadwals as $jadwal)
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0 h-100 border-start border-danger border-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h5 class="card-title fw-bold text-dark">{{ $jadwal['nama_kegiatan'] }}</h5>
                    @if($jadwal['status'] == 'BUKA')
                        <span class="badge bg-success">BUKA</span>
                    @elseif($jadwal['status'] == 'SEGERA')
                        <span class="badge bg-warning text-dark">SEGERA</span>
                    @else
                        <span class="badge bg-secondary">TUTUP</span>
                    @endif
                </div>
                
                <p class="card-text text-muted mb-3"><i class="bi bi-geo-alt"></i> {{ $jadwal['lokasi'] }}</p>
                
                <ul class="list-unstyled small mb-4">
                    <li class="mb-1"><strong>Tanggal:</strong> {{ $jadwal['tanggal'] }}</li>
                    <li class="mb-1"><strong>Waktu:</strong> {{ $jadwal['waktu_mulai'] }} - {{ $jadwal['waktu_selesai'] }} WIB</li>
                    <li class="mb-1"><strong>Kuota:</strong> {{ $jadwal['kuota'] }} Pendonor</li>
                </ul>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('pendonor.booking', ['id_jadwal' => $jadwal['id']]) }}" class="btn btn-outline-danger btn-sm px-3 @if($jadwal['status'] != 'BUKA') disabled @endif">
                        Pesan Donor
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection