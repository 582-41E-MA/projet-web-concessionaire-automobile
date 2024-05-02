<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     */
    public function checkout(Request $request)
    {
        //
        // return $request;
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $lineItems = [];

        if (Session::has('panier')) { 
            $panier = Session::get('panier');
        }
        // return $panier;
        foreach ($panier as $voiture) {
            $lineItems[] = 
                [
                  'price_data' => [
                    'currency' => 'cad',
                    'product_data' => [
                        'name' => $voiture['marque'] .'-'. $voiture['modele'] ,
                        'description' => '(taxe inclue)'
                ],
                    'unit_amount' => $voiture['prixTaxeInclue'] * 100,
                  ],
                  'quantity' => 1,
                ];
        }



        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('commande.success', [], true),
            'cancel_url' => route('commande.cancel', [], true),
          ]);

          $commande = Commande::create([
            'id' => $session->id,
            'date_commande' => date("Y-m-d"), 
            'commande_user_id' => Auth::id(),
            'mode_paiment_id' => $request->mode_paiement_id,
            'expedition_id' => $request->expedition_id,
            'statut_id' => 1
          ]);

          return redirect($session->url);
    }

        /**
     * Display the success of the payment.
     */
    public function success()
    {
        //
    }

            /**
     * Display the cancel of the payment.
     */
    public function cancel()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
