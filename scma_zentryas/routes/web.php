<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\FormController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('welcome');

Route::get('/', [FormController::class, 'index'])->name('welcome');
Route::post('/submit-form', [FormController::class, 'create'])->name('form.create');



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('karyawan', KaryawanController::class);
    Route::post('karyawan-update/{id}', [KaryawanController::class, 'karyawan_update'])->name('karyawan.update');
    Route::resource('divisi', DivisiController::class);
    Route::post('divisi-update/{id}', [DivisiController::class, 'divisi_update'])->name('divisi.update');
    Route::resource('jabatan', JabatanController::class);
    Route::post('jabatan-update/{id}', [JabatanController::class, 'jabatan_update'])->name('jabatan.update');
});

require __DIR__ . '/auth.php';
