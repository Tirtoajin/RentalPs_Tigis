<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ConsoleController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Customer\BookingController;
// 1. Memberikan nama alias untuk setiap controller
use App\Http\Controllers\Customer\TestimonialController as CustomerTestimonialController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// == HALAMAN PUBLIK ==
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// == HALAMAN UMUM SETELAH LOGIN ==
Route::get('/dashboard', function () {
    if (Auth::user()->role == 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('customer.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// == ROUTE UNTUK ADMIN ==
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('consoles', ConsoleController::class);

    // Manajemen Booking
    Route::get('bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::patch('bookings/{booking}/confirm', [AdminBookingController::class, 'confirm'])->name('bookings.confirm');
    Route::patch('bookings/{booking}/cancel', [AdminBookingController::class, 'cancel'])->name('bookings.cancel');
    Route::patch('bookings/{booking}/complete', [AdminBookingController::class, 'complete'])->name('bookings.complete');

    // Manajemen Testimoni
    // 2. Menggunakan alias yang benar
    Route::get('testimonials', [AdminTestimonialController::class, 'index'])->name('testimonials.index');
    Route::patch('testimonials/{testimonial}/approve', [AdminTestimonialController::class, 'approve'])->name('testimonials.approve');
    Route::delete('testimonials/{testimonial}', [AdminTestimonialController::class, 'destroy'])->name('testimonials.destroy');
}); // <-- 3. Posisi kurung penutup yang benar


// == ROUTE UNTUK CUSTOMER ==
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/history', [CustomerDashboardController::class, 'history'])->name('history');

    // 2. Menggunakan alias yang benar
    Route::get('testimonials/{booking}/create', [CustomerTestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('testimonials/{booking}', [CustomerTestimonialController::class, 'store'])->name('testimonials.store');
});


// Route untuk Profile dari Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
