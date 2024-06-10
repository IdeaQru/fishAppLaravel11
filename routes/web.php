<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Display the dashboard page
Route::get('/dashboard', [HomepageController::class, 'dashboard'])->name('dashboard');
Route::get('/mapuser', [HomepageController::class, 'mapuser'])->name('mapuser');

// Route untuk menampilkan form login
Route::get('/login', [LoginController::class, 'index'])->name('login');

// Route untuk proses login
Route::post('/login', [LoginController::class, 'authenticated'])->name('login.process');

// Route untuk menampilkan form registrasi dan menyimpan data registrasi
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// API endpoint for fetching dashboard data
Route::get('/api/dashboard', [HomepageController::class, 'indexAPI'])->name('dashboard.api');

// Display the map page
Route::get('/map', [HomepageController::class, 'map'])->name('map');
Route::get('/map/data', [HomepageController::class, 'showMap'])->name('mapdata');

// Route for editing (show edit form)
Route::get('/edit/{id}', [HomepageController::class, 'edit'])->name('edit');

// Route for deleting a task
Route::delete('/delete/{id}', [HomepageController::class, 'delete'])->name('delete');

// Route for storing a new task
Route::post('/tasks', [HomepageController::class, 'store'])->name('tasks.store');
Route::put('/update/{id}', [App\Http\Controllers\HomepageController::class, 'update'])->name('update');
