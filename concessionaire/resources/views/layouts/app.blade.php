<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <!--ajouter CSS du Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
</head>
<body class="d-flex flex-column h-100">
@php $locale = session()->get('locale');
print_r($locale)
@endphp
    
    @if($__env->yieldContent('title') != 'Connexion' && $__env->yieldContent('title') != 'Inscription')
    <nav class="navbar navbar-expand-lg navbar-light bg-light container-fluid">
        <a class="navbar-brand" href="{{asset('/')}}"><img src="{{asset('assets/img/logo.png')}}" width="30" height="30" class="d-inline-block align-top mx-3" alt="logo">OZCARS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('voiture.index') }}">Trouver un véhicule</a>
                </li>
                @auth
                @if(Auth::user()->privilege_id == 3)
                <li class="nav-item">
                    <a class="nav-link {{ $__env->yieldContent('title') == 'Admin' ? 'active' : '' }}" href="{{ route('admin') }}">@lang('Administrator')</a>
                </li>
                @endif
                @if(Auth::user()->privilege_id != 1 )
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('voiture.create') }}">Ajouter un véhicule</a>
                </li>
                @endif
                @endauth
                <li class="nav-item">
                    <a class="nav-link {{ $__env->yieldContent('title') == 'Politiques de vente' ? 'active' : '' }}" href="{{asset('/politiques')}}">Politiques de vente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $__env->yieldContent('title') == 'À propos de nous' ? 'active' : '' }}" href="{{asset('/about')}}">À propos de nous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $__env->yieldContent('title') == 'Nous contacter' ? 'active' : '' }}" href="{{ route('pages.nouscontacter') }}">Nous contacter</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Langue</a>
                    <ul class="dropdown-menu col-xs-6 col-sm-4 col-md-3">
                        <li><a class="dropdown-item" href="{{ route('lang', 'en') }}">@lang('English')</a></li>
                        <li><a class="dropdown-item" href="{{ route('lang', 'fr') }}">@lang('French')</a></li>
                    </ul>
                </li>
            </ul>
            <div class="ms-auto">
            @guest
                <a class="btn btn-primary mx-3 my-2 my-sm-0" href="{{ route('login') }}">@lang('Login')</a>
            @else

                <a class="btn btn-info mx-3 my-2 my-sm-0" href="{{ route('panier.index') }}">Panier</a>
                <a class="btn btn-primary mx-3 my-2 my-sm-0" href="{{ route('logout') }}">Deconnecter</a>
            @endguest    
            </div>
        </div>
    </nav>
    @endif
    <!--main-->
    <div>
        <div class="container my-5">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        @yield('content')
    </div>
    <!--footer-->
    @if($__env->yieldContent('title') != 'Connexion' && $__env->yieldContent('title') != 'Inscription')
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="{{asset('/')}}" class="nav-link px-2 text-body-secondary">Accueil</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Trouver un véhicule</a></li>
        <li class="nav-item"><a href="{{ route('pages.politiques') }}" class="nav-link px-2 text-body-secondary">Politiques de vente</a></li>
        <li class="nav-item"><a href="{{ route('pages.aproposdenous') }}" class="nav-link px-2 text-body-secondary">À propos de nous</a></li>
        <li class="nav-item"><a href="{{ route('pages.nouscontacter') }}" class="nav-link px-2 text-body-secondary">Nous contacter</a></li>
        </ul>
        <p class="text-center text-body-secondary">&copy; 2024 OZCARS, Inc</p>
    </footer>
    @endif
</body>
<!--ajouter JS du Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>