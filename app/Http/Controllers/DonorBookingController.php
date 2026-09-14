<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonorBookingController extends Controller
{
    // 1. Menampilkan halaman pemesanan donor
    public function index(Request $request)
    {
        // Menangkap data jadwal jika pendonor menekan "Pesan Donor" dari halaman jadwal
        $jadwalTerpilih = null;
        if ($request->has('id_jadwal')) {
            $jadwalTerpilih = [
                'id' => $request->id_jadwal,
                'nama_kegiatan' => 'Donor Darah Sukarela UDD PMI Kota',
                'tanggal' => '2026-06-20',
                'waktu_mulai' => '08:00',
                'waktu_selesai' => '12:00',
                'lokasi' => 'Gedung Utama UDD PMI, Surabaya',
            ];
        }

        // Mengambil riwayat mock pemesanan dari Session
        $riwayatPemesanan = session('mock_pemesanan', [
            [
                'id' => 'BOOK-001',
                'nama_kegiatan' => 'Mobile Unit Donor Darah Kampus A',
                'tanggal' => '2026-05-10',
                'lokasi' => 'Auditorium Kampus A, Surabaya',
                'status' => 'SELESAI', 
            ]
        ]);

        // Menyertakan pengecekan status kuesioner apakah sudah diisi untuk setiap pemesanan
        foreach ($riwayatPemesanan as $key => $pesanan) {
            $riwayatPemesanan[$key]['sudah_isi_kuesioner'] = session('kuesioner_terisi_' . $pesanan['id'], false);
        }

        return view('pendonor.pemesanan', compact('jadwalTerpilih', 'riwayatPemesanan'));
    }

    // 2. Simulasi aksi konfirmasi pemesanan
    public function store(Request $request)
    {
        $pemesananBaru = [
            'id' => 'BOOK-' . rand(100, 999),
            'nama_kegiatan' => 'Donor Darah Sukarela UDD PMI Kota',
            'tanggal' => '2026-06-20',
            'lokasi' => 'Gedung Utama UDD PMI, Surabaya',
            'status' => 'MENUNGGU',
        ];

        $riwayatPemesanan = session('mock_pemesanan', [
            [
                'id' => 'BOOK-001',
                'nama_kegiatan' => 'Mobile Unit Donor Darah Kampus A',
                'tanggal' => '2026-05-10',
                'lokasi' => 'Auditorium Kampus A, Surabaya',
                'status' => 'SELESAI',
            ]
        ]);
        
        array_unshift($riwayatPemesanan, $pemesananBaru); 
        session(['mock_pemesanan' => $riwayatPemesanan]);

        return redirect()->route('pendonor.booking')->with('success', 'Pemesanan berhasil dibuat! Silakan periksa status pemesanan Anda di bawah.');
    }

    // 3. Simulasi aksi batal pemesanan
    public function cancel(Request $request)
    {
        $idBatal = $request->input('id_pemesanan');
        $riwayatPemesanan = session('mock_pemesanan', []);
        
        foreach ($riwayatPemesanan as $key => $pesanan) {
            if ($pesanan['id'] == $idBatal) {
                $riwayatPemesanan[$key]['status'] = 'DIBATALKAN';
            }
        }

        session(['mock_pemesanan' => $riwayatPemesanan]);

        return redirect()->route('pendonor.booking')->with('info', 'Pemesanan telah dibatalkan.');
    }
}