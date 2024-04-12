<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\PolitiquesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
<<<<<<< HEAD
    return view('welcome');
=======
    return view('pages.accueil');
>>>>>>> saif
});

Route::get('/contact', function () {
    return view('pages.nouscontacter');
});
<<<<<<< HEAD
Route::get('/about', function () {
    return view('pages.aproposdenous');
});
Route::get('/politiques', function () {
    return view('pages.politiques');
=======
Route::get('/apropos', function () {
    return view('pages.nouscontacter');
});
Route::get('/politiques', function () {
    return view('pages.nouscontacter');
>>>>>>> saif
});

Route::get('/contact', [ContactController::class, 'index'])->name('pages.nouscontacter');
Route::get('/apropos', [AproposController::class, 'index'])->name('pages.aproposdenous');
Route::get('/politiques', [PolitiquesController::class, 'index'])->name('pages.politiques');

Route::get('/inscription', [UserController::class, 'create'])->name('user.create');
Route::get('/villes/{id}', [UserController::class, 'getVilles']);

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

