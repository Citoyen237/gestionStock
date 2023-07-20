<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Produit;
use App\Models\Facture2;
use App\Models\Facture3;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Controllers\BilanAchatController;

class NewAchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //repuration du dernier id de la facture
        $lastOne = Facture3::latest('id')->first();
        //calcul de l'id de la prochaine
        $facture_id = $lastOne->id + 1;
        $commandes = Achat::where('codefac',$facture_id)->paginate(44);
        //somme des element d'une table
        $totalr = Achat::where('codefac',$facture_id)->sum('total');
        $produits = Produit::orderBy('nom', 'asc')->paginate(45);
        $clients = Fournisseur::orderBy('nom', 'asc')->paginate(50);
        return view('newAchat', [
            'clients' => $clients,
            'produits' => $produits,
            'facture_id' => $facture_id,
            'commandes' => $commandes,
            'totalr' => $totalr,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'produit_id' => ['required'],
            'prixu' => ['required'],
            'quandite' => ['required','min:1'],
        ]);
        $total = ($request->prixu) * ($request->quandite);
        $lastOne = Facture3::latest('id')->first();
        $facture_id = $lastOne->id + 1;
       // dd($facture_id);
        Achat::create([
            'produit_id' => $request->produit_id,
            'prixu' => $request->prixu,
            'quandite' => $request->quandite,
            'total' => $total,
            'codefac' => $facture_id,
        ]);
        $produits = Produit::orderBy('nom', 'asc')->paginate(45);
        //dd($produits);
        $clients = Fournisseur::orderBy('nom', 'asc')->paginate(50);
        $fff="$facture_id";
        $commandes = Achat::where('codefac',$facture_id)->paginate(14);
        $totalr = Achat::where('codefac',$facture_id)->sum('total');;
        //dd($commandes);
        return redirect('/Bon-de-commande');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Achat $commande)
    {
        //
        //dd($commande);

        $commande->delete();

        return back()->with("successDelete", "supprime avec succes");
    }

    public function validation(Request $request){

        $request->validate([
            'client_id'=>['required','exists:clients,id'],
        ]);

        Facture3::create([
           'client_id'=>$request->client_id,
           'total'=>$request->total,
           'type'=>$request->type,
           'code_fac'=>$request->code_fac,
           'fournisseur_id'=>$request->client_id,
        ]);

        return redirect('/liste-des-bons');

    }
}
