<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonorQuestionnaireController extends Controller
{
    /**
     * Menampilkan halaman kuesioner pradonasi berdasarkan ID pemesanan (Mock Data).
     */
    public function show($id)
    {
        // Mock data informasi pemesanan & jadwal terkait
        $pemesanan = [
            'id_pemesanan' => $id,
            'nama_kegiatan' => 'Donor Darah Sukarela UDD PMI Kota',
            'tanggal' => '2026-06-20',
            'waktu' => '08:00 - 12:00 WIB',
            'lokasi' => 'Gedung Utama UDD PMI, Surabaya',
            'status_pesan' => 'MENUNGGU',
            'sudah_diisi' => session('kuesioner_terisi_' . $id, false),
        ];

        // Mock data daftar pertanyaan kuesioner pradonasi
        $pertanyaans = [
            [
                'id' => 1,
                'teks' => 'Apakah Anda merasa sehat dan bugar hari ini?',
                'tipe' => 'radio',
                'opsi' => ['Ya', 'Tidak'],
            ],
            [
                'id' => 2,
                'teks' => 'Apakah Anda sedang mengonsumsi antibiotik atau obat-obatan tertentu saat ini?',
                'tipe' => 'radio',
                'opsi' => ['Ya', 'Tidak'],
            ],
            [
                'id' => 3,
                'teks' => 'Apakah Anda pernah mendonorkan darah sebelumnya dalam 2 bulan terakhir?',
                'tipe' => 'radio',
                'opsi' => ['Ya', 'Tidak'],
            ],
            [
                'id' => 4,
                'teks' => 'Apakah Anda pernah mengalami demam, flu, atau sakit berat dalam 2 minggu terakhir?',
                'tipe' => 'radio',
                'opsi' => ['Ya', 'Tidak'],
            ],
            [
                'id' => 5,
                'teks' => 'Sebutkan perkiraan berat badan Anda saat ini (dalam kg):',
                'tipe' => 'text',
                'opsi' => [],
            ],
            [
                'id' => 6,
                'teks' => 'Catatan tambahan mengenai riwayat kesehatan Anda (jika ada):',
                'tipe' => 'textarea',
                'opsi' => [],
            ],
        ];

        return view('pendonor.kuesioner', compact('pemesanan', 'pertanyaans'));
    }

    /**
     * Simulasi penyimpanan kuesioner secara mock (tanpa database).
     */
    public function submit(Request $request, $id)
    {
        // Simpan status bahwa kuesioner untuk ID ini telah diisi menggunakan session sementara
        session(['kuesioner_terisi_' . $id => true]);

        return redirect()->route('pendonor.questionnaire', ['id' => $id])
                         ->with('success', 'Kuesioner pradonasi berhasil disimpan! Data Anda telah tercatat untuk ditinjau oleh petugas saat check-in.');
    }
}