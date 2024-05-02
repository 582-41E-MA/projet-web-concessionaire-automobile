<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
            'success_url' => route('commande.success', [], true)."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('commande.cancel', [], true),
          ]);

        //   return $session->id;


          $commande = Commande::create([
            'session_id' => $session->id,
            'date_commande' => date("Y-m-d"), 
            'commande_user_id' => Auth::id(),
            'mode_paiement_id' => $request->mode_paiement_id,
            'expedition_id' => $request->expedition_id,
            'statut_id' => 1
          ]);

          return redirect($session->url);
    }

        /**
     * Display the success of the payment.
     */
    public function success(Request $request)
    {
        //
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $sessionId = $request->get('session_id');

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException ;
                
            }
            $customer = $session->customer_details; 

            $commande = Commande::where( 'session_id', $sessionId )->where('statut_id', 1)->first();

            if (!$commande) {
                throw new NotFoundHttpException();
            }
            $commande->statut_id = 2;
            $commande->save();

            return view('panier.success', compact('customer') );
            
        } catch (\Throwable $th) {
            throw new NotFoundHttpException();
        }

    }
    
    /**
     * Display the cancel of the payment.
     */
    public function cancel()
    {
        //
        return view('panier.cancel');
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
