@extends('layouts.app')
@section('title')
    @lang('Home')
@endsection
@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">@lang('Welcome to') OZCARS</h1>
        <p class="lead text-body-secondary">@lang('lang.home.text_welcome_title')</p>
        <p>
          <a href="#" class="btn btn-primary my-2">@lang('Find a car')</a>
        </p>
      </div>
    </div>
</section>
<div class="">
<!-- <div class="album py-5 bg-body-tertiary"> -->
    <div class="container d-flex flex-wrap">
    <!-- <div class="container d-flex flex-wrap"> -->

      <!-- <div class="row"> -->
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <!-- <div class="col" style="width: 437px;">
          <div class="card shadow-sm">
            <img src="{{asset('assets/img/tesla-blanc.png')}}" width="400" height="225" class="d-inline-block align-top mx-3" alt="tesla">
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Voir plus</button>
                </div>
                <small class="text-body-secondary">nouveau-arrivé</small>
              </div>
            </div>
          </div>
        </div> -->
				@php session('locale')=='en'? $description = 'description_en' : $description = 'description_fr' @endphp
        @forelse($voitures as $voiture)
        <div class="col" style="width: 437px;">
          <div class="card shadow-sm">
            <img src="{{ asset('images/'. $voiture->id .'/' . $voiture->photos[0]->photo_titre) }}" width="400" height="225" class="d-inline-block align-top mx-3" alt="tesla">
					<h4> {{$marques->find($voiture->modele->modele_marque_id)->marque_en}} {{$voiture->modele->modele_en}}</h4>
            <div class="card-body">
              <p class="card-text">{{ \Illuminate\Support\Str::limit($voiture->$description, 50, $end='...') }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">@lang('See more')</button>
                </div>
                <small class="text-body-secondary ">@lang('New')</small>
              </div>
            </div>
          </div>
        @empty
          <div class="alert alert-danger ">@lang(lang.catalogue.no_cars)</div>
        </div>
        @endforelse 
        
      </div>
    </div>
</div>

@endsection