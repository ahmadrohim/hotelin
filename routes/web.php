<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttractionCategoryController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;


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


// manajemen kamar
Route::prefix('rooms')->controller(RoomController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{room:code_room}', 'edit');
    Route::put('/update/{room:code_room}', 'update');
    Route::delete('/destroy/{room:code_room}', 'destroy');
    Route::get('/{room:code_room}', 'show');
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

