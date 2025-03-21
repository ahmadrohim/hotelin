<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route untuk user yang belum login
Route::middleware(['guest'])->group(function () {
    // route register
    Route::get('/register', [AuthController::class, 'register'])->name('register'); 
    Route::post('/store', [AuthController::class, 'store'])->name('store');

    // route login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});

// Route untuk user yang sudah login
Route::middleware(['auth'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']); //logout yng belum login tidak bisa akses
});

// route home
Route::get('/', [HotelController::class, 'index']);

// route rooms
Route::get('/rooms/{code_category_room}', [RoomController::class, 'index']);

// route untuk role admin
/*Route::middleware(['admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index']);
});*/

Route::get('/admin', [AdminController::class, 'index']);

// route email verify
Route::get('/verifyEmail/{id}', [VerificationController::class, 'verify']);


