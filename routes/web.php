<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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


// route home
Route::get('/', [HomeController::class, 'index']);

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
    Route::post('/logout', [AuthController::class, 'logout']); 
});

// route rooms
Route::get('/rooms/{code_category_room}', [RoomController::class, 'index']);

// route untuk role admin
/*Route::middleware(['admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index']);
});*/

// ROUTE ADMIN
Route::get('/dashboard', [AdminController::class, 'index']);
// manajemen kamar
Route::get('/ourRoom', [RoomController::class, 'ourRooms']);
Route::get('/room/create', [RoomController::class, 'create']);
Route::post('/room/store', [RoomController::class, 'store']);

Route::get('/room/show/{code_room}', [RoomController::class, 'show']);

Route::get('/room/edit/{code_room}', [RoomController::class, 'edit']);


// route email verify
Route::get('/verifyEmail/{id}', [VerificationController::class, 'verify']);


