<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use App\Models\Carrosserie;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Pays;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;



class VoitureController extends Controller
{

    // get modeles from marque id
    public function getModeles(Request $request, $id)
    {
        $marqueId = $request->id;
        $modeles = Modele::where('modele_marque_id', $marqueId)->get();
        return response()->json($modeles);
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
            'photos' => 'required|array',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'annee' => 'required|numeric',
            'date_arrivee' => 'required|date',
            'prix_base' => 'required|numeric',
            'taux_augmenter' => 'required|numeric|min:0|max:100',
            'prix_paye' => 'required|numeric',
            'carrosserie' => 'required|numeric',
            'marque' => 'required|numeric',
            'modele' => 'required|numeric',
            'pays' => 'required|numeric',
        ]);
        // return $request -> date_arrivee;
        $voiture = Voiture::create([
            'description_fr' => $request->description_fr,
            'description_en' => $request->description_en,
            'annee' => $request->annee,
            'date_arrivee' => $request -> date_arrivee,
            'prix_base' => $request->prix_base,
            'taux_augmenter' => $request->taux_augmenter,
            'prix_paye' => $request->prix_paye,
            'modele_id' => $request->modele,
            'carrosserie_id' => $request->carrosserie,
            'employe_id' => Auth::id(),
            'pays_id' => $request->pays,
        ]);

        $photosArray = $request -> photos;
        foreach ($photosArray as $key => $photo) {
            $photosVoiture = Photo::create([
                'photo_titre' => $photo[0],
                'photo_voiture_id' => $voiture ->id
            ]);
        }
        print_r($photosArray);

        // return  redirect()->route('voiture.show', $voiture->id)->with('success', 'voiture created successfully!');

    }

}
