<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonorScheduleController extends Controller
{
    // Menampilkan daftar jadwal pelayanan donor dengan mock data
    public function index()
    {
        // Mock data merujuk pada atribut entitas jadwal_pelayanan
        $jadwals = [
            [
                'id' => 1,
                'nama_kegiatan' => 'Donor Darah Sukarela UDD PMI Kota',
                'tanggal' => '2026-06-20',
                'waktu_mulai' => '08:00',
                'waktu_selesai' => '12:00',
                'lokasi' => 'Gedung Utama UDD PMI, Surabaya',
                'status' => 'BUKA',
                'kuota' => 50,
            ],
            [
                'id' => 2,
                'nama_kegiatan' => 'Mobile Unit Donor Darah Kampus A',
                'tanggal' => '2026-06-25',
                'waktu_mulai' => '09:00',
                'waktu_selesai' => '14:00',
                'lokasi' => 'Auditorium Kampus A, Surabaya',
                'status' => 'BUKA',
                'kuota' => 75,
            ],
            [
                'id' => 3,
                'nama_kegiatan' => 'Donor Darah Peduli Sesama Mall XYZ',
                'tanggal' => '2026-06-28',
                'waktu_mulai' => '10:00',
                'waktu_selesai' => '16:00',
                'lokasi' => 'Atrium Lantai 1 Mall XYZ, Surabaya',
                'status' => 'SEGERA',
                'kuota' => 100,
            ],
            [
                'id' => 4,
                'nama_kegiatan' => 'Donor Darah Rutin Kantor Kecamatan',
                'tanggal' => '2026-06-10',
                'waktu_mulai' => '08:00',
                'waktu_selesai' => '11:30',
                'lokasi' => 'Pendopo Kantor Kecamatan ABC',
                'status' => 'TUTUP',
                'kuota' => 40,
            ],
        ];

        return view('pendonor.jadwal', compact('jadwals'));
    }
}