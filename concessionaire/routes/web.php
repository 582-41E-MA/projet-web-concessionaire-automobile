<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\PolitiquesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('accueil');

Route::get('/contact', [ContactController::class, 'index'])->name('pages.nouscontacter');
Route::get('/about', [AproposController::class, 'index'])->name('pages.aproposdenous');
Route::get('/politiques', [PolitiquesController::class, 'index'])->name('pages.politiques');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/inscription', [UserController::class, 'create'])->name('user.create');
Route::post('/inscription', [UserController::class, 'store'])->name('user.store');

Route::get('/villes/{id}', [UserController::class, 'getVilles']);
// pour generer les villes
Route::get('/generervilles', [UserController::class, 'genererVilles']);
// pour generer les provinces
Route::get('/provinces', [UserController::class, 'insererProvinces']);

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

