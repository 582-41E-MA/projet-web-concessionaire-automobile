@extends('layouts.app')

@section('title', 'Liste des commandes')

@section('content')
<div class="container">
    <h1>Liste des commandes</h1>

    <div class="row">
        <div class="col-md-6">
            <h2>Informations Utilisateur</h2>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nom:</strong> {{ Auth::user()->name }}</li>
                <li class="list-group-item"><strong>Prénom:</strong> {{ Auth::user()->prenom }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ Auth::user()->email }}</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h2>Liste des commandes</h2>
            @forelse($commandes as $commande)
            <a href="{{ route('commande.show', $commande->id ) }}">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Commande #{{ $commande->id }}</h5>
                    <p class="card-text"><strong>Statut:</strong> {{ $commande->statut_commande->statut_en }}</p>
                </div>
            </div>
            </a>
            @empty
            <div class="alert alert-danger">Aucune commande trouvée.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
