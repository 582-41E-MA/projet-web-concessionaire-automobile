<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\PolitiquesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User_reserveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoitureController; 
use App\Http\Controllers\DataController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;

Route::get('/', [VoitureController::class, 'latest'])->name('accueil');

Route::get('/contact', [ContactController::class, 'index'])->name('pages.nouscontacter');
Route::get('/about', [AproposController::class, 'index'])->name('pages.aproposdenous');
Route::get('/politiques', [PolitiquesController::class, 'index'])->name('pages.politiques');

Route::get('/commandes', [CommandeController::class, 'index'])->name('commande.index');
Route::get('/commande/{commande}', [CommandeController::class, 'show'])->name('commande.show');
Route::get('/pdf/{commande}', [CommandeController::class, 'genererPDF'])->name('commande.pdf');


Route::get('/inscription', [UserController::class, 'create'])->name('user.create');
Route::post('/inscription', [UserController::class, 'store'])->name('user.store');

Route::middleware('auth')->group(function () {
    Route::get('/edit/user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/edit/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/reservation', [User_reserveController::class, 'index'])->name('reservation.index');
    Route::post('/reservation', [User_reserveController::class, 'store'])->name('reservation.store');
    Route::delete('/reservation/{reservation}', [User_reserveController::class, 'destroy'])->name('reservation.delete');
});

Route::get('/villes/{id}', [UserController::class, 'getVilles']);

Route::get('/modeles/{id}', [voitureController::class, 'getModeles']);
// pour generer les villes
Route::get('/generervilles', [DataController::class, 'genererVilles']);
// pour generer les provinces
Route::get('/provinces', [DataController::class, 'insererProvinces']);
// pour generer les carrosseries
Route::get('/generercarrosseries', [DataController::class, 'genererCarrosseries']);
// pour generer les pays
Route::get('/genererpays', [DataController::class, 'genererPays']);
// pour generer les marques
Route::get('/generermarques', [DataController::class, 'genererMarquesetModeles']);

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/voitures', [VoitureController::class, 'index'])->name('voiture.index');
Route::get('/voitures/filtre', [VoitureController::class, 'indexFiltreVoiture'])->name('voiture.indexFiltre');
Route::get('/voiture/{voiture}', [VoitureController::class, 'show'])->name('voiture.show');

Route::middleware('auth')->group(function () {
Route::get('/create/voiture', [VoitureController::class, 'create'])->name('voiture.create');
Route::post('/create/voiture', [VoitureController::class, 'store'])->name('voiture.store');
Route::get('/edit/voiture/{voiture}', [VoitureController::class, 'edit'])->name('voiture.edit');
Route::put('/edit/voiture/{voiture}', [VoitureController::class, 'update'])->name('voiture.update');
Route::delete('/voiture/{voiture}', [VoitureController::class, 'destroy'])->name('voiture.delete');
});

Route::middleware('auth')->group(function () {
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/adminclients', [AdminController::class, 'client'])->name('admin.client');
Route::get('/adminvoitures', [AdminController::class, 'voiture'])->name('admin.voiture');
Route::get('/adminmarques', [AdminController::class, 'marque'])->name('admin.marques');

Route::get('/adminfiltreEmployee', [AdminController::class, 'filtreEmployee'])->name('admin.filtreEmployee');
Route::get('/adminfiltreClient', [AdminController::class, 'filtreClient'])->name('admin.filtreClient');
Route::get('/adminfiltreVoiture', [AdminController::class, 'filtreVoiture'])->name('admin.filtreVoiture');
Route::get('panier', [PanierController::class, 'index'])->name('panier.index');
Route::post('panier', [PanierController::class, 'store'])->name('panier.store');
Route::post('panier/delete', [PanierController::class, 'destroy'])->name('panier.delete');
});


Route::post('checkout', [CommandeController::class, 'checkout'])->name('commande.checkout');
Route::get('success', [CommandeController::class, 'success'])->name('commande.success');
Route::get('cancel', [CommandeController::class, 'cancel'])->name('commande.cancel');
Route::post('webhook', [CommandeController::class, 'webhook'])->name('commande.webhook');


Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

