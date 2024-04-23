@extends('layouts.app')
@section('title','Panier')
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
          <h3 class="fw-normal mb-0 text-black">Panier</h3>
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
                <a href="#" class="btn btn-info btn-md"><small>supprimer</small></a>
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
                <a href="#" class="btn btn-info btn-md"><small>supprimer</small></a>
              </div>
            </div>
          </div>
        </div>


        <!--formulaire-->
        <div class="card mb-4">
            <form class="card-body p-4 text-start w-100 mb-3" method="POST">
              @csrf
              <!--prix total-->
              <div class="d-flex justify-content-between">
                <p class="mb-2">Total</p>
                <p class="mb-2">$4798.00</p>
              </div>

              <div class="d-flex justify-content-between">
                <p class="mb-2">TPS</p>
                <p class="mb-2">$20.00</p>
              </div>

              <div class="d-flex justify-content-between">
                <p class="mb-2">TVQ</p>
                <p class="mb-2">$20.00</p>
              </div>

              <div class="d-flex justify-content-between mb-4">
                <p class="mb-2">Total(Taxes incluses)</p>
                <p class="mb-2">$4838.00</p>
              </div>
              <hr class="my-4">
              <!--Expédition-->
              <div class="form-group mb-3">
                  <label for="inputExpedition" class="sr-only form-label">Expédition</label>
                  <select name="expedition_id" class="form-select" aria-label="Default select example" id="inputExpedition" required>
                    <option value="1">livraison locale</option>
                    <option value="2">ramassage</option>
                  </select>
              </div>
              <div class="form-group mb-5">
                  <label for="inputPaiement" class="sr-only form-label">Méthode de paiement</label>
                  <select name="mode_paiement_id" class="form-select" aria-label="Default select example" id="inputPaiement" required>
                    <option value="1">espèces</option>
                    <option value="2">carte de crédit</option>
                    <option value="3">carte de débit</option>
                    <option value="4">virement bancaire</option>
                    <option value="5">passerelle de paiement (service externalisé)</option>
                  </select>
              </div>
              <button class="btn btn-lg btn-primary w-100" type="submit">Effectuer le paiement</button>
            </form>
        </div>


      </div>
    </div>
  </div>
</section>
@endsection
