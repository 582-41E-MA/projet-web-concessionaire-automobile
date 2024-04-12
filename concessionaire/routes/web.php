<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcom.blade.php');
});

Route::get('/contact', function () {
    return view('pages.nouscontacter');
});


Route::get('/inscription', [UserController::class, 'create'])->name('user.create');
Route::get('/villes', [UserController::class, 'getVilles']);

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

