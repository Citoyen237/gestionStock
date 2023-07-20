<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Achat;
use App\Models\Client;
use App\Models\Depense;
use App\Models\Produit;
use App\Models\Ventes3;
use App\Models\Facture3;
use App\Models\Fournisseur;

use App\Models\Maintenance;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\BilanVenteContoller;

class PdfController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function depense(){
        $depenses = Depense::orderBy('created_at','desc')->get();
        $solde = Depense::all()->sum('montant');
        $pdf=Pdf::loadView('pdf.depense',[
            'depenses'=>$depenses,
            'solde' => $solde,
        ]);

        return $pdf->stream();
    }

    public function maintenance(){
        $maintenances = Maintenance::orderBy('created_at','desc')->get();
        $solde = Maintenance::all()->sum('montant');
        $pdf=Pdf::loadView('pdf.maintenance',[
            'maintenances'=>$maintenances,
            'solde' => $solde,
        ]);
        return $pdf->stream();
    }

    public function client(){
        $clients = Client::orderBy('created_at','desc')->get();
        $pdf=Pdf::loadView('pdf.client',[
            'clients'=>$clients,
        ]);
        return $pdf->stream();
    }

    public function fournisseur(){
        $fournisseurs = Fournisseur::orderBy('created_at','desc')->get();
        $pdf=Pdf::loadView('pdf.fournisseur',[
            'fournisseurs'=>$fournisseurs,
        ]);
        return $pdf->stream();

    }

    public function produit(){
        $produits = Produit::orderBy('created_at','desc')->get();
        $pdf=Pdf::loadView('pdf.produit',[
            'produits'=>$produits,
        ]);
        return $pdf->stream();
    }

    public function factureV($id){
        $ventes=Ventes3::where('codefac',$id)->paginate(45);
        $facture=Facture3::where('code_fac',$id)->get();
        //dd($facture);
       //dd($ventes);
        $pdf=Pdf::loadView('pdf.factureV',[
            'ventes'=>$ventes,
            'facture'=>$facture,
        ]);
        return $pdf->stream();
    }

    public function factureA($id){
        $achats=Achat::where('codefac',$id)->paginate(45);
        $facture=Facture3::where('code_fac',$id)->get();
        //dd($facture);
       //dd($achats);
        $pdf=Pdf::loadView('pdf.factureA',[
            'achats'=>$achats,
            'facture'=>$facture,
        ]);
        return $pdf->stream();
    }

    public function suivis($id){
        $produits=Produit::where('id',$id)->get();
        $pdf=Pdf::loadView('pdf.suivis',[
            'produits'=>$produits,
        ]);
        return $pdf->stream();

    }
}
