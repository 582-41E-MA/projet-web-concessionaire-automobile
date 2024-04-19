<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use App\Models\Carrosserie;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Pays;


class VoitureController extends Controller
{

    // get modeles from marque id
    public function getModeles(Request $request, $id)
    {
        $marqueId = $request->id;
        $modeles = Modele::where('modele_marque_id', $marqueId)->get();
        return response()->json($modeles);
    }   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voitures = Voiture::all();
        return view('voiture.index', ['voitures'=>$voitures]);
    }

    //  * Show the form for creating a new resource.
    //  */
    public function create()
    {
        $pays = Pays::all();
        $carrosseries = Carrosserie::all();
        $marques = Marque::all();
        
        return view('voiture.create', ["pays" => $pays, "carrosseries" => $carrosseries, "marques" => $marques ]);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|max:191',
            'contenu' => 'required|string',
        ]);

        $voiture = Voiture::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'langue' => 'fr',
            'user_id' =>  Auth::id(), 
        ]);

        return  redirect()->route('voiture.show', $voiture->id)->with('success', 'voiture created successfully!');

    }

}
