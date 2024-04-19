@extends('layouts.app')
@section('title','Tous les voitures')
@section('content')

@forelse($voitures as $voiture)

<div class="col" style="width: 437px;">
          <div class="card shadow-sm">
            <img src="{{asset('assets/img/tesla-blanc.png')}}" width="400" height="225" class="d-inline-block align-top mx-3" alt="tesla">
            <div class="card-body">
              <p class="card-text">{{ $voiture->description_en }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Voir plus</button>
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