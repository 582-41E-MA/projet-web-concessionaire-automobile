@extends('layouts.app')
@section('title','Nous contacter')
@section('content')
<h1 class="mt-5 mb-4">Nous contacter</h1>
<div class="row justify-content-center mt-5 mb-5">
    <form method="POST">
        @csrf
        <div class="mb-3">
            <label for="contracterCourriel" class="form-label">Votre adresse courriel</label>
            <input type="email" class="form-control" id="contracterCourriel" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="contracterCommentaire" class="form-label">Votre commentaire</label>
            <textarea class="form-control" id="contracterCommentaire" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Contacter</button>
    </form>
</div>
@endsection