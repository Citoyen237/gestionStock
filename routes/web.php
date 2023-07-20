<?php

use App\Http\Controllers\BilanAchatController;
use App\Models\Fournisseur;
use App\Models\Maintenance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\NewAchatController;
use App\Http\Controllers\NewVenteController;
use App\Http\Controllers\BilanVenteContoller;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\MaintenanceCtrontroller;
use App\Http\Controllers\PdfController;
use App\Models\Depense;
use App\Models\Facture3;
use App\Models\User;
use App\Models\Ventes3;

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
    return view('dashboard',[
        'ventes' => Facture3::where('type','vente')->get(),
        'achats' => Facture3::where('type','achat')->get(),
        'depenses' => Depense::all(),
        'maintenances' => Maintenance::all(),
    ]);
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
Route::post('/new-vente/store', [NewVenteController::class,'store'])->name('newvente.store');
Route::get('/liste-des-ventes',[BilanVenteContoller::class, 'index'])->name('vente.liste');
Route::delete('/new-vente/{commande}',[NewVenteController::class, 'delete'])->name('newvente.delete');
Route::post('/facturation',[NewVenteController::class, 'validation'])->name('facturation.validation');

//crud achat
Route::get('/Bon-de-commande', [NewAchatController::class, 'index'])->name('newachat.index');
Route::post('/new-achat/store', [NewAchatController::class,'store'])->name('newachat.store');
Route::get('/liste-des-bons',[BilanAchatController::class, 'index'])->name('achat.liste');
Route::delete('/new-achat/{commande}',[NewAchatController::class, 'delete'])->name('achat.delete');
Route::post('/facturationA',[NewAchatController::class, 'validation'])->name('facturationA.validation');

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

//pdf manager
Route::get('/liste_des_depenses_pdf',[PdfController::class,'depense'])->name('pdf.depense');
Route::get('/liste_des_appariels_maintenu_pdf',[PdfController::class, 'maintenance'])->name('pdf.maintenance');
Route::get('/liste_des_clients_pdf', [PdfController::class, 'client'])->name('pdf.client');
Route::get('/liste_des_fournisseurs_pdf', [PdfController::class, 'fournisseur'])->name('pdf.fournisseur');
Route::get('/liste_des_produits_pdf',[PdfController::class, 'produit'])->name('pdf.produit');
Route::get('/Facturation/{id}',[PdfController::class, 'factureV'])->name('pdf.factureV');
Route::get('/Bon_de_commande/{id}',[PdfController::class, 'factureA'])->name('pdf.factureA');
Route::get('/fiche_de_stock/{id}',[PdfController::class, 'suivis'])->name('suivis');


//users
Route::get('/utilisateurs', function(){
    return view('user',['utilisateurs'=>User::all()]);

})->name('user.liste');
