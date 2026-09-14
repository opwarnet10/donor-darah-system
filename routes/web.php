<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DonorProfileController;
use App\Http\Controllers\DonorScheduleController;
use App\Http\Controllers\DonorBookingController;
use App\Http\Controllers\DonorQuestionnaireController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sinilah rute web didaftarkan untuk aplikasi Anda.
|
*/

// Rute untuk halaman Beranda
Route::get('/', [PageController::class, 'index'])->name('beranda');

// Rute mockup Dasbor Pendonor
Route::get('/pendonor/dashboard', [PageController::class, 'dashboardPendonor'])->name('pendonor.dashboard');

// Rute Profil Pendonor
Route::get('/pendonor/profil', [DonorProfileController::class, 'show'])->name('pendonor.profil');

// Rute Jadwal Pelayanan Pendonor
Route::get('/pendonor/jadwal', [DonorScheduleController::class, 'index'])->name('pendonor.schedule');

// Rute Pemesanan Donor (Baru)
Route::get('/pendonor/pemesanan', [DonorBookingController::class, 'index'])->name('pendonor.booking');
Route::post('/pendonor/pemesanan/store', [DonorBookingController::class, 'store'])->name('pendonor.booking.store');
Route::post('/pendonor/pemesanan/cancel', [DonorBookingController::class, 'cancel'])->name('pendonor.booking.cancel');

// Rute Kuesioner Pradonasi Pendonor (Baru - Step 1)
Route::get('/pendonor/kuesioner/{id}', [DonorQuestionnaireController::class, 'show'])->name('pendonor.questionnaire');
Route::post('/pendonor/kuesioner/{id}/submit', [DonorQuestionnaireController::class, 'submit'])->name('pendonor.questionnaire.submit');

// Rute mockup Dasbor Petugas UDD
Route::get('/petugas/dashboard', [PageController::class, 'dashboardPetugas'])->name('petugas.dashboard');

// Rute mockup Dasbor Admin
Route::get('/admin/dashboard', [PageController::class, 'admin.dashboard'])->name('admin.dashboard');