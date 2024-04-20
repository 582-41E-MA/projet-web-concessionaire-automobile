@extends('layouts.app')
@section('title','Tous les voitures')
@section('content')
<div class="row justify-content-center mt-5 mb-5 text-center">
    <div class="d-flex flex-md-row flex-sm-column flex-column justify-content-start col-10 col-md-12 mb-4">
	<!--filtre-->
	<form class="border border-1 rounded border-dark-subtle mx-4 mb-3 p-3 text-start">
		<h4 class="mb-3">Marque & Modèle</h4>
		<div class="form-check ms-2 mb-2">
			<input class="form-check-input" type="radio" name="marque" id="maruqe1">
			<label class="form-check-label" for="maruqe1">Marque 1</label>
		</div>
		<!--liste des modèle-->
		<div class="container">
			<div class="form-check ms-4 mb-2">
				<input class="form-check-input" type="checkbox" value="" id="marque1-modele1">
				<label class="form-check-label" for="marque1-modele1">marque1-modele1</label>
			</div>
			<div class="form-check ms-4 mb-2">
				<input class="form-check-input" type="checkbox" value="" id="marque1-modele2" disabled>
				<label class="form-check-label" for="marque1-modele2">marque1-modele2</label>
			</div>
			<div class="form-check ms-4 mb-2">
				<input class="form-check-input" type="checkbox" value="" id="marque1-modele3" disabled>
				<label class="form-check-label" for="marque1-modele3">marque1-modele3</label>
			</div>
			<div class="form-check ms-4 mb-2">
				<input class="form-check-input" type="checkbox" value="" id="marque1-modele4" disabled>
				<label class="form-check-label" for="marque1-modele4">marque1-modele4</label>
			</div>
		</div>
		<div class="form-check ms-2 mb-2">
			<input class="form-check-input" type="radio" name="marque" id="maruqe2">
			<label class="form-check-label" for="maruqe2">Marque 2</label>
		</div>
		<!--liste des modèle-->
		<div class="container">
			<div class="form-check ms-4 mb-2">
				<input class="form-check-input" type="checkbox" value="" id="marque2-modele1">
				<label class="form-check-label" for="marque2-modele1">marque1-modele1</label>
			</div>
			<div class="form-check ms-4 mb-2">
				<input class="form-check-input" type="checkbox" value="" id="marque2-modele2">
				<label class="form-check-label" for="marque2-modele2">marque1-modele2</label>
			</div>
		</div>
		<div class="form-check ms-2 mb-2">
			<input class="form-check-input" type="radio" name="marque" id="maruqe3">
			<label class="form-check-label" for="maruqe3">Marque 3</label>
		</div>
		<div class="form-check ms-2 mb-2">
			<input class="form-check-input" type="radio" name="marque" id="maruqe4">
			<label class="form-check-label" for="maruqe4">Marque 4</label>
		</div>
		<div class="form-check ms-2 mb-2">
			<input class="form-check-input" type="radio" name="marque" id="maruqe5">
			<label class="form-check-label" for="maruqe5">Marque 5</label>
		</div>
		<hr class="border-bottom border-1 border-dark">
		<h4 class="mb-3">Type de Carrosserie</h4>
		<div class="form-check ms-2 mb-2">
			<input class="form-check-input" type="checkbox" value="" id="berline">
			<label class="form-check-label" for="berline">Berline</label>
		</div>
		<div class="form-check ms-2 mb-2">
			<input class="form-check-input" type="checkbox" value="" id="coupe">
			<label class="form-check-label" for="coupe">Coupé</label>
		</div>
		<div class="form-check ms-2 mb-2">
			<input class="form-check-input" type="checkbox" value="" id="camion">
			<label class="form-check-label" for="camion">Camion</label>
		</div>
		<div class="form-check ms-2 mb-2">
			<input class="form-check-input" type="checkbox" value="" id="commercial">
			<label class="form-check-label" for="commercial">Commercial</label>
		</div>
		<div class="form-check ms-2 mb-2">
			<input class="form-check-input" type="checkbox" value="" id="vus">
			<label class="form-check-label" for="vus">VUS</label>
		</div>
		<div class="form-check ms-2 mb-2">
			<input class="form-check-input" type="checkbox" value="" id="hayon">
			<label class="form-check-label" for="hayon">Hayon</label>
		</div>
		<div class="form-check ms-2 mb-2">
			<input class="form-check-input" type="checkbox" value="" id="cabriolet">
			<label class="form-check-label" for="cabriolet">Cabriolet</label>
		</div>
		<div class="form-check ms-2 mb-2">
			<input class="form-check-input" type="checkbox" value="" id="fourgonnette" disabled>
			<label class="form-check-label" for="fourgonnette">Fourgonnette</label>
		</div>
		<hr class="border-bottom border-1 border-dark">
		<h4 class="mb-3">Année</h4>
		<div class="form-group mb-3">
			<input name="annee" type="number" id="inputAnnee" min="1900" max="2100" class="form-control" placeholder="année*" value="{{old('annee')}}">
		</div>
	</form>
	<!--list des voitures-->
	<div class="album flex-fill d-flex flex-row flex-sm-wrap">

		<!--une voiture-->

        
		<!--une voiture-->
		<div class="card shadow-sm mb-3 me-3" style="width: 437px; height: 557px;">
			<img src="{{asset('assets/img/tesla-blanc.png')}}" width="400" height="225" class="d-inline-block align-top mx-3" alt="tesla">
			<div class="card-body text-start d-flex flex-column justify-content-start">
				<p class="btn btn-sm btn-info align-self-end">nouveau</p>
				<h4>Marque voiture</h4>
				<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				<p class="text-body-secondary">Montréal Québec Canada</p>
				<h3 class="mb-3">7 777$</h3>
				<div class="d-flex justify-content-between align-items-center">
					<div class="btn-group">
					<button type="button" class="btn btn-sm btn-outline-secondary">Voir plus</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Réserver</button>
					<button type="button" class="btn btn-sm btn-outline-secondary">Ajouter au</button>
					
					</div>
					<small class="text-body-secondary">disponible depuis 6 mois</small>
				</div>
			</div>
		</div>

		<!--une voiture-->
		<div class="card shadow-sm mb-3 me-3" style="width: 437px; height: 557px;">
			<img src="{{asset('assets/img/tesla-blanc.png')}}" width="400" height="225" class="d-inline-block align-top mx-3" alt="tesla">
			<div class="card-body text-start d-flex flex-column justify-content-start">
				<p class="btn btn-sm btn-info align-self-end">nouveau</p>
				<h4>Marque voiture</h4>
				<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				<p class="text-body-secondary">Montréal Québec Canada</p>
				<h3 class="mb-3">7 777$</h3>
				<div class="d-flex justify-content-between align-items-center">
					<div class="btn-group">
					<button type="button" class="btn btn-sm btn-outline-secondary">Voir plus</button>
					<button type="button" class="btn btn-sm btn-outline-secondary">Réserver</button>
					<button type="button" class="btn btn-sm btn-outline-secondary">Ajouter au</button>
					</div>
					<small class="text-body-secondary">disponible depuis 6 mois</small>
				</div>
			</div>
		</div>

		<!--une voiture-->
		<div class="card shadow-sm mb-3 me-3" style="width: 437px; height: 557px;">
			<img src="{{asset('assets/img/tesla-blanc.png')}}" width="400" height="225" class="d-inline-block align-top mx-3" alt="tesla">
			<div class="card-body text-start d-flex flex-column justify-content-start">
				<p class="btn btn-sm btn-info align-self-end">nouveau</p>
				<h4>Marque voiture</h4>
				<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				<p class="text-body-secondary">Montréal Québec Canada</p>
				<h3 class="mb-3">7 777$</h3>
				<div class="d-flex justify-content-between align-items-center">
					<div class="btn-group">
					<button type="button" class="btn btn-sm btn-outline-secondary">Voir plus</button>
					<button type="button" class="btn btn-sm btn-outline-secondary">Réserver</button>
					<button type="button" class="btn btn-sm btn-outline-secondary">Ajouter au</button>
					</div>
					<small class="text-body-secondary">disponible depuis 6 mois</small>
				</div>
			</div>
		</div>
	</div>

	@forelse($voitures as $voiture)

        <div class="card shadow-sm mb-3 me-3" style="width: 437px; height: 557px;">
        @foreach($photos as $photo)
          @if( $photo->photo_voiture_id == $voiture->id )
          <img src="{{ asset('assets/img/' . $photo->photo_titre) }}" width="400" height="225" class="d-inline-block align-top mx-3" alt="tesla">
          @endif
          @endforeach
			<div class="card-body text-start d-flex flex-column justify-content-start">
				<p class="btn btn-sm btn-info align-self-end">nouveau</p>
				<h4>Marque voiture</h4>
				<p class="card-text">{{ $voiture->description_en }}</p>
				<p class="text-body-secondary">Montréal Québec Canada</p>
				<h3 class="mb-3">7 777$</h3>
				<div class="d-flex justify-content-between align-items-center">
					<div class="btn-group">
					<button type="button" class="btn btn-sm btn-outline-secondary">Voir plus</button>
          <form action="{{ route('panier.store') }}" method="POST">
            @csrf
            <input type="hidden" name="voiture_id" value="{{ $voiture->id }}">
          <button type="submit" class="btn btn-sm btn-outline-secondary">Réserver (Ajouter au panier)</button>
          </form>
        </div>
					<small class="text-body-secondary">disponible depuis 6 mois</small>
				</div>
			</div>
		</div>

	@empty
			<div class="alert alert-danger">There are no Cars to display!</div>
	@endforelse  

	</div>
</div>
@endsection