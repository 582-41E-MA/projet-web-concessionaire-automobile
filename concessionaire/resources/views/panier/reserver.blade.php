@extends('layouts.app')
@section('title','Reservation')
@section('content')

@isset($voitures_reservee)
<ul>
@forelse($voitures_reservee as $voiture_reservee)

<li>{{ $voiture_reservee->description_en }}</li>

    @empty
    <div class="col">
        <div class="alert alert-danger">There are no reserved command to display!</div>
    </div>
    @endforelse  
</ul>
@endisset

<!-- référence: https://mdbootstrap.com/docs/standard/extended/shopping-carts/ -->
<section>
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Réservation</h3>
          <div>
            <p class="mb-0"><a href="{{ route('voiture.index') }}" class="text-body">Continuer à magasiner</a></p>
          </div>
        </div>

        <!--une voiture-->
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="{{asset('assets/img/tesla-blanc.png')}}"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-5 col-lg-5 col-xl-5">
                <p class="lead fw-normal mb-2">Titre de la voiture</p>
                <p><span class="text-muted">Marque: </span>Tesla <span class="text-muted">Modèle: </span>Model Y</p>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0">$7777.00</h5>
              </div>
              <div class="col-md-2 col-lg-2 col-xl-2 text-end">
                <a href="#" class="btn btn-info btn-md"><small>Ajouter au panier</small></a>
              </div>
            </div>
          </div>
        </div>

        <!--une voiture-->
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="{{asset('assets/img/tesla-blanc.png')}}"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-5 col-lg-5 col-xl-5">
                <p class="lead fw-normal mb-2">Titre de la voiture</p>
                <p><span class="text-muted">Marque: </span>Tesla <span class="text-muted">Modèle: </span>Model Y</p>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0">$7777.00</h5>
              </div>
              <div class="col-md-2 col-lg-2 col-xl-2 text-end">
                <a href="#" class="btn btn-info btn-md"><small>Ajouter au panier</small></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection
