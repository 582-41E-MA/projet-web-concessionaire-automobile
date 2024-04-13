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

Route::get('/villes/{id}', [UserController::class, 'getVilles']);
// pour generer les villes
Route::get('/generervilles', [UserController::class, 'genererVilles']);
// pour generer les provinces
Route::get('/provinces', [UserController::class, 'insererProvinces']);
