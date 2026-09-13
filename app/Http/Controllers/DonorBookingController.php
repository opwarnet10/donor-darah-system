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
            // Data mock statis untuk simulasi konfirmasi
            $jadwalTerpilih = [
                'id' => $request->id_jadwal,
                'nama_kegiatan' => 'Donor Darah Sukarela UDD PMI Kota',
                'tanggal' => '2026-06-20',
                'waktu_mulai' => '08:00',
                'waktu_selesai' => '12:00',
                'lokasi' => 'Gedung Utama UDD PMI, Surabaya',
            ];
        }

        // Mengambil riwayat mock pemesanan dari Session (agar interaktif saat disimulasikan)
        // Jika belum ada session, kita berikan 1 data mock default yang sudah "SELESAI"
        $riwayatPemesanan = session('mock_pemesanan', [
            [
                'id' => 'BOOK-001',
                'nama_kegiatan' => 'Mobile Unit Donor Darah Kampus A',
                'tanggal' => '2026-05-10',
                'lokasi' => 'Auditorium Kampus A, Surabaya',
                'status' => 'SELESAI', 
            ]
        ]);

        return view('pendonor.pemesanan', compact('jadwalTerpilih', 'riwayatPemesanan'));
    }

    // 2. Simulasi aksi konfirmasi pemesanan
    public function store(Request $request)
    {
        // Membuat data pemesanan baru (mock)
        $pemesananBaru = [
            'id' => 'BOOK-' . rand(100, 999),
            'nama_kegiatan' => 'Donor Darah Sukarela UDD PMI Kota',
            'tanggal' => '2026-06-20',
            'lokasi' => 'Gedung Utama UDD PMI, Surabaya',
            'status' => 'MENUNGGU', // Status menunggu kedatangan/check-in
        ];

        // Ambil riwayat lama dari session, tambahkan yang baru di paling atas
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

        // Simpan kembali ke session
        session(['mock_pemesanan' => $riwayatPemesanan]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('pendonor.booking')->with('success', 'Pemesanan berhasil dibuat! Silakan periksa status pemesanan Anda di bawah.');
    }

    // 3. Simulasi aksi batal pemesanan
    public function cancel(Request $request)
    {
        $idBatal = $request->input('id_pemesanan');
        
        // Ambil data dari session
        $riwayatPemesanan = session('mock_pemesanan', []);
        
        // Ubah status menjadi DIBATALKAN untuk ID yang sesuai
        foreach ($riwayatPemesanan as $key => $pesanan) {
            if ($pesanan['id'] == $idBatal) {
                $riwayatPemesanan[$key]['status'] = 'DIBATALKAN';
            }
        }

        // Simpan perubahan ke session
        session(['mock_pemesanan' => $riwayatPemesanan]);

        return redirect()->route('pendonor.booking')->with('info', 'Pemesanan telah dibatalkan.');
    }
}