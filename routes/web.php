<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoggerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomepageController::class, 'dashboard'])->name('dashboard')->middleware('auth:admin');
    Route::get('/mapuser', [HomepageController::class, 'mapuser'])->name('mapuser');
    Route::get('/api/dashboard', [HomepageController::class, 'indexAPI'])->name('dashboard.api');
    Route::get('/map', [HomepageController::class, 'map'])->name('map');
    Route::get('/map/data', [HomepageController::class, 'showMap'])->name('mapdata');
    Route::get('/edit/{id}', [HomepageController::class, 'edit'])->name('edit');
    Route::delete('/delete/{id}', [HomepageController::class, 'delete'])->name('delete');
    Route::post('/tasks', [HomepageController::class, 'store'])->name('tasks.store');
    Route::put('/update/{id}', [HomepageController::class, 'update'])->name('update');

    Route::get('/getExpiredData', [LoggerController::class, 'getExpiredData'])->name('filter');
    // Tambahkan rute lainnya yang hanya bisa diakses oleh user biasa
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticated'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
