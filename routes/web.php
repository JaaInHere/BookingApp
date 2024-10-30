<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminRoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboarController;
use App\Http\Controllers\ProfileController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboarController::class, 'showData'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/daftar',function () {
    return view('daftar-booking');
})->name('booking');

Route::get('/diBooking', function(){
    return view('dibooking');
})->name('dibooking');

Route::get('/daftar', [RoomController::class, 'ShowRooms'])->name('booking');

Route::post('/dibooking', [BookingController::class, 'store'])->middleware('auth')->name('booking.store');

Route::get('/dibooking', [BookingController::class, 'getBooking'])->name('dibooking');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::get('admin/dashboard', [AdminDashboardController::class, 'showData'])->name('admin.dashboard');
    Route::get('admin/booking', [AdminRoomController::class, 'ShowAdminBooking'])->name('admin.booking');
    Route::get('/admin/booking', [AdminRoomController::class, 'ShowRooms'])->name('admin.booking');
    Route::post('admin/dibooking', [AdminBookingController::class, 'store'])->middleware('auth')->name('booking.store');
    Route::get('admin/dibooking', [AdminBookingController::class, 'getBooking'])->name('admin.dibooking');
});




require __DIR__.'/auth.php';
