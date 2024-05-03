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
		<form class="border border-1 rounded border-dark-subtle mx-4 mb-3 p-3 text-start" action="{{ route('voiture.indexFiltre') }}" method="GET">
			<h4 class="mb-3">Marque</h4>
			@foreach($marques as $marque)
			<div class="form-check ms-2 mb-2">
				<input class="form-check-input" type="checkbox" name="marque[]" id="{{ $marque->marque_en }}" value="{{ $marque->id }}"/>
				<label class="form-check-label" for="{{ $marque->marque_en }}">{{ $marque->marque_en }}</label>
			</div>
			@endforeach

			<hr class="border-bottom border-1 border-dark">
			<h4 class="mb-3">Type de Carrosserie</h4>

			@foreach($carrosseries as $carrosserie)
			<div class="form-check ms-2 mb-2">
				<input class="form-check-input" type="checkbox" name="carrosserie[]" id="{{ $carrosserie->carrosserie_en }}" value="{{ $carrosserie->id }}"/>
				<label class="form-check-label" for="{{ $carrosserie->carrosserie_en }}">{{ $carrosserie->carrosserie_en }}</label>
			</div>
			@endforeach
			<hr class="border-bottom border-1 border-dark">
			<h4 class="mb-3">@lang('Year')</h4>
			<div class="form-group mb-3">
				<input name="annee" type="number" id="inputAnnee" min="1900" max="2100" class="form-control" placeholder="année*" value="{{old('annee')}}">
			</div>
			<button class="btn btn-lg btn-primary w-100" type="submit">@lang('Search')</button>
		</form>
	</div>
		<!--list des voitures-->
	<!-- <div class="album flex-fill d-flex flex-row flex-sm-wrap bg-secondary"> -->
		
		@php session('locale')=='en'? $description = 'description_en' : $description = 'description_fr' @endphp
		<div class="row col-12 cards-container col-sm-6 ">
			@forelse($voitures as $voiture)
			<div class="card shadow-sm car-card col-12 col-sm-3 " >

			<!-- <div class="card shadow-sm mb-3 me-3" style="width: 437px; height: 557px;"> -->
				<a href="{{route('voiture.show', $voiture->id)}}">
					<img src="{{ asset('images/'. $voiture->id .'/' . $voiture->photos[0]->photo_titre) }}" width="400" height="225" class="img-fluid d-inline-block align-top mx-3" alt="tesla">
				</a>
				<div class="card-body text-start d-flex flex-column justify-content-start">
					<p class="btn btn-sm btn-info align-self-end">@lang('New')</p>
					<h4> {{$marques->find($voiture->modele->modele_marque_id)->marque_en}} {{$voiture->modele->modele_en}}</h4>
					<p class="card-text ">{{ \Illuminate\Support\Str::limit($voiture->$description, 50, $end='...') }}</p>
					<p class="text-body-secondary">{{$voiture->pays->pays_en}}</p>
					<h3 class="mb-3">{{$voiture->prix_paye}}$</h3>
					<div class="d-flex justify-content-between align-items-center">
						<div class="btn-group">
							<a href="{{route('voiture.show', $voiture->id)}}" type="button" class="btn btn-sm btn-outline-secondary">@lang('See more')</a>
						</div>
					</div>
					<small class="text-body-secondary pt-2">disponible @lang('Since') {{$voiture->date_arrivee}}</small>
					@foreach($voitures_reservees as $voiture_reservee)
						@if($voiture_reservee == $voiture->id)
							<div class="text-dark m-4 shadow-sm rounded border bg-light text-center"><h5>@lang('Reserved car')</h5></div>
						@endif
					{{--print_r($voitures_reservees)--}}
					@endforeach
				</div>
			</div>

		@empty
		<div class="alert alert-danger ">@lang('no_cars')</div>
		</div>
		@endforelse  
</div>
@endsection
