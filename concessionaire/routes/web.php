<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('user.login');
});
// Route::get('/register', function () {
//     return view('user.signup');
// });

Route::get('/inscription', [UserController::class, 'create'])->name('user.create');
Route::get('/villes', [UserController::class, 'getVilles']);
