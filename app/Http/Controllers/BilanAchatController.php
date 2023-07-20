<?php

namespace App\Http\Controllers;

use App\Models\Facture2;
use App\Models\Facture3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BilanAchatController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $factures=Facture3::where('type','achat')->orderBy('created_at','desc')->get();
        $solde=Facture3::where('type','achat')->sum('total');
        return view('bilanAchat',[
            'factures'=>$factures,
            'solde'=>$solde,
        ]);
    }
}
