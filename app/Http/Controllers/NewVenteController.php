<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Produit;
use App\Models\Ventes3;
use App\Models\Facture2;
use App\Models\Facture3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\BilanVenteContoller;

class NewVenteController extends Controller
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
        //
        $lastOne = Facture3::latest('id')->first();
        $facture_id = $lastOne->id + 1;
        $commandes = Ventes3::where('codefac', $facture_id)->paginate(44);
        $totalr = Ventes3::where('codefac', $facture_id)->sum('total');
        $i = 1;
        // while($i<=$commandes->count()){
        // dd($commandes->count());
        // $totalr=$totalr+$commandes->total;
        // $i++;
        // }
        $produits = Produit::orderBy('nom', 'asc')->paginate(45);
        $clients = Client::orderBy('nom', 'asc')->paginate(50);
        return view('newVente', [
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
            'quandite' => ['required', 'min:1'],
        ]);
        $total = ($request->prixu) * ($request->quandite);
        $lastOne = Facture3::latest('id')->first();
        $facture_id = $lastOne->id + 1;
        $prods = Produit::where('id', $request->produit_id)->get();
        foreach ($prods as $prod) {
            $quadit = $prod->quandite;
        }
        if ($quadit < $request->quandite) {
            return back()->with("quandite", "la quandite en stock est insufisante");
        } else {
            Ventes3::create([
                'produit_id' => $request->produit_id,
                'prixu' => $request->prixu,
                'quandite' => $request->quandite,
                'total' => $total,
                'codefac' => $facture_id,
            ]);
            $produits = Produit::orderBy('nom', 'asc')->paginate(45);
            //dd($produits);
            $clients = Client::orderBy('nom', 'asc')->paginate(50);
            $fff = "$facture_id";
            $commandes = Ventes3::where('codefac', $facture_id)->paginate(14);
            $totalr = Ventes3::where('codefac', $facture_id)->sum('total');

            return redirect('/vente-au-comptoire');
        }
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
    public function updated(Request $request, $id)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Ventes3 $commande)
    {
        //
        //dd($commande);

        $commande->delete();

        return back()->with("successDelete", "supprime avec succes");
    }

    public function validation(Request $request)
    {

        $request->validate([
            'client_id' => ['required', 'exists:clients,id'],
        ]);


        $updates = Ventes3::where('codefac', $request->code_fac)->get();
        foreach ($updates as $updat) {
            $id_pro = $updat->produit_id;
            $qdt = $updat->quandite;
            //dd($qdt);
            $produitss = Produit::where('id', $id_pro)->get();
            foreach ($produitss as $produits) {
                $newqdt = $produits->quandite - $qdt;
                $id=$produits->id;
                $id->update([
                    'quandite' => $newqdt,
                ]);
                dd($produits->quandite);
            }
        }


        Facture3::create([
            'client_id' => $request->client_id,
            'total' => $request->total,
            'type' => $request->type,
            'code_fac' => $request->code_fac,
            'fournisseur_id' => $request->client_id,
        ]);

        //
        return redirect('/liste-des-ventes');
    }
}
