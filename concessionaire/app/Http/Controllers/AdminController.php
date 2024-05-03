<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voiture;
use App\Models\Modele;
use App\Models\Marque;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Liste des employés
        $users =    User::whereNot('privilege_id', 1)->get();

        return view('admin.index', ['users' => $users]);
    }

    /**
     * Display a listing of the resource.
     */
    public function client()
    {
        //Liste des clients
        $users = User::where('privilege_id', 1)->get();

        // return $user;

        return view('admin.client', ['users' => $users]);
    }
    
    public function voiture()
    {
        //Liste Voitures
        $voitures = Voiture::all();
        $marques = Marque::all();

        // return $voitures;

        return view('admin.voitures', ['voitures' => $voitures, "marques" => $marques]);
    }

    // afficher les marques dans admin
    public function marque()
    {
        //Liste Voitures
        $marques = Marque::all();
        $modeles = Modele::all();

        // return $voitures;

        return view('admin.voitures', ["marques" => $marques, "modeles" => $modeles]);
    }

        /**
     * Display a listing of the resource.
     */
    public function filtreEmployee(Request $request)
    {
        //
        // return $request->search;
        $users = User::whereNot('privilege_id', 1)
                        ->where('name', 'REGEXP', $request->search)
                        ->orWhere('prenom', 'REGEXP', $request->search)
                        ->get();

        // return $users;

        return view('admin.index', ['users' => $users]);
    }
    public function filtreClient(Request $request)
    {

        $users = User::where('privilege_id', 1)
        ->where(function($query) use ($request) {
            $query->where('name', 'REGEXP', $request->search)
                    ->orWhere('prenom', 'REGEXP', $request->search);
        })
        ->get();                

        // return $users;

        return view('admin.client', ['users' => $users]);
    }
    public function filtreVoiture(Request $request)
    {
        //
        $marques = Marque::all();

        $modeleIds = [];
        $modeles = Modele::where('modele_en', 'REGEXP', $request->search)->get();
        // return $modeles;

        foreach ($modeles as $modele) {
            $modeleIds[] = $modele->id;
        }

        // return $modeleIds;
        if (isset($modeleIds[0])) {
            $voitures = Voiture::whereIn('modele_id', $modeleIds)->get();
            return view('admin.voitures', ['voitures' => $voitures, "marques" => $marques]);
        } else {
            $voitures = [];
            return view('admin.voitures', ['voitures' => $voitures, "marques" => $marques]);
        }

        // return $voitures;

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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
