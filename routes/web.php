<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// route register
Route::get('/register', [AuthController::class, 'register']); 

// route login
Route::get('/login', [AuthController::class, 'login']);

// route home
Route::get('/home', [HotelController::class, 'index']);

// route rooms
Route::get('/rooms/{slug}', [HotelController::class, 'rooms']);

// route admin
Route::get('/admin', [AdminController::class, 'index']);
