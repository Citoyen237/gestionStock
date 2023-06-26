<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\MaintenanceCtrontroller;
use App\Http\Controllers\NewVenteController;
use App\Models\Fournisseur;
use App\Models\Maintenance;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/profile', [UsersController::class,'profile'])->name('profile');
Route::get('/categorie',[CategorieController::class,'index'])->name('categorie');
Route::post('/categorie/creer-categorie', [CategorieController::class, 'store'])->name('create');
Route::delete('categorie/{categorie}',[CategorieController::class, 'delete'] )->name('categorie.delete');
//Route::get("/Categorie/{categorie}", [CategorieController::class, "edit"])->name("etudiant.edit");
Route::get('/produit/nouveau', [ProduitController::class ,'index'] )->name('produit.create');
Route::Post('/produit/nouveau', [ProduitController::class ,'store'] )->name('produit.store');
Route::get('/stock/produits', [ProduitController::class, 'liste'])->name('produit.liste');
Route::get('/produit/{produit}', [ProduitController::class, 'edit'])->name('produit.edit');
Route::delete('/supprimer-un-produit/{produit}',[ProduitController::class, 'delete'])->name('produit.delete');
Route::put('/produit/Modifier-produit/{produit}', [ProduitController::class, 'updated'])->name('produit.update');

//crud clients
Route::get('/clients', [ClientController::class,'index'])->name('client.liste');
Route::post('/client/ajouter',[ClientController::class,'store'])->name('client.store');


//crud vente
Route::get('/vente-au-comptoire', [NewVenteController::class, 'index'])->name('newvente.index');


//maintenance
Route::get('/maintenance',[MaintenanceCtrontroller::class, 'index'])->name('maintenance.index');
Route::get('/maintenance/noveau', [MaintenanceCtrontroller::class, 'create'])->name('maintenance.create');
Route::post('/Maintenance/save', [MaintenanceCtrontroller::class, 'store'])->name('maintenance.store');

//depenses
Route::get('/depenses',[DepenseController::class,'index'])->name('depense.index');
Route::post('/depense/save',[DepenseController::class,'store'])->name('depense.store');


//fournisseurs

Route::get('/fournisseurs',[FournisseurController::class,'index'])->name('fornisseur.index');
Route::post('/fournisseur/store', [FournisseurController::class,'store'])->name('fournisseur.store');
