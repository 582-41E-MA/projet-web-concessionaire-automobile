<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use App\Models\Photo;
use App\Models\Carrosserie;
use App\Models\Marque;
// pour le calcul sur le temps
use Carbon\Carbon;
use App\Models\Modele;
use App\Models\Pays;
use App\Models\User_reserve;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;


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
     */
    public function index()
    {
        //
        $reservations = User_reserve::all(); 
        $voitures_reservees = [];
        $voitures = Voiture::all();
        $photos = Photo::all(); 
        $marques = Marque::all();
        $carrosseries = Carrosserie::all();
        if(isset($reservations)){
            foreach ($voitures as $key => $voiture) {
                foreach ($reservations as $key => $reservation) {
                    if ($voiture->id == $reservation->ur_voiture_id) {
                        $voitures_reservees[] = $voiture->id;
                    }
                }
            }
        }
        return view('voiture.index', ["voitures" => $voitures, "photos" => $photos, 'marques' => $marques, 'carrosseries' => $carrosseries, "voitures_reservees" => $voitures_reservees ]);
    }

        /**
     * Display a listing of the resource.
     */

    public function indexFiltreVoiture(Request $request)
    {

        $modeles = Modele::query(); 
        $voitures = Voiture::query(); 
        
        if ($request['marque']) {

        $modelesFiltre = $modeles->whereIn('modele_marque_id', $request['marque']);

        $modelesFiltre = $modelesFiltre->get();

        foreach ($modelesFiltre as $modele) {
            $modeleIds[] = $modele['id'];
        }

        $voitures->whereIn('modele_id', $modeleIds);
        
        }

        // Filtrer par carrosserie
        if ($request['carrosserie']) {
            $voitures->whereIn('carrosserie_id', $request['carrosserie']);
        }
        
        // Filtrer par année
        if ($request['annee']) {
            $voitures->where('annee', $request['annee']);
        }
        
        // Exécuter la requête pour obtenir les résultats
        $voitures = $voitures->get();

        // return $resultats;

        $reservations = User_reserve::all(); 
        $voitures_reservees = [];

        $photos = Photo::all(); 
        $marques = Marque::all();
        $carrosseries = Carrosserie::all();
        
        if(isset($reservations)){
            foreach ($voitures as $key => $voiture) {
                foreach ($reservations as $key => $reservation) {
                    if ($voiture->id == $reservation->ur_voiture_id) {
                        $voitures_reservees[] = $voiture->id;
                    }
                }
            }
        }
        return view('voiture.index', ["voitures" => $voitures, "photos" => $photos, 'marques' => $marques, 'carrosseries' => $carrosseries, "voitures_reservees" => $voitures_reservees ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function latest()
    {
        //
        $voitures = Voiture::latest()->take(3)->get();
        $photos = Photo::all(); 
        $marques = Marque::all(); 
        return view('welcome', ["voitures" => $voitures, "photos" => $photos, 'marques' => $marques]);
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
            'photos' => 'required',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'annee' => 'required|numeric',
            'date_arrivee' => 'required|date',
            'prix_base' => 'required|numeric',
            'taux_augmenter' => 'required|numeric|min:0|max:100',
            'carrosserie' => 'required|numeric',
            'marque' => 'required|numeric',
            'modele' => 'required|numeric',
            'pays' => 'required|numeric',
        ]);

        //calcule de prix_paye

        $prix_benefice = ($request->taux_augmenter / 100) * $request->prix_base;
        $prix_paye = $prix_benefice + $request->prix_base;

        $voiture = Voiture::create([
            'description_fr' => $request->description_fr,
            'description_en' => $request->description_en,
            'annee' => $request->annee,
            'date_arrivee' => $request -> date_arrivee,
            'prix_base' => $request->prix_base,
            'taux_augmenter' => $request->taux_augmenter,
            'prix_paye' => $prix_paye,
            'modele_id' => $request->modele,
            'carrosserie_id' => $request->carrosserie,
            'employe_id' => Auth::id(),
            'pays_id' => $request->pays,
            'commande_id' => null,
        ]);
        
        $photosArray[] = $request -> photos;
        // Chemin du répertoire
        $directory = public_path('images') . '/' . $voiture->id;

        // Vérifie si le répertoire n'existe pas déjà
        if (!file_exists($directory)) {
            // Crée le répertoire avec les permissions nécessaires (par exemple, 0777 pour tous les droits)
            mkdir($directory, 0777, false);
        }
        // return $path;

        foreach ($photosArray as $key => $photo) {
            foreach ($photo as $key => $singlePhoto) {
                $manager = new ImageManager(new Driver());
                $picName = $singlePhoto->getClientOriginalName();
                $img = $manager->read($singlePhoto);
                $img = $img->resize(622, 400);
                
                $img = $img->toJpeg(80)->save(base_path('public/images/'. $voiture->id.'/'. $picName));


                // $singlePhoto -> move($path, $picName);

                $photosVoiture = Photo::create([
                        'photo_titre' => $picName,
                        'photo_voiture_id' => $voiture ->id
                    ]);
            }
        }

        return  redirect()->route('voiture.show', $voiture->id)->with('success', __('lang.controllers.car_created_success'));

    }

        /**
     * Display the specified resource.
     */
    public function show(Voiture $voiture)
    {
        $marques = Marque::all();
        $voitures_reservees = [];
            # code...
            $temps_restant= 0;
            $reservations = User_reserve::where('ur_voiture_id', $voiture->id)->get(); 
            if(isset($reservations)){
                foreach ($reservations as $reservation) {
                    $current_time = Carbon::now();
                    $temps_limite = $reservation->created_at->addDay();
                    $temps_restant = $temps_limite->diff($current_time);
                    $voitures_reservees[] = [Voiture::find($reservation->ur_voiture_id), $reservation, $temps_restant];
                };
            }
      
            
            return view('voiture.show', ['voiture' => $voiture, 'marques' => $marques, 'voitures_reservees' => $voitures_reservees]);
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voiture $voiture)
    {
        //
        $pays = Pays::all();
        $photos = Photo::where('photo_voiture_id', $voiture->id)->get();
        $carrosseries = Carrosserie::all();
        $marques = Marque::all();
        $modeles = Modele::all();
        // $modele = Modele::where('modele_marque_id', $marqueId)->get();

        
        return view('voiture.edit', ['voiture' => $voiture, "photos" => $photos, "pays" => $pays, "carrosseries" => $carrosseries, "marques" => $marques, 'modeles' => $modeles ]);
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voiture $voiture)
    {
        $request->validate([
            'photos' => 'required',
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

        $voiture -> update([
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
            'commande_id' => null,
        ]);

        $photosArray[] = $request -> photos;
        $path = public_path('images').'/'.$voiture -> id;
        // Check if the folder exists
        // return (Storage::exists($path));
        if (Storage::exists($path)) {
            // Delete all files and subdirectories inside the folder
            Storage::deleteDirectory($path);
        }
        $photos = Photo::where('photo_voiture_id', $voiture->id)->get();
        foreach ($photos as $key => $singlePhoto) {
            $singlePhoto->delete();
        }

     
        foreach ($photosArray as $key => $photo) {
            foreach ($photo as $key => $singlePhoto) {
                $picName = $singlePhoto->getClientOriginalName();
                $singlePhoto -> move($path, $picName);

                $photosVoiture = Photo::create([
                        'photo_titre' => $picName,
                        'photo_voiture_id' => $voiture ->id
                    ]);
            }
        }
        // créer des dossier automatiquement des dossiers dans image, qui ont le meme nom que le id de la voiture, pour faciliter la gestion et eviter du overwritting ou des noms dupliqués
        // et prendre en compte ce qui se passe quand une photo uploadée dans public, a le meme nom qu'une photo deja presente
        // mettre le array dans photo selectioné dans un autre dans js peut-etre
        // il faut peut-etre avoir un controlleur separé pour photo, pour l'ajout et la suppresion de photo
        // et chercher comment conserver les photos initialement uploadées, lorsqu'on clique sur upload une deuxieme fois. 

        return  redirect()->route('voiture.show', $voiture->id)->with('success', __('lang.controllers.car_updated_success'));

    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voiture $voiture)
    {
        //
        $voiture->delete();
        return redirect()->route('accueil')->with('success', __('lang.controllers.car_deleted_success'));
    }

}
