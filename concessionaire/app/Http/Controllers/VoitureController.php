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

  
    //  * Show the form for creating a new resource.
    //  */
    public function create()
    {
        
        return view('voiture.create');
    
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
