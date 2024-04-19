@extends('layouts.app')
@section('title','Tous les voitures')
@section('content')

@forelse($voitures as $voiture)


<div class="col" style="width: 437px;">
          <div class="card shadow-sm">
          @foreach($photos as $photo)
          @if( $photo->photo_voiture_id == $voiture->id )
          <img src="{{ asset('assets/img/' . $photo->photo_titre) }}" width="400" height="225" class="d-inline-block align-top mx-3" alt="tesla">
          @endif
          @endforeach
            <div class="card-body">
              <p class="card-text">{{ $voiture->description_en }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"> <a href="{{ route('voiture.show', $voiture->id) }}">Voir plus</a> </button>
                </div>
                <small class="text-body-secondary">9 mins</small>
              </div>
            </div>
          </div>
        </div>

@empty
        <div class="alert alert-danger">There are no Cars to display!</div>
@endforelse  

@endsection