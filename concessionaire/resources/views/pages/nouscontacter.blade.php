@extends('layouts.app')
@section('title','Nous contacter')
@section('content')
<div class="row justify-content-center mt-5 mb-5 text-center">
    <h1 class="mt-5 mb-4">Nous contacter</h1>
    <form class="form-signin col-sm-4 mb-3" method="POST">
        @csrf
        <div class="form-group mb-3 text-start">
            <label for="contracterCourriel" class="form-label">Votre adresse courriel</label>
            <input type="email" class="form-control" id="contracterCourriel" placeholder="name@example.com">
        </div>
        <div class="form-group mb-3 text-start">
            <label for="contracterCommentaire" class="form-label">Votre commentaire</label>
            <textarea class="form-control" id="contracterCommentaire" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Contacter</button>
    </form>
</div>
@endsection