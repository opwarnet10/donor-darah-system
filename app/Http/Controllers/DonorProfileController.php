<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonorProfileController extends Controller
{
    // Menampilkan halaman profil pendonor dengan mock data
    public function show()
    {
        // Mock data merujuk pada atribut entitas pendonor sesuai kamus data ERD
        $donor = [
            'nama_lengkap' => 'Cevin Muhammad Rabbani Daniyal',
            'nik' => '3578011234560001',
            'nomor_donor' => 'DNR-2026-0001',
            'tanggal_lahir' => '2004-05-15',
            'jenis_kelamin' => 'LAKI_LAKI',
            'golongan_darah' => 'O',
            'rhesus' => 'POSITIF',
            'email' => 'cecep@example.com',
            'nomor_hp' => '081234567890',
            'alamat' => 'Jl. Airlangga No. 4-6, Surabaya',
        ];

        return view('pendonor.profile', compact('donor'));
    }
}