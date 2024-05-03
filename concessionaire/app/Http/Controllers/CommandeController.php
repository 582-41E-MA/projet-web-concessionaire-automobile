<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Voiture;
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
            $voiture['prixTaxeInclue'] = round($voiture['prixTaxeInclue'], 2);
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

              // return "session problem";
                throw new NotFoundHttpException ;
                
            }
            $customer = $session->customer_details; 

            $commande = Commande::where( 'session_id', $sessionId )->first();

            if (!$commande) {

              // return "commande probleme";
                throw new NotFoundHttpException();
            }
            if ($commande->statut_id === 1) {

                $commande->statut_id = 2;
                $commande->save();
            }
            if (Session::has('panier')) { 

            $panier = Session::get('panier');

            foreach ($panier as $voiturePanier) {
              $voiture = Voiture::where( 'id', $voiturePanier['voiture_id'])->first();
              $voiture->commande_id = $commande->id;
              $voiture->save();
            }

            Session::forget('panier');

          }
          
          return view('panier.success', compact('customer') );
            
        } catch (\Throwable $th) {
          return $th;
            // throw new NotFoundHttpException();
        }

    }
    
    /**
     * Display the cancel of the payment.
     */
    public function cancel()
    {
        //
        $commande = Commande::where( 'session_id', 'cs_test_b1sGu1brs3FF75Gv1uKIBcvuQfKiUW4XfKIoExyOFdLkPLne5CYw6OkCvz' )->first();
        
        return $commande;
        return view('panier.cancel', compact('commande'));
    }

    /**
     * Display the webhook of the payment.
     */
    public function webhook()
    {

// This is your Stripe CLI webhook secret for testing your endpoint locally.
$endpoint_secret = 'whsec_2421ebfa1c00535c07da3c137348e6d18a8f19c083d8b78feda2c907ad7ccffa';

$payload = @file_get_contents('php://input');
$sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
$event = null;

try {
  $event = \Stripe\Webhook::constructEvent(
    $payload, $sig_header, $endpoint_secret
  );
} catch(\UnexpectedValueException $e) {
  // Invalid payload
  return response('', 400);
} catch(\Stripe\Exception\SignatureVerificationException $e) {
  // Invalid signature
  return response('', 400);
}

// Handle the event
switch ($event->type) {
  case 'checkout.session.completed':
    $session = $event->data->object;
    $sessionId = $session->id;
  // ... handle other event types

  $commande = Commande::where( 'session_id', $sessionId )->first();

  if ($commande && $commande->statut_id === 1) {

      $commande->statut_id = 2;
      $commande->save();
  }

  default:
    echo 'Received unknown event type ' . $event->type;
}

  return response('');

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
