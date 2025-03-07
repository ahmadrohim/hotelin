<?php

use App\Http\Controllers\AdminController;
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

// route home
Route::get('/home', [HotelController::class, 'index']);

Route::get('/rooms/{slug}', [HotelController::class, 'rooms']);

Route::get('/admin', [AdminController::class, 'index']);
