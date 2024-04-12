<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('user.login');
});

Route::get('/contact', function () {
    return view('pages.nouscontacter');
});


Route::get('/inscription', [UserController::class, 'create'])->name('user.create');
Route::get('/villes', [UserController::class, 'getVilles']);
