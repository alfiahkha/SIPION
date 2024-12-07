<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.sipion');
})->middleware(['auth', 'verified'])->name('dashboard');

//UserTable
Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create',[ UserController::class,'create'])-> name('users.create');
    Route::post('users/store',[ UserController::class,'store'])-> name('users.store');
    
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');

//AdminTable
Route::resource('admin', AdminController::class);
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/create',[ AdminController::class,'create'])-> name('admin.create');
    Route::post('admin/store',[ AdminController::class,'store'])-> name('admin.store');

    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}/update', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('admin/{id}/delete', [AdminController::class, 'delete'])->name('admin.delete');

//Pelatih 
Route::get('/pelatih', [PelatihController::class, 'index'])->name('pelatih.index');
    Route::get('/pelatih/create',[ PelatihController::class,'create'])-> name('pelatih.create');
    Route::post('/pelatih/store',[ PelatihController::class,'store'])-> name('pelatih.store');

    Route::get('/pelatih/{id}/edit', [PelatihController::class, 'edit'])->name('pelatih.edit');
    Route::put('/pelatih/{id}/update', [PelatihController::class, 'update'])->name('pelatih.update');
    Route::delete('pelatih/{id}/delete', [PelatihController::class, 'delete'])->name('pelatih.delete');

//Kursus
Route::get('/kursus', [KursusController::class, 'index'])->name('kursus.index');
    Route::get('/kursus/create',[ KursusController::class,'create'])-> name('kursus.create');
    Route::post('/kursus/store',[ KursusController::class,'store'])-> name('kursus.store');

    Route::get('/kursus/{id}/edit', [KursusController::class, 'edit'])->name('kursus.edit');
    Route::put('/kursus/{id}/update', [KursusController::class, 'update'])->name('kursus.update');
    Route::delete('kursus/{id}/delete', [KursusController::class, 'delete'])->name('kursus.delete');

//Siswa 
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create',[ SiswaController::class,'create'])-> name('siswa.create');
    Route::post('/siswa/store',[ SiswaController::class,'store'])-> name('siswa.store');

    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}/update', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('siswa/{id}/delete', [SiswaController::class, 'delete'])->name('siswa.delete');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
