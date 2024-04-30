@extends('layouts.app')
@section('title')
    @lang('Cars list')
@endsection
@section('content')
<!-- <div class="row justify-content-center mt-5 mb-5 text-center"> -->
<div class="row justify-content-center">
    <!-- <div class="d-flex flex-md-row flex-sm-column flex-column justify-content-start col-10 col-md-12 mb-4"> -->
    <div class=" form-container ">
		<!--filtre-->
		<form class="border border-1 rounded border-dark-subtle mx-4 mb-3 p-3 text-start">
			<h4 class="mb-3">Marque & Modèle</h4>
			@foreach($marques as $marque)
			<div class="form-check ms-2 mb-2">
				<input class="form-check-input" type="radio" name="marque" id="maruqe1">
				<label class="form-check-label" for="maruqe1">{{ $marque->marque_en }}</label>
			</div>
			@endforeach

			<!-- marque -->
                <label for="inputMarque" class="form-label">@lang('Brand')</label>
                <select name="marque" id="inputMarque" class="">
                        <option value="" >@lang('Select brand')</option>
                    @foreach($marques as $marque)
                        <option value="{{$marque->id}}" @if($marque->id == old('marque')) selected @endif >{{ $marque->marque_en }}</option>

                        @endforeach
                </select>

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
			<h4 class="mb-3">@lang('Year')</h4>
			<div class="form-group mb-3">
				<input name="annee" type="number" id="inputAnnee" min="1900" max="2100" class="form-control" placeholder="année*" value="{{old('annee')}}">
			</div>
		</form>
	</div>
		<!--list des voitures-->
	<!-- <div class="album flex-fill d-flex flex-row flex-sm-wrap bg-secondary"> -->
		
		<div class="row col-12 cards-container col-sm-6 mx-4 ">
			@forelse($voitures as $voiture)
			<div class="card shadow-sm car-card col-12 col-sm-3 col-md-4 col-lg-3" >
				@php session('locale')=='en'? $marque = 'marque_en' : $marque = 'marque_fr' @endphp

			<!-- <div class="card shadow-sm mb-3 me-3" style="width: 437px; height: 557px;"> -->
				<a href="{{route('voiture.show', $voiture->id)}}">
					<img src="{{ asset('images/'. $voiture->id .'/' . $voiture->photos[0]->photo_titre) }}" width="400" height="225" class="img-fluid d-inline-block align-top mx-3" alt="tesla">
				</a>
				<div class="card-body text-start d-flex flex-column justify-content-start">
					<p class="btn btn-sm btn-info align-self-end">@lang('New')</p>
					<h4> {{$marques->find($voiture->modele->modele_marque_id)->$marque}} {{$voiture->modele->modele_en}}</h4>
					<p class="card-text  p-3">{{ \Illuminate\Support\Str::limit($voiture->description_en, 50, $end='...') }}</p>
					<p class="text-body-secondary">{{$voiture->pays->pays_en}}</p>
					<h3 class="mb-3">{{$voiture->prix_paye}}$</h3>
					<div class="d-flex justify-content-between align-items-center">
						<div class="btn-group">
							<a href="{{route('voiture.show', $voiture->id)}}" type="button" class="btn btn-sm btn-outline-secondary">@lang('See more')</a>
						</div>
					</div>
					<small class="text-body-secondary pt-2">disponible @lang('Since') {{$voiture->date_arrivee}}</small>
				</div>
			</div>

		@empty
		<div class="alert alert-danger ">@lang(lang.catalogue.no_cars)</div>
		</div>
		@endforelse  
</div>
@endsection