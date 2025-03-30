<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VerificationController;
use App\Models\RoomCategory;

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

Route::get('/room/{room:code_room}', [RoomController::class, 'show']);

Route::get('/room/edit/{room:code_room}', [RoomController::class, 'edit']);
Route::put('/room/update/{room:code_room}', [RoomController::class, 'update']);

Route::delete('/room/destroy/{room:code_room}', [RoomController::class, 'destroy']);

// manajemen kategoi kamar
Route::get('categoryRoom', [RoomCategoryController::class, 'index']);
Route::get('/categoryRoom/create', [RoomCategoryController::class, 'create']);
Route::post('/categoryRoom/store', [RoomCategoryController::class, 'store']);
Route::get('/categoryRoom/{categoryRoom:code_category_room}', [RoomCategoryController::class, 'show']);

Route::get('/categoryRoom/edit/{categoryRoom:code_category_room}', [RoomCategoryController::class, 'edit']);
Route::put('/categoryRoom/update/{categoryRoom:code_category_room}', [RoomCategoryController::class, 'update']);


// route email verify
Route::get('/verifyEmail/{id}', [VerificationController::class, 'verify']);


