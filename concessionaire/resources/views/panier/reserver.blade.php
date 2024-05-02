@extends('layouts.app')
@section('title')
  @lang('Reservation')
@endsection
@section('content')

<!-- référence: https://mdbootstrap.com/docs/standard/extended/shopping-carts/ -->
<section>
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">@lang('Reserved cars')</h3>
          <div>
            <p class="mb-0"><a href="{{ route('voiture.index') }}" class="text-body">@lang('Continue shopping')</a></p>
          </div>
        </div>

        <!--une voiture-->
        {{--$reservations--}}
        @isset($voitures_reservees)
        @forelse($voitures_reservees as $voiture_reservee)
        {{--print_r($voiture_reservee[1])--}}
            <div class="card rounded-3 mb-4">
              <div class="card-body p-4">
                <div class="row d-flex justify-content-between align-items-center">
                  <div class="col-md-2 col-lg-2 col-xl-2">
                    <img
                      src="{{ asset('images/'. $voiture_reservee[0]->id .'/' . $voiture_reservee[0]->photos[0]->photo_titre) }}"
                      class="img-fluid rounded-3" alt="Cotton T-shirt">
                  </div>
                  <div class="col-md-5 col-lg-5 col-xl-5">
                    <p class="lead fw-normal mb-2">{{$marques->find($voiture_reservee[0]->modele->modele_marque_id)->marque_en}} {{ $voiture_reservee[0]->modele->modele_en }}</p>
                    <p><span class="text-muted">@lang('Car number'): </span>{{$voiture_reservee[0]->id}} </p>
                    <p><span class="text-muted">@lang('Reservation date'): </span> {{$voiture_reservee[1]->date_reserver}} </p>
                    <p><span class="text-muted">@lang('Remaining time'): </span> {{$voiture_reservee[2]}}</p>
                  </div>
                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0">${{$voiture_reservee[0]->prix_paye}}</h5>
                  </div>
                  @auth
                  <div class="col-md-2 col-lg-2 col-xl-2 text-end">
                    <!-- <a href="#" class="btn btn-info btn-md"><small>@lang('Add to cart')</small></a> -->
                      <form action="{{ route('panier.store') }}" method="post">
                      @csrf
                        <input type="hidden" name="voiture_id" value="{{ $voiture_reservee[0]->id }}">
                        <input type="hidden" name="photo_principale" value=" {{ $voiture_reservee[0]->photos[0]['photo_titre'] }} ">
                        <input type="hidden" name="marque" value="{{$marques->find($voiture_reservee[0]->modele->modele_marque_id)->marque_en}}" >
                        <input type="hidden" name="modele" value="{{$voiture_reservee[0]->modele->modele_en}}" >
                        <input type="hidden" name="prix" value="{{$voiture_reservee[0]->prix_paye}}" >
                        <input type="hidden" name="province_user_id" value="{{ Auth::user()->province_id }}" >
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
                      <button type="submit" class="btn btn-secondary btn-md"> <small>@lang('Add to cart')</small></button>
                    </form>
                    <form action="{{ route('reservation.delete', $voiture_reservee[1]->id) }}" method="POST">
                      {{--dump($voiture_reservee[1]->id)--}}
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="user_reserve_id" value="{{ $voiture_reservee[1]->id }}">
                      <button type="submit" class="btn btn-dark btn-md mt-4"> <small>@lang('Delete')</small></button>
                    </form>

                  </div>
                  @endauth
                </div>
              </div>
            </div>
            @empty
              <div class="col">
                  <div class="alert alert-danger">@lang('There are no reserved command to display!')</div>
              </div>
            @endforelse  
        @endisset

      </div>
    </div>
  </div>
</section>

@endsection
