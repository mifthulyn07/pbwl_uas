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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/daftarbuku', [App\Http\Controllers\DaftarbukuController::class, 'index']);
Route::post('/daftarbuku/store', [App\Http\Controllers\DaftarbukuController::class, 'store']);
Route::patch('/daftarbuku/{id}', [App\Http\Controllers\DaftarbukuController::class, 'update']);
Route::get('/daftarbuku/{id}', [App\Http\Controllers\DaftarbukuController::class, 'destroy']);
Route::get('/daftarbuku/search', [App\Http\Controllers\DaftarbukuController::class, 'search']);

Route::get('/daftarpenjualan', [App\Http\Controllers\DaftarpenjualanController::class, 'index']);
Route::post('/daftarpenjualan/store', [App\Http\Controllers\DaftarpenjualanController::class, 'store']);
Route::patch('/daftarpenjualan/{id}', [App\Http\Controllers\DaftarpenjualanController::class, 'update']);
Route::get('/daftarpenjualan/{id}', [App\Http\Controllers\DaftarpenjualanController::class, 'destroy']);
Route::get('/daftarpenjualan/search', [App\Http\Controllers\DaftarpenjualanController::class, 'search']);