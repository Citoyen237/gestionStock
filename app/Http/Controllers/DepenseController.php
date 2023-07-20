<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use Illuminate\Http\Request;

class DepenseController extends Controller
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
        $depenses = Depense::orderBy("created_at", "desc")->paginate(10);
        $solde=Depense::sum('montant');
        return view('depense', [
            'depenses' => $depenses,
            'solde' => $solde,
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
            'motif' => ['required', 'unique:depenses'],
            'montant' => ['required'],
            'user_id' => ['required', 'exists:users,id'],
        ]);


        Depense::create([
            'motif' => $request->motif,
            'montant' => $request->montant,
            'user_id' => $request->user_id,
        ]);

        $depenses = Depense::orderBy("created_at", "desc")->paginate(10);
        $solde=Depense::sum('montant');
        return view('depense', [
            'depenses' => $depenses,
            'solde' => $solde,
        ]);
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
    public function destroy($id)
    {
        //
    }
}
