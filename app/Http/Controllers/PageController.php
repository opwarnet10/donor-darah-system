<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan halaman utama (Beranda)
    public function index()
    {
        return view('welcome');
    }

    // Menampilkan dasbor mockup untuk Pendonor
    public function dashboardPendonor()
    {
        return view('pendonor.dashboard');
    }

    // Menampilkan dasbor mockup untuk Petugas UDD
    public function dashboardPetugas()
    {
        return view('petugas.dashboard');
    }

    // Menampilkan dasbor mockup untuk Admin
    public function dashboardAdmin()
    {
        return view('admin.dashboard');
    }
}