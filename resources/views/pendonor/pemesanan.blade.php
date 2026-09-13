@extends('layouts.app')

@section('title', 'Pemesanan Donor - Sistem Informasi Donor Darah')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h2 class="text-danger border-bottom pb-2">Pemesanan Jadwal Donor</h2>
        <p class="text-muted">Kelola dan konfirmasi jadwal pemesanan penyumbangan darah Anda.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col-md-5 mb-4">
        <div class="card shadow-sm border-0 h-100 border-top border-danger border-3">
            <div class="card-body">
                <h5 class="card-title fw-bold text-dark mb-3">Konfirmasi Pemesanan</h5>
                
                @if($jadwalTerpilih)
                    <div class="alert alert-light border">
                        <h6 class="fw-bold text-danger mb-1">{{ $jadwalTerpilih['nama_kegiatan'] }}</h6>
                        <p class="small text-muted mb-2"><i class="bi bi-geo-alt"></i> {{ $jadwalTerpilih['lokasi'] }}</p>
                        <hr class="my-2">
                        <p class="small mb-1"><strong>Tanggal:</strong> {{ $jadwalTerpilih['tanggal'] }}</p>
                        <p class="small mb-0"><strong>Waktu:</strong> {{ $jadwalTerpilih['waktu_mulai'] }} - {{ $jadwalTerpilih['waktu_selesai'] }} WIB</p>
                    </div>

                    <form action="{{ route('pendonor.booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_jadwal" value="{{ $jadwalTerpilih['id'] }}">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger">Konfirmasi Pemesanan</button>
                        </div>
                    </form>
                @else
                    <div class="text-center py-4 text-muted">
                        <p class="mb-2">Belum ada jadwal yang dipilih.</p>
                        <a href="{{ route('pendonor.schedule') }}" class="btn btn-outline-danger btn-sm">Cari Jadwal Terlebih Dahulu</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-7 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h5 class="card-title fw-bold text-dark mb-3">Riwayat Pemesanan Anda</h5>
                
                @if(count($riwayatPemesanan) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle small">
                            <thead class="table-light">
                                <tr>
                                    <th>ID / Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($riwayatPemesanan as $pesanan)
                                <tr>
                                    <td>
                                        <span class="fw-bold text-dark">{{ $pesanan['id'] }}</span><br>
                                        <span class="text-muted" style="font-size: 0.8rem;">{{ $pesanan['nama_kegiatan'] }}</span>
                                    </td>
                                    <td>{{ $pesanan['tanggal'] }}</td>
                                    <td>
                                        @if($pesanan['status'] == 'MENUNGGU')
                                            <span class="badge bg-warning text-dark">MENUNGGU</span>
                                        @elseif($pesanan['status'] == 'SELESAI')
                                            <span class="badge bg-success">SELESAI</span>
                                        @else
                                            <span class="badge bg-secondary">DIBATALKAN</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        @if($pesanan['status'] == 'MENUNGGU')
                                            <form action="{{ route('pendonor.booking.cancel') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id_pemesanan" value="{{ $pesanan['id'] }}">
                                                <button type="submit" class="btn btn-outline-danger btn-sm py-0 px-2" style="font-size: 0.75rem;" onclick="return confirm('Yakin ingin membatalkan pemesanan ini?')">Batalkan</button>
                                            </form>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted text-center py-4">Belum ada riwayat pemesanan.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection