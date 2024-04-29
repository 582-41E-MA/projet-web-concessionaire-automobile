@extends('layouts.app')
@section('title')
    @lang('Add a car')
@endsection
@section('content')
<div class="row justify-content-center mt-5 mb-5 text-center">
    <!-- gestion des erreur -->
    @if(!$errors->isEmpty())
    <div class="container col-6">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    <div class="row justify-content-center mt-5 mb-5 text-center">
        <!-- component de menu de l'admin -->
        <x-admin-menu/>
        <!-- create voiture form -->
        <form action="{{ route('voiture.store') }}" class="form-signin col-8 col-sm-8 col-md-6 col-lg-4 mb-3" method="POST" enctype="multipart/form-data">

            @csrf
            <h1 class="h3 mb-3 font-weight-normal">@lang('Add a car')</h1>

            <!-- photos de la voiture -->
            <div class="form-group mb-3 text-start">
                <label for="inputPhotos">@lang('Upload pictures'):</label>
                <input type="file" id="inputPhotos" class="form-control" name="photos[]" multiple accept="image/*">
                <div id="thumbnails" class="my-2 mt-3 ">
                    <!-- ici seront générés les thumbnails d'images de voiture -->
                </div>

                @if($errors->has('photos'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('photos')}}
                    </div>
                @endif 
            </div>

            <!-- description_fr -->
            <div class="form-group mb-3 text-start">
                <label for="inputDescription_fr" class="sr-only form-label">@lang('French description')</label>
                <textarea id="inputDescription_fr" name="description_fr" class="form-control" value="{{old('description_fr')}}" placeholder="Entrez ici la description de la voiture"></textarea>

                @if($errors->has('description_fr'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('description_fr')}}
                    </div>
                @endif 
            </div>

            <!-- description_en -->
            <div class="form-group mb-3 text-start">
                <label for="inputDescription_en" class="sr-only form-label">@lang('English description')</label>
                <textarea id="inputDescription_en" name="description_en" class="form-control" value="{{old('description_en')}}" placeholder="Entrez ici la description de la voiture"></textarea>

                @if($errors->has('description_en'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('description_en')}}
                    </div>
                @endif 
            </div>
            <!-- annee -->
            <div class="form-group mb-3 text-start">
                <label for="inputAnnee" class="sr-only form-label">@lang('Year')</label>
                <input name="annee" type="number" id="inputAnnee" min="1900" max="2100" class="form-control" placeholder="annee*" value="{{old('annee')}}" autofocus>
                @if($errors->has('annee'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('annee')}}
                    </div>
                @endif
            </div>

            <!-- date_arrivee -->
            <div class="form-group mb-3 text-start">
                <label for="inputDate_arrivee" class="sr-only form-label">@lang('Arrival date')</label>
                <input name="date_arrivee" type="date" id="inputDate_arrivee" class="form-control" placeholder="date d'arrivée*" value="{{old('date_arrivee')}}" autofocus>
                @if($errors->has('date_arrivee'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('date_arrivee')}}
                    </div>
                @endif
            </div>

            <!-- prix_base -->
            <div class="form-group mb-3 text-start">
                <label for="inputPrix_base" class="sr-only form-label">@lang('Base price')</label>
                <input name="prix_base" type="number" min="0" id="inputPrix_base" class="form-control" placeholder="prix_base*" value="{{old('prix_base')}}" autofocus>
                @if($errors->has('prix_base'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('prix_base')}}
                    </div>
                @endif
            </div>
            
            <!-- taux_augmenter -->
            <div class="form-group mb-3 text-start">
                <label for="inputTaux_augmenter" class="sr-only form-label">@lang('Increase rate')</label>
                <input name="taux_augmenter" type="number" min="0" max="100" id="inputTaux_augmenter" class="form-control" placeholder="taux en pourcentage*" value="{{old('taux_augmenter')}}" autofocus>
                @if($errors->has('taux_augmenter'))
                <div class="text-danger mt-2">
                    {{ $errors->first('taux_augmenter')}}
                </div>
                @endif
            </div>
            
            <!-- prix_paye -->
            <div class="form-group mb-3 text-start">
                <label for="inputPrix_paye" class="sr-only form-label">@lang('Price')</label>
                <input name="prix_paye" type="number" min="0" id="inputPrix_paye" class="form-control" placeholder="prix_paye*" value="{{old('prix_paye')}}" autofocus>
                @if($errors->has('prix_paye'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('prix_paye')}}
                    </div>
                @endif
            </div>

            <!-- carrosserie -->
            <div class="form-group mb-3 text-start">
                <label for="inputCarrosserie" class="form-label">@lang('Bodywork')</label>
                <select name="carrosserie" id="inputCarrosserie" class="form-control">
                        <option value="" >@lang('Select bodywork')</option>
                    @foreach($carrosseries as $carrosserie)
                        <option value="{{$carrosserie->id}}" @if($carrosserie->id == old('carrosserie')) selected @endif >{{ $carrosserie->carrosserie_en }}</option>

                        @endforeach
                </select>
                @if($errors->has('carrosserie'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('carrosserie')}}
                    </div>
                @endif
            </div>
            <!-- marque -->
            <div class="form-group mb-3 text-start">
                <label for="inputMarque" class="form-label">@lang('Brand')</label>
                <select name="marque" id="inputMarque" class="form-control">
                        <option value="" >@lang('Select brand')</option>
                    @foreach($marques as $marque)
                        <option value="{{$marque->id}}" @if($marque->id == old('marque')) selected @endif >{{ $marque->marque_en }}</option>

                        @endforeach
                </select>
                @if($errors->has('marque'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('marque')}}
                    </div>
                @endif
            </div>

            <!-- modele -->
            <div class="form-group mb-3 text-start">
                <label for="inputModele" class="form-label">@lang('Model')</label>
                <select name="modele" id="inputModele" class="form-control" >
                        <option value="" >@lang('Select model')</option>

                </select>
                @if($errors->has('modele'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('modele')}}
                    </div>
                @endif
            </div>

             <!-- pays -->
             <div class="form-group mb-3 text-start">
                <label for="inputPays" class="form-label">@lang('Country of origin')</label>
                <select name="pays" id="inputPays" class="form-control">
                        <option value="" >@lang('Select country')</option>
                    @foreach($pays as $pays)
                        <option value="{{$pays->id}}" @if($pays->id == old('pays')) selected @endif >{{ $pays->pays_en }}</option>

                        @endforeach
                </select>
                @if($errors->has('pays'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('pays')}}
                    </div>
                @endif
            </div>

            <button class="btn btn-lg btn-primary w-100" type="submit">@lang('Save')</button>
        </form>
    </div>
</div>
    <!-- les scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         //generer les thumbnails des images de voitures uploadées
         document.getElementById('inputPhotos').addEventListener('change', function(event) {
            const thumbnailsContainer = document.getElementById('thumbnails');
            while (thumbnailsContainer.firstChild) { 
                // thumbnailsContainer.removeChild(thumbnailsContainer.firstChild); 
                // OR 
                thumbnailsContainer.firstChild.remove(); 
            }
            const files = event.target.files;
        
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                const thumbnail = createThumbnail(e.target.result, file);
                thumbnailsContainer.appendChild(thumbnail);
            };
            reader.readAsDataURL(file);
        });
        });

        function createThumbnail(src, file) {        
            const thumbnailContainer = document.createElement('div');
            thumbnailContainer.classList.add('thumbnail');
            thumbnailContainer.classList.add('card');

            const img = document.createElement('img');
            img.src = src;
            thumbnailContainer.appendChild(img);

            return thumbnailContainer;
        }
        $(document).ready(function() {
            $('#inputMarque').change(function() {
                var oldModele = "{{ old('modele') }}";
                var marqueId = $(this).val();
                if (marqueId) {
                    $.ajax({
                        type: "GET",
                        url: "/modeles/"+marqueId,
                        success: function(modeles) {
                            $('#inputModele').empty();
                            $.each(modeles, function(key, value) {
                                $('#inputModele').append('<option value="' + value.id + '" >' + value.modele_en + '</option>');
                                // $('#inputModele').append('<option value="' + value.id + '" >' + value.modele_en + '</option>').prop('selected', $('#inputModele').prop('value') !== null);
                            });
                            console.log(oldmodele);
                            $('#inputModele').prop('disabled', false);
                        }
                    });
                } else {
                    $('#inputModele').empty();
                    $('#inputModele').prop('disabled', true);
                }
            });
        });
    </script>

@endsection