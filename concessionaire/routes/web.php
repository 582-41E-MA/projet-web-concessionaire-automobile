<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('pages.nouscontacter');
});
Route::get('/about', function () {
    return view('pages.aproposdenous');
});
Route::get('/politiques', function () {
    return view('pages.politiques');
});


Route::get('/inscription', [UserController::class, 'create'])->name('user.create');
Route::get('/villes/{id}', [UserController::class, 'getVilles']);

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

