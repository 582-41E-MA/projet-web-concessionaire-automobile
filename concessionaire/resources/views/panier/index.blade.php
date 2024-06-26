@extends('layouts.app')
@section('title','Panier')
@section('content')

@isset($voitures_reservee)
<ul>
@forelse($voitures_reservee as $voiture_reservee)

<li>{{ $voiture_reservee->description_en }}</li>

    @empty
    <div class="col">
        <div class="alert alert-danger">@lang('There are no reserved command to display!')</div>
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
          <h3 class="fw-normal mb-0 text-black">@lang('Cart')</h3>
          <div>
            <p class="mb-0"><a href="{{ route('voiture.index') }}" class="text-body">@lang('Continue shopping')</a></p>
          </div>
        </div>

      @forelse($panier as $voiture)

      <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex flex-lg-nowrap justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                {{--print_r($voiture)--}}
                <img
                  src="{{ asset('images/'. $voiture['voiture_id'] .'/' . $voiture['photo_principale']) }}"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-5 col-lg-5 col-xl-5">
                <p class="lead fw-normal mb-2">@lang('Car')</p>
                <p><span class="text-muted">@lang('Brand'): </span>{{ $voiture['marque'] }} <span class="text-muted">@lang('Model'): </span>{{ $voiture['modele'] }}</p>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0">$ {{ $voiture['prix'] }}</h5>
              </div>
              <form action="{{ route('panier.delete') }}" method="post">
                @csrf
                <input type="hidden" name="voiture_id" value="{{ $voiture['voiture_id'] }}">
                <div class="col-md-2 col-lg-2 col-xl-2 text-end">
                  <button type="submit" class="btn btn-info btn-md"><small>@lang('Delete')</small></button>
                </div>
              </form>
            </div>
          </div>
        </div>

      @empty
        <div class="alert alert-danger">@lang('No car to display!')</div>
    @endforelse 

        <!--prix total-->
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">@lang('Summary')</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                Total
                <span> $ {{ $total }}</span>
              </li>
              <!--taxes-->
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                TPS
                <span> $ {{ $tps }}</span>
              </li>
              <!--taxes-->
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                TVP
                <span>$ {{ $tvp }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-top px-0 mb-3">
                <div>
                  <strong>Total</strong>
                  <strong>
                    <p class="mb-0">(@lang('Taxes included'))</p>
                  </strong>
                </div>
                <span><strong>$ {{ $totalTaxeInclue }}</strong></span>
              </li>
            </ul>

          </div>
        </div>

        <!--formulaire-->
        <div class="card mb-4">
            <form class="card-body px-4 py-2 text-start w-100 mb-3" action="{{ route('commande.checkout') }}" method="POST" id="checkoutForm">
              @csrf              
              <!--Expédition-->
              <h5 class="my-3">@lang('Shipping')</h5>
              <div class="container d-flex flex-row mb-3">
                <div class="form-check mb-2 me-4">
                  <input class="form-check-input" type="radio" name="expedition_id" value="1" id="livraison_locale">
                  <label class="form-check-label" for="livraison_locale">@lang('Local delivery')</label>
                </div>
                <div class="form-check mb-2 me-4">
                  <input class="form-check-input" type="radio" name="expedition_id" value="2" id="ramassage">
                  <label class="form-check-label" for="ramassage">@lang('Pick up')</label>
                </div>
              </div>
              <!--Méthode de paiement-->
              <h5 class="my-3">@lang('Paiement method')</h5>
              <div class="container d-flex flex-column flex-md-row mb-4">
                <div class="form-check mb-2 me-4">
                  <input class="form-check-input" type="radio" name="mode_paiement_id" value="1" id="especes">
                  <label class="form-check-label" for="especes">@lang('Cash')</label>
                </div>
                <div class="form-check mb-2 me-4">
                  <input class="form-check-input" type="radio" name="mode_paiement_id" value="2" id="credit">
                  <label class="form-check-label" for="credit">@lang('Credit card')</label>
                </div>
                <div class="form-check mb-2 me-4">
                  <input class="form-check-input" type="radio" name="mode_paiement_id" value="3" id="debit">
                  <label class="form-check-label" for="debit">@lang('Debit card')</label>
                </div>
                <div class="form-check mb-2 me-4">
                  <input class="form-check-input" type="radio" name="mode_paiement_id" value="4" id="virement">
                  <label class="form-check-label" for="virement">@lang('Etransfert')</label>
                </div>
                  </div>
              <button class="btn btn-lg btn-primary w-100" type="submit">@lang('Make a paiement')</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  window.addEventListener("load", (event) => {

    const checkoutForm = document.getElementById('checkoutForm');
    const cardDetail = document.getElementById('cardDetail');
    cardDetail.style.display = 'none';

    checkoutForm.addEventListener('change', (e) => {
        const isCredit = document.getElementById('credit').checked;
        const isDebit = document.getElementById('debit').checked;

        if (isCredit || isDebit) {
          cardDetail.style.display = 'block';
        }else{
          cardDetail.style.display = 'none';
        }
    });
  });
</script>
@endsection
