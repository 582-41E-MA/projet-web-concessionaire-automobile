<?php

namespace App\Http\Controllers;

use App\Models\User_reserve;
use App\Models\Voiture;
use App\Models\Marque;
use Illuminate\Http\Request;
// pour le calcul sur le temps
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class User_reserveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reservations = User_reserve::where('ur_user_id', Auth::user()->id)->get();
        $voitures_reservees = [];
        $marques = Marque::all();
        if(isset($reservations)){
            foreach ($reservations as $reservation) {
                $current_time = Carbon::now();
                $temps_limite = $reservation->created_at->addDay();
                $temps_restant = $temps_limite->diff($current_time);
                // $temps_restant = ($temps_limite->diff($current_time))->format('H:i:s');
                $voitures_reservees[] = [Voiture::find($reservation->ur_voiture_id), $reservation, $temps_restant];
            };
        }

        return view('panier.reserver', ["voitures_reservees" => $voitures_reservees, "marques" => $marques ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // return $request;

        // $request->validate([

        //     'ur_voiture_id' => 'required|unique:user_reserves'

        // ]);
        // $voiture = Voiture::find($request->voiture_id)->get();
        // return ($voiture->user_reserve);
        // $reserve = User_reserve::all();
        
        if(!User_reserve::where('ur_voiture_id', $request->voiture_id)->exists()){
            $ajout_au_panier = User_reserve::create([
                'date_reserver' => date('Y-m-d'),
                'ur_user_id' =>  Auth::user()->id,
                'ur_voiture_id' => $request->voiture_id
            ]);
        }else{
            
            return redirect()->route('voiture.show', $request->voiture_id)->withSuccess('cette voiture est deja reservee');
        }

        return redirect()->route('reservation.index')->withSuccess('Voiture reservée avec succees');
    }

    /**
     * Display the specified resource.
     */
    public function show(User_reserve $user_reserve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User_reserve $user_reserve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User_reserve $user_reserve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $reservation = User_reserve::find($request->user_reserve_id);
        $reservation->delete();
        return redirect()->route('reservation.index')->with('success', 'voiture supprimee de la liste avec succes');
    }
}
