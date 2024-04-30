<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $panier = Session::get('panier');
        // return $panier;

        $tps;
        $tvq;
        $total;
        $totalTaxeInclue;

        return view('panier.index', ['panier' => $panier]);
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

        // return $request;
        // 
        if (Session::has('panier')) { 
            $panier = Session::get('panier');
            
            foreach ($panier as $index => $objVoiture) {
                if ($request->voiture_id == $objVoiture['voiture_id'] && $request->user_id == $objVoiture['user_id'] ) {
                    unset($panier[$index]);
                    Session::put('panier', $panier);

                    return  redirect()->route('panier.index')->with('success', 'voiture retirer de panier successfully!');
                    
                }
            }

            $nouveauArticle = [ 
                'voiture_id' => $request->voiture_id,
                'photo_principale' => $request->photo_principale, 
                'marque' => $request->marque,
                'modele' => $request->modele, 
                'prix' => $request->prix, 
                'province_user_id' => $request->province_user_id,
                'user_id' => $request->user_id
            ];
            $panier[] = $nouveauArticle;

            Session::put('panier', $panier);


        } else {
            $panier[] = [ 
    
                'voiture_id' => $request->voiture_id, 
                'photo_principale' => $request->photo_principale,
                'marque' => $request->marque,
                'modele' => $request->modele, 
                'prix' => $request->prix, 
                'province_user_id' => $request->province_user_id,
                'user_id' => $request->user_id
            ];
            Session::put('panier', $panier );
        }

        return  redirect()->route('panier.index')->with('success', 'voiture added to shopping-cart successfully!');        
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
