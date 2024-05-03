@extends('layouts.app')
@section('title','Panier')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-5 mb-5 text-center">
        <div class="col-md-8">
            <h1>Paiement effectué avec succès</h1>
            <h2>Bienvenue Mx {{ $customer->name }}</h2>

            @isset($panier)
                <h3>Votre commande</h3>
                @foreach($panier as $article)
                    <div class="card my-3">
                        <div class="card-body">
                            <h4 class="card-title">Marque: <span class="font-weight-light">{{ $article['marque'] }}</span></h4>
                            <h4 class="card-title">Modèle: <span class="font-weight-light">{{ $article['modele'] }}</span></h4>
                            <h4 class="card-title">Prix: <span class="font-weight-light">$ {{ $article['prix'] }}</span></h4>
                            <h4 class="card-title">Prix (Taxes Inclues): <span class="font-weight-light">$ {{ $article['prixTaxeInclue'] }}</span></h4>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
</div>

@endsection
