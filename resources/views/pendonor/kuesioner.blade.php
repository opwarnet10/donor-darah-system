@extends('layouts.app')

@section('title', 'Kuesioner Pradonasi - Sistem Informasi Donor Darah')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <h2 class="text-danger border-bottom pb-2">Kuesioner Pradonasi</h2>
        <p class="text-muted">Silakan isi kuesioner kesehatan awal ini dengan jujur sebelum Anda melakukan proses check-in.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 border-top border-danger border-3">
            <div class="card-body">
                <h5 class="fw-bold text-dark mb-3">Informasi Pemesanan</h5>
                <ul class="list-unstyled small mb-0">
                    <li class="mb-2"><strong>ID Pemesanan:</strong> <span class="text-danger fw-semibold">{{ $pemesanan['id_pemesanan'] }}</span></li>
                    <li class="mb-2"><strong>Kegiatan:</strong> {{ $pemesanan['nama_kegiatan'] }}</li>
                    <li class="mb-2"><strong>Tanggal:</strong> {{ $pemesanan['tanggal'] }}</li>
                    <li class="mb-2"><strong>Waktu:</strong> {{ $pemesanan['waktu'] }}</li>
                    <li class="mb-2"><strong>Lokasi:</strong> {{ $pemesanan['lokasi'] }}</li>
                    <li class="mb-2"><strong>Status Pesan:</strong> <span class="badge bg-warning text-dark">{{ $pemesanan['status_pesan'] }}</span></li>
                    <li class="mb-0"><strong>Status Kuesioner:</strong> 
                        @if($pemesanan['sudah_diisi'])
                            <span class="badge bg-success">SUDAH DIISI</span>
                        @else
                            <span class="badge bg-secondary">BELUM DIISI</span>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="mt-3">
            <a href="{{ route('pendonor.booking') }}" class="btn btn-outline-secondary w-100">
                <i class="bi bi-arrow-left"></i> Kembali ke Pemesanan
            </a>
        </div>
    </div>

    <div class="col-md-8 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 text-danger fw-bold">Daftar Pertanyaan Kesehatan Pradonasi</h5>
            </div>
            <div class="card-body">
                @if($pemesanan['sudah_diisi'])
                    <div class="text-center py-5">
                        <div class="mb-3 text-success" style="font-size: 3rem;">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>
                        <h4 class="fw-bold text-dark">Kuesioner Telah Berhasil Disimpan</h4>
                        <p class="text-muted px-4">Terima kasih telah melengkapi kuesioner kesehatan pradonasi. Data jawaban Anda telah terekam dan akan diverifikasi oleh petugas UDD saat Anda melakukan proses check-in di lokasi.</p>
                        <a href="{{ route('pendonor.booking') }}" class="btn btn-danger mt-3 px-4">Kembali ke Halaman Pemesanan</a>
                    </div>
                @else
                    <div class="alert alert-info small" role="alert">
                        <i class="bi bi-info-circle-fill"></i> Catatan: Kuesioner ini digunakan untuk mengumpulkan data awal. Keputusan akhir kelayakan medis akan ditentukan oleh petugas UDD saat proses seleksi.
                    </div>

                    <form action="{{ route('pendonor.questionnaire.submit', ['id' => $pemesanan['id_pemesanan']]) }}" method="POST">
                        @csrf
                        
                        @foreach($pertanyaans as $index => $item)
                            <div class="mb-4 p-3 bg-light rounded border-start border-danger border-3">
                                <label class="form-label fw-semibold text-dark">
                                    {{ $index + 1 }}. {{ $item['teks'] }}
                                </label>

                                @if($item['tipe'] == 'radio')
                                    <div class="mt-2">
                                        @foreach($item['opsi'] as $opt)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jawaban[{{ $item['id'] }}]" id="q_{{ $item['id'] }}_{{ $opt }}" value="{{ $opt }}" required>
                                                <label class="form-check-label" for="q_{{ $item['id'] }}_{{ $opt }}">{{ $opt }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @elseif($item['tipe'] == 'text')
                                    <div class="mt-2">
                                        <input type="text" class="form-control form-control-sm" name="jawaban[{{ $item['id'] }}]" placeholder="Masukkan jawaban Anda..." required>
                                    </div>
                                @elseif($item['tipe'] == 'textarea')
                                    <div class="mt-2">
                                        <textarea class="form-control form-control-sm" name="jawaban[{{ $item['id'] }}]" rows="2" placeholder="Tuliskan keterangan (opsional)..."></textarea>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="submit" class="btn btn-danger px-4">Simpan Kuesioner</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection