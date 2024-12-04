<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminLapanganController;
use App\Http\Controllers\PelangganLapanganController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\PelangganBookingController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\PelangganProfileController;
use App\Http\Controllers\PelangganDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Lapangan;
use Illuminate\Support\Facades\Route;

// Sebelum Login
Route::get('/', function () { 
    $lapangan = Lapangan::all(); 
    return view('homepage', compact('lapangan'));
})->name('home');

Route::get('/lapangan', function () {
    $lapangan = Lapangan::all();
    return view('lapangan', compact('lapangan'));
})->name('lapangan');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Route untuk autentikasi
Route::middleware(['auth'])->group(function () {
    // Route untuk profile (berlaku untuk semua user)

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route khusus admin
    Route::middleware(['auth'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        
        Route::get('/lapangan', [AdminLapanganController::class, 'index'])->name('admin.lapangan.index');
        Route::get('/lapangan/create', [AdminLapanganController::class, 'create'])->name('admin.lapangan.create');
        Route::post('/lapangan', [AdminLapanganController::class, 'store'])->name('admin.lapangan.store');
        Route::get('/lapangan/{lapangan}', [AdminLapanganController::class, 'show'])->name('admin.lapangan.show');
        Route::get('/lapangan/{lapangan}/edit', [AdminLapanganController::class, 'edit'])->name('admin.lapangan.edit');
        Route::put('/lapangan/{lapangan}', [AdminLapanganController::class, 'update'])->name('admin.lapangan.update');
        Route::delete('/lapangan/{lapangan}', [AdminLapanganController::class, 'destroy'])->name('admin.lapangan.destroy');

        Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
        Route::get('/bookings/create', [AdminBookingController::class, 'create'])->name('admin.bookings.create');
        Route::post('/bookings', [AdminBookingController::class, 'store'])->name('admin.bookings.store');
        Route::get('/bookings/{booking}', [AdminBookingController::class, 'show'])->name('admin.bookings.show');
        Route::get('/bookings/{booking}/edit', [AdminBookingController::class, 'edit'])->name('admin.bookings.edit');
        Route::put('/bookings/{booking}', [AdminBookingController::class, 'update'])->name('admin.bookings.update');
        Route::delete('/bookings/{booking}', [AdminBookingController::class, 'destroy'])->name('admin.bookings.destroy');
        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::put('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
        Route::post('/profile/password', [AdminProfileController::class, 'updatePassword'])->name('admin.password.update');

    });

    // Route khusus pelanggan
    Route::middleware(['auth'])->prefix('customer')->group(function () {
        Route::get('/dashboard', [PelangganDashboardController::class, 'dashboard'])->name('dashboard');

        
        Route::get('/lapangan', [PelangganLapanganController::class, 'index'])->name('lapangan.index');
        Route::get('/lapangan/create', [PelangganLapanganController::class, 'create'])->name('lapangan.create');
        Route::post('/lapangan', [PelangganLapanganController::class, 'store'])->name('lapangan.store');
        Route::get('/lapangan/{lapangan}', [PelangganLapanganController::class, 'show'])->name('lapangan.show');
        Route::get('/lapangan/{lapangan}/edit', [PelangganLapanganController::class, 'edit'])->name('lapangan.edit');
        Route::put('/lapangan/{lapangan}', [PelangganLapanganController::class, 'update'])->name('lapangan.update');
        Route::delete('/lapangan/{lapangan}', [PelangganLapanganController::class, 'destroy'])->name('lapangan.destroy');

        Route::get('/bookings', [pelangganBookingController::class, 'index'])->name('booking.index');
        Route::get('/bookings/create', [PelangganBookingController::class, 'create'])->name('booking.create');
        Route::post('/bookings', [PelangganBookingController::class, 'store'])->name('booking.store');
        Route::get('/bookings/{booking}', [PelangganBookingController::class, 'show'])->name('booking.show');
        Route::get('/bookings/{booking}/edit', [PelangganBookingController::class, 'edit'])->name('booking.edit');
        Route::put('/bookings/{booking}', [PelangganBookingController::class, 'update'])->name('booking.update');
        Route::delete('/bookings/{booking}', [PelangganBookingController::class, 'destroy'])->name('booking.destroy');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/lapangan/search', [PelangganLapanganController::class, 'search'])->name('lapangan.search');

    });

});

require __DIR__.'/auth.php';
