@extends('layouts.app')
@section('title', 'Connexion')
@section('content')
    <div class="row justify-content-center mt-5 mb-5 text-center">
        <form class="form-signin col-md-4" method="POST">
            @csrf
            <img class="mb-4" src="{{asset('img/logo.png')}}" alt="" width="176" height="155">
            <h1 class="h3 mb-3 font-weight-normal">Connectez-vous à votre compte</h1>
            <div class="form-group mb-3 text-start">
                <label for="inputEmail" class="sr-only form-label">Courriel</label>
                <input name="courriel" type="email" id="inputEmail" class="form-control" placeholder="Courriel*" required autofocus>
            </div>
            <div class="form-group mb-3 text-start">
                <label for="inputPassword" class="sr-only form-label">Mot de passe</label>
                <input name="mdp" type="password" id="inputPassword" class="form-control" placeholder="Mot de passe*" required>
            </div>
            <p><a href="#" class="link-underline-primary">Mot de passe oublié ?</a></p>
            <button class="btn btn-lg btn-primary w-100" type="submit">Se connecter</button>
        </form>
    </div>
@endsection