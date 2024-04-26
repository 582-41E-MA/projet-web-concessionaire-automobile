@extends('layouts.app')
@section('title','Voiture')
@section('content')
<!-- référence: https://mdbootstrap.com/snippets/standard/mdbootstrap/4852176?view=project -->
<article class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <img style=" max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{asset('images/'.$voiture->id.'/'.$voiture->photos[0]->photo_titre)}}" id="imglarge"/>
        </div>
        <div class="d-flex justify-content-center mb-3" id="imglist">
          @foreach($voiture->photos as $photo)
            <img width="101" height="60" class="rounded-2" src="{{asset('images/'.$voiture->id.'/'.$photo->photo_titre)}}" />
          @endforeach
        </div>
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
      <section class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark mb-4 text-uppercase">
             
            {{$marques->find($voiture->modele->modele_marque_id)->marque_en}} {{$voiture->modele->modele_en}}
          </h4>

          <div class="mb-3">
            <span class="h1">{{$voiture->prix_paye}}</span>
            <span class="text-muted">CAD</span>
          </div>

          <p>
          {{$voiture->description_en}}
          </p>

          <div class="row">
            {{--dump($voiture->photos)--}}
            <dt class="col-3">Année:</dt>
            <dd class="col-9">{{$voiture->annee}}</dd>

            <dt class="col-3">Carrosserie</dt>
            <dd class="col-9">{{$voiture->carrosserie->carrosserie_en}}</dd>

            <dt class="col-3">Pays</dt>
            <dd class="col-9">{{$voiture->pays->pays_en}}</dd>

            <dt class="col-3">Date d'arrivée</dt>
            <dd class="col-9">{{$voiture->date_arrivee}}</dd>
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
<script>
  const imglarge = document.getElementById('imglarge');
  const imglist = document.getElementById('imglist').children;

  console.log(typeof imglist);
  console.log(imglarge.src);

  for (const i in imglist){
    imglist[i].addEventListener('click', function(e){
      imglarge.src = e.target.src;
    });
  };
</script>
@endsection