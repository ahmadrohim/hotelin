<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttractionCategoryController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Models\AttractionCategory;

// route home
Route::get('/', [HomeController::class, 'index']);

// Route untuk user yang belum login
Route::controller(AuthController::class)->group(function () {
    // route register
    Route::get('/register', 'register')->name('register')->middleware('guest'); 
    Route::post('/store', 'store')->name('store');
    // route login
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
});

// Route untuk user yang sudah login
Route::middleware(['auth'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']); 
});


// route admin
Route::controller(AdminController::class)->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index']);
});

// route rooms
Route::get('/rooms/{code_category_room}', [RoomController::class, 'index']);

// manajemen kamar
Route::get('/ourRoom', [RoomController::class, 'ourRooms']);
Route::prefix('room')->controller(RoomController::class)->group(function(){
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{room:code_room}', 'edit');
    Route::put('/update/{room:code_room}', 'update');
    Route::delete('/destroy/{room:code_room}', 'destroy');
    Route::get('/{room:code_room}', 'show');
});

// manajemen kategoi kamar
Route::prefix('categoryRoom')->controller(RoomCategoryController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{categoryRoom:code_category_room}', 'edit');
    Route::put('/update/{categoryRoom:code_category_room}', 'update');
    Route::delete('/destroy/{categoryRoom:code_category_room}', 'destroy');
    Route::get('/{categoryRoom:code_category_room}', 'show');
});

// route manajemen pemesanan
Route::prefix('reservation')->controller(ReservationController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/pending', 'pending');
    Route::get('/active', 'active');
    Route::get('/completed', 'completed');
    Route::get('/archived', 'archived');
    Route::get('/canceled', 'canceled');
    Route::put('/restore/{booking:code_booking}', 'restore');
    Route::delete('/forceDelete/{booking:code_booking}', 'forceDelete');
    Route::get('/edit/{booking:code_booking}', 'edit');
    Route::put('/update/{booking:code_booking}', 'update');
    Route::delete('/destroy/{booking:code_booking}', 'destroy');
    Route::get('/{booking:code_booking}', 'show');
});


// route email verify
Route::get('/verifyEmail/{id}', [VerificationController::class, 'verify']);

// Route untuk user yang sudah login
Route::middleware(['auth'])->prefix('booking')->controller(BookingController::class)->group(function(){
    Route::get('/create/{room:code_room}', 'create');
    Route::post('/store/{room:code_room}', 'store');
    Route::get('/edit/{booking:code_booking}', 'edit');
    Route::put('/update/{booking:code_booking}', 'update');
    Route::delete('/destroy/{boking::code_booking}', 'destroy');
    Route::get('/{booking::user_id}', 'index');
});

// route untuk menajemen user
Route::prefix('users')->controller(UserController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/admin', 'admin');
    Route::get('/staf', 'staf');
    Route::get('/customer', 'customer');
    Route::get('/archived', 'archived');
    Route::get('/create', 'create');
    Route::get('/edit/{user:code_user}', 'edit');
    Route::put('/update/{user:code_user}', 'update');
    Route::delete('/destroy/{user:code_user}', 'destroy');
    Route::put('/restore/{user:code_user}', 'restore');
    Route::delete('/forceDelete/{user:code_user}', 'forceDelete');
    Route::get('/{user:code_user}', 'show');
});

// Route fasilitas hotel
Route::prefix('facilities')->controller(FacilitiesController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{hotelfacilities:code_facilities}', 'edit');
    Route::put('/update/{hotelfacilities:code_facilities}', 'update');
    Route::delete('/destroy/{hotelfacilities:code_facilities}', 'destroy');
    Route::get('/{hotelfacilities:code_facilities}', 'show');
});

// Route category attraction
Route::prefix('categoryAttraction')->controller(AttractionCategoryController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
});

// Route attraction
Route::prefix('attraction')->controller(AttractionController::class)->group(function(){
    Route::get('/', 'index');
    
});

