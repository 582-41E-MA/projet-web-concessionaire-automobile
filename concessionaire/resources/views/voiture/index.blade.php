@extends('layouts.app')
@section('title','Tous les voitures')
@section('content')

@forelse($voitures as $voiture)

<h3> {{ $voiture->description_en }}</h3>

@empty
        <div class="alert alert-danger">There are no Cars to display!</div>
@endforelse  

@endsection