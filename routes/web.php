<?php

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
    return redirect()->to('/login');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::resource('customer', App\Http\Controllers\customerController::class);
Route::resource('kendaraan', App\Http\Controllers\kendaraanController::class);
route::resource('pinjam', App\Http\Controllers\pinjamController::class);
Route::get('/login', [App\Http\Controllers\UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [App\Http\Controllers\UserController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout']);
route::get('/cari', App\Http\Controllers\pinjamController::class, 'cari');
Route::get('/welcome', App\Http\Controllers\berandaController::class, 'index');