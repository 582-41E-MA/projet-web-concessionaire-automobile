@extends('layouts.app')
@section('title','Accueil')
@section('content')

<ul>
@forelse($voitures_reservee as $voiture_reservee)

<li>{{ $voiture_reservee->description_en }}</li>

    @empty
    <div class="col">
        <div class="alert alert-danger">There are no reserved command to display!</div>
    </div>
    @endforelse  
</ul>
@endsection