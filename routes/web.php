<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ReservationController;


// route home
Route::get('/', [HomeController::class, 'index']);

// Route untuk user yang belum login
Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    // route register
    Route::get('/register', 'register')->name('register'); 
    Route::post('/store', 'store')->name('store');
    // route login
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
});

// Route untuk user yang sudah login
Route::middleware(['auth'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']); 
});

// route rooms
Route::get('/rooms/{code_category_room}', [RoomController::class, 'index']);

// ROUTE ADMIN
Route::get('/dashboard', [AdminController::class, 'index']);

// manajemen kamar
Route::get('/ourRoom', [RoomController::class, 'ourRooms']);
Route::prefix('room')->controller(RoomController::class)->group(function(){
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/{room:code_room}', 'show');
    Route::get('/edit/{room:code_room}', 'edit');
    Route::put('/update/{room:code_room}', 'update');
    Route::delete('/destroy/{room:code_room}', 'destroy');
});

// manajemen kategoi kamar
Route::prefix('categoryRoom')->controller(RoomCategoryController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/{categoryRoom:code_category_room}', 'show');
    Route::get('/edit/{categoryRoom:code_category_room}', 'edit');
    Route::put('/update/{categoryRoom:code_category_room}', 'update');
    Route::delete('/destroy/{categoryRoom:code_category_room}', 'destroy');
});

// route manajemen pemesanan
Route::prefix('reservation')->controller(ReservationController::class)->group(function(){
    route::get('/', 'index');
    route::get('/active', 'active');
    Route::get('/{booking:code_booking}', 'show');
    Route::get('/edit/{booking:code_booking}', 'edit');
    Route::put('/update/{booking:code_booking}', 'update');
    Route::delete('/destroy/{booking:code_booking}', 'destroy');
});


// route email verify
Route::get('/verifyEmail/{id}', [VerificationController::class, 'verify']);

// Route untuk user yang sudah login
Route::middleware(['auth'])->prefix('booking')->controller(BookingController::class)->group(function(){
    Route::get('/create/{room:code_room}', 'create');
    Route::post('/store/{room:code_room}', 'store');
    Route::get('/edit/{booking:code_booking}', 'edit');
    Route::put('/update/{booking:code_booking}', 'update');
    Route::get('/{booking::user_id}', 'index');
    Route::delete('/destroy/{boking::code_booking}', 'destroy');
});
