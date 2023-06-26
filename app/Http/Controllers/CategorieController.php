<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $categories=Categorie::all();
        return view('categorie',[
            'categories'=>$categories,
        ]);
    }

    public function store(Request $request){


        $request->validate([
            'nom' => ['required','unique:categories'  ],
        ]);

        Categorie::create([
           'nom'=>$request->nom,
        ]);

        return back()->with("successCreate", "Categorie $request->nom creer avec success");
    }

    public function delete(Categorie $categorie){
            $nom_com=$categorie->nom;
            $categorie->delete();
            return back()->with("successDelete", "Categorie $nom_com supprime avec succes");
    }


}
