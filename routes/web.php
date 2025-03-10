<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
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


// route register
Route::get('/register', [AuthController::class, 'register']); 
Route::post('/store', [AuthController::class, 'store']);
// route login
Route::get('/login', [AuthController::class, 'login']);
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

// route home
Route::get('/', [HotelController::class, 'index']);
Route::get('/home', [HotelController::class, 'index']);

// route rooms
Route::get('/rooms/{slug}', [HotelController::class, 'rooms']);

// route admin
Route::get('/admin', [AdminController::class, 'index']);

// route email verify
Route::get('/verifyEmail/{id}', [VerificationController::class, 'verify']);


