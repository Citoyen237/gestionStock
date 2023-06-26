<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceCtrontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenances = Maintenance::orderBy("created_at", "desc")->paginate(10);
        return view('maintenance', [
            'maintenances' => $maintenances,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::orderBy("nom", "asc")->paginate(50);
        return view('newMaintenance', [
            'clients' => $clients,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $request->validate([

            'nom' => ['required'],
            'serie' => ['required', 'unique:maintenances'],
            'taff_effectuer' => ['required'],
            'montant' => ['required'],
            'user_id' => ['required', 'exists:users,id'],
            'client_id' => ['required', 'exists:clients,id']
        ]);

        Maintenance::create([

            'nom' => $request->nom,
            'serie' => $request->serie,
            'taff_effectuer' => $request->taff_effectuer,
            'montant' => $request->montant,
            'user_id' => $request->user_id,
            'client_id' => $request->client_id,

        ]);

        $maintenances = Maintenance::orderBy("created_at", "desc")->paginate(10);
        return view('maintenance', [
            'maintenances' => $maintenances ]);
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
