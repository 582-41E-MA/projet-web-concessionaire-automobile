@extends('layouts.app')
@section('title','Voiture')
@section('content')
<!-- référence: https://mdbootstrap.com/snippets/standard/mdbootstrap/4852176?view=project -->
<article class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{asset('assets/img/tesla-blanc.png')}}" />
        </div>
        <div class="d-flex justify-content-center mb-3">
            <img width="101" height="60" class="rounded-2" src="{{asset('assets/img/tesla-blanc.png')}}" />
            <img width="101" height="60" class="rounded-2" src="{{asset('assets/img/tesla-blanc.png')}}" />
            <img width="101" height="60" class="rounded-2" src="{{asset('assets/img/tesla-blanc.png')}}" />
            <img width="101" height="60" class="rounded-2" src="{{asset('assets/img/tesla-blanc.png')}}" />
            <img width="101" height="60" class="rounded-2" src="{{asset('assets/img/tesla-blanc.png')}}" />
        </div>
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
      <section class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark mb-4">
            Modèle et titre de la voiture<br />
            Marque
          </h4>

          <div class="mb-3">
            <span class="h1">7,777.00</span>
            <span class="text-muted">CAD</span>
          </div>

          <p>
          Tesla est une marque automobile qui commercialise des voitures électriques, avec une intelligence artificielle intégrée. Depuis 2003 et sous l'impulsion de Martin Eberhard et Marc Tarpenning, cette marque, anciennement Tesla Motors, s'est positionnée sur des voitures électriques avec une technologie de pointe.
          </p>

          <div class="row">
            <dt class="col-3">Année:</dt>
            <dd class="col-9">2022</dd>

            <dt class="col-3">Carrosserie</dt>
            <dd class="col-9">Berline</dd>

            <dt class="col-3">Pays</dt>
            <dd class="col-9">USA</dd>

            <dt class="col-3">Date d'arrivée</dt>
            <dd class="col-9">2023-01-01</dd>
          </div>

          <hr class="mb-4" />

          <a href="#" class="btn btn-info shadow-0"> Acheter maintenant </a>
          <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Ajouter au panier </a>
          <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Réserver </a>
        </div>
      </section>
    </div>
  </div>
</article>

@endsection