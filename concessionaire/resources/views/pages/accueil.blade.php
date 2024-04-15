@extends('layouts.app')
@section('title','À propos de nous')
@section('content')
<h1 class="mt-5 mb-4">Accueil</h1>

@auth

@endauth

@guest
<p> vieullez vous conntecter</p>
@else
<p class="nav-item">bienvenue {{ Auth::user()->name }}</p>
@endguest

@endsection