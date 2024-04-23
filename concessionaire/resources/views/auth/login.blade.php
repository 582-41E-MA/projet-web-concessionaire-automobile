@extends('layouts.app')
@section('title', 'Connexion')
@section('content')

    @if(!$errors->isEmpty())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row justify-content-center mt-5 mb-5 text-center">
        <form class="form-signin col-8 col-sm-8 col-md-6 col-lg-4 mb-3" method="POST">
            @csrf
            <a href="{{asset('/')}}"><img class="mb-4" src="{{asset('assets/img/logo.png')}}" alt="logo" width="176" height="155"></a>
            <h1 class="h3 mb-3 font-weight-normal">Connectez-vous à votre compte</h1>
            <div class="form-group mb-3 text-start">
                <label for="inputEmail" class="sr-only form-label">Courriel</label>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Courriel*" required autofocus>
            </div>
            <div class="form-group mb-3 text-start">
                <label for="inputPassword" class="sr-only form-label">Mot de passe</label>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Mot de passe*" required>
            </div>
            <p><a href="#" class="link-underline-primary">Mot de passe oublié ?</a></p>
            <button class="btn btn-lg btn-primary w-100" type="submit">Se connecter</button>
        </form>
        <p>Vous n'avez pas de compte ? <a href="{{ route('user.create') }}" class="link-underline-primary">S'inscrire</a></p>
    </div>
@endsection