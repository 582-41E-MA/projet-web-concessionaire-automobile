<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use App\Models\Carrosserie;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Pays;
use App\Models\User;
use App\Models\Province;
use App\Models\Ville;


class DataController extends Controller
{
    // Function pour générer les villes dans la bd en englais et en francais
    public function genererVilles (){
        // chemin des villes du fichier json
        $path_villes = resource_path('data/cities.json');
        // lire le contenu json
        $json_read = file_get_contents($path_villes);
        // le transformer en array
        $json_villes = json_decode($json_read, true);
        // rajouter l'id des provinces dans leur villes respectives
        $array_ids =[['BC', 2], ['SK', 10], ['AB', 1], ['QC', 9], ['ON', 7], ['NT', 12], ['NS', 6], ['NL', 5], ['NT', 11], ['PE', 8], ['NB', 4], ['MB', 3], ['YT', 13]];
        foreach ($json_villes as $ville => $value) {

            foreach ($array_ids as $key2 => $pair_id) {

                if($value[1] == $pair_id[0]){     
                    array_unshift($value, $pair_id[1]);
                    $new_villes_array[] = $value;
                }
            }
        }
        // Créer les villes dans la bd
        foreach ($new_villes_array as $ville => $value) {
            $nouvelleVille = Ville::create([
                    'ville_en' => $value[1],
                    'ville_fr' => $value[1],
                    'ville_province_id' => $value[0]
                ]);
        }

    }

    // Function pour générer les provinces dans la bd en englais et en francais
    public function insererProvinces(){
        $provinces_en_fr = [
            ['Alberta', 'Alberta'], ['British Columbia', 'Colombie-Britannique'], ['Manitoba','Manitoba'], ['New Brunswick', 'Nouveau-Brunswick'], ['Newfoundland and Labrador', 'Terre-Neuve-et-Labrador'], ['Nova Scotia', 'Nouvelle-Écosse'], ['Ontario','Ontario'], ['Prince Edward Island', 'Île-du-Prince-Édouard'], ['Quebec','Quebec'], ['Saskatchewan','Saskatchewan'], ['Northwest Territories','Territoires du Nord-Ouest'], ['Nunavut', 'Nunavut'], ['Yukon','Yukon']
        ];

        foreach ($provinces_en_fr as $prov => $value) {
            # code...
            $province = Province::create([
                'province_en' => $value[0],
                'province_fr' => $value[1]
            ]);
        };
    }

    // function pour generer les carrosserie de voiture en en et en fr dans la bd
    public function genererMarquesetModeles(){
        $modeles_en_json = resource_path('data/marqueModele.json');
        $json_read_modeles = file_get_contents($modeles_en_json);
        $array_modeles = json_decode($json_read_modeles, true);
        $counter = 1;
        foreach ($array_modeles as $key => $voiture) {
            $voiture['modele_id'] = $counter;
            $counter++;
            $new_modeles_array[] = $voiture;
           
        }
        foreach ($new_modeles_array as $key => $voiture) {
            // inserer les marques
              $lesMarquesBD = Marque::create([
                'marque_en' => $voiture['marque'],
                'marque_fr' => $voiture['marque']
            ]);
            // print_r($voiture['marque']);
            // inserer les modeles
            foreach ($voiture['modeles'] as $modele => $value) {
            // print_r($voiture['modele_id']);
                $lesModelesBD = Modele::create([
                  'modele_en' => $value,
                  'modele_fr' => $value,
                  'modele_marque_id' => $voiture['modele_id']

              ]);
            }
        }

    }
    // function pour generer les carrosserie de voiture en en et en fr dans la bd
    public function genererCarrosseries(){
        $tableauCarro = [
            ['Berline', 'Sedan'], ['Coupé', 'Coupe'], ['Camion', 'Truck'], ['Commercial', 'Commercial'], ['VUS', ' SUV'], ['Hayon', 'Hatchback'], ['Cabriolet', 'Convertible'], ['Fourgonnette', 'Van']
        ];

        foreach ($tableauCarro as $carro => $value) {
            # code...
            $carros = Carrosserie::create([
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
} 
