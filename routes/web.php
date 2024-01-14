<?php

use App\Http\Controllers\ProdakController;
use App\Http\Controllers\sessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KirimEmailController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('prodak', [ProdakController::class, 'prodaks'])->name('prodaks');
Route::match(['post', 'put'], '/add-prodak', [ProdakController::class, 'addprodak'])->name('add.prodak');

Route::post('/update-mailtrigger', [ProdakController::class, 'updateemail'])->name('update.mailtrigger');
Route::post('/update-prodak', [ProdakController::class, 'updateprodak'])->name('update.prodak');
Route::post('/approve-prodak', [ProdakController::class, 'approveprodak'])->name('approve.prodak');
Route::post('/delete_prodak', [ProdakController::class, 'deleteProdak'])->name('delete.prodak');


Route::get('/sesi', [sessionController::class, 'index']);

Route::get('formemail', [KirimEmailController::class, 'index']);
Route::post('kirim', [KirimEmailController::class, 'kirim']);
Route::post('/kirim-email', 'KirimEmailController@kirim')->name('kirim-email');

Auth::routes();

// Rute yang memerlukan otentikasi
Route::middleware(['auth'])->group(function () {
    // Tambahkan rute yang memerlukan otentikasi di sini
    // Contoh: Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
