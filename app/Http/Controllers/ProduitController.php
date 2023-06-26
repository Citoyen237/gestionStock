<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProduitController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // if(!Gate::allows('role-admin')){
        //     abort('403');
        // }

        $Categories = Categorie::all();
        return view(
            'createproduit',
            [
                'categories' => $Categories,
                
            ]
        );
    }

    //afficher la liste de produit
    public function liste()
    {
        $produits = Produit::orderBy("nom", "asc")->paginate(10);
        return view('produits', [
            'produits' => $produits,
        ]);
    }

    //enregistrer le produit
    public function store(Request $request)
    {
        $request->validate([
            'categorie_id' => ['required', 'exists:categories,id'],
            'nom' => ['required', 'unique:categories,nom'],
            'quandite' => ['required'],
            'quan_min' => ['required'],
            'description' => ['required'],
            'prix' => ['required'],
        ]);

        Produit::create([
            'nom' => $request->nom,
            'quandite' => $request->quandite,
            'quan_min' => $request->quan_min,
            'description' => $request->description,
            'prix' => $request->prix,
            'categorie_id' => $request->categorie_id,
        ]);

        $produits = Produit::orderBy("created_at", "desc")->paginate(10);

        return view('produits', [
            'produits' => $produits,
        ]);
    }

    public function edit(Produit $produit)
    {
        $Categories = Categorie::all();
        return view('editProduit', [
            'produit' => $produit,
            'categories' => $Categories,
        ]);
    }


    public function updated(Request $request, Produit $produit)
    {

        $request->validate([
            'categorie_id' => ['required', 'exists:categories,id'],
            'nom' => ['required', 'unique:categories,nom'],
            'quandite' => ['required'],
            'quan_min' => ['required'],
            'description' => ['required'],
            'prix' => ['required'],
        ]);

        $produit->update([
            'nom' => $request->nom,
            'quandite' => $request->quandite,
            'quan_min' => $request->quan_min,
            'description' => $request->description,
            'prix' => $request->prix,
            'categorie_id' => $request->categorie_id,
        ]);

        $produits = Produit::orderBy("created_at", "desc")->paginate(10);

        return view('produits', [
            'produits' => $produits,
        ]);
    }


    public function delete(Produit $produit)
    {
        $nom_com = $produit->nom;
        $produit->delete();
        return back()->with("successDelete", "Produit $nom_com supprime avec succes");
    }
}
