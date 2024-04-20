<?php

namespace App\Http\Controllers;

use App\Models\User_reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User_reserveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('panier.index');
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

        $ajout_au_panier = User_reserve::create([
            'date_reserver' => date('Y-m-d'),
            'ur_user_id' =>  Auth::user()->id,
            'ur_voiture_id' => $request->voiture_id
        ]);

        return redirect(route('panier.index'))->withSuccess('Voiture ajouter au panier avec succees');
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
    public function destroy(User_reserve $user_reserve)
    {
        //
    }
}