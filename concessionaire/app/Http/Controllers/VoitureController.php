<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use App\Models\Carrosserie;
use App\Models\Pays;


class VoitureController extends Controller
{
    // function pour generer les carrosserie de voiture en en et en fr dans la bd
    public function genererCarrosseries(){
        $tableauCarro = [
            ['Berline', 'Sedan'], ['Coupé', 'Coupe'], ['Camion', 'Truck'], ['Commercial', 'Commercial'], ['VUS', ' SUV'], ['Hayon', 'Hatchback'], ['Cabriolet', 'Convertible'], ['Fourgonnette', 'Van']
        ];

        foreach ($tableauCarro as $carro => $value) {
            # code...
            $province = Carrosserie::create([
                'carrosserie_en' => $value[0],
                'carrosserie_fr' => $value[1]
            ]);
        };
    }
    // function pour generer les pays en anglais et en francais dans la bd
    public function genererPays(){
        $pays_en_json = resource_path('data/pays_en.json');
        $pays_fr_json = resource_path('data/pays_fr.json');
        $json_read_pays_en = file_get_contents($pays_en_json);
        $json_read_pays_fr = file_get_contents($pays_fr_json);
        $json_pays_en = json_decode($json_read_pays_en, true);
        $json_pays_fr = json_decode($json_read_pays_fr, true);
        foreach($json_pays_en as $pays_en => $value_en){
            foreach($json_pays_fr as $pays_fr => $value_fr){
                if($value_en['code'] == $pays_fr){
                    array_unshift($value_en, $value_fr);
                    $new_countries_array[] = $value_en;
                }
            }
        }
        foreach ($new_countries_array as $pays => $value) {
            $pays = Pays::create([
                'pays_en' => $value['name'],
                'pays_fr' => $value[0]
            ]);
        };
    }
    //
    // api link:
    // /api/explore/v2.1/catalog/datasets/all-vehicles-model/records?limit=20
      /**
     * Show the form for creating a new resource.
     */
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
