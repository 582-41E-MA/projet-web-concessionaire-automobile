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
@php $locale = session()->get('locale') @endphp
    <!--header-->
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light container-fluid">
        <a class="navbar-brand" href="{{asset('/')}}"><img src="{{asset('assets/img/logo.png')}}" width="30" height="30" class="d-inline-block align-top mx-3" alt="logo">OZCARS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="text-nowrap nav-link" href="{{ route('voiture.index') }}">@lang('Find a car')</a>
                </li>
                @auth
                @if(Auth::user()->privilege_id == 3)
                <li class="nav-item">
                    <a class="nav-link {{ $__env->yieldContent('title') == 'Admin' ? 'active' : '' }} text-nowrap" href="{{ route('admin') }}">@lang('Administrator')</a>
                </li>
                @endif
                @if(Auth::user()->privilege_id != 1 )
                <li class="nav-item">
                    <a class="nav-link text-nowrap" href="{{ route('voiture.create') }}">@lang('Add a car')</a>
                </li>
                @endif
                @endauth
                <li class="nav-item">
                    <a class="text-nowrap nav-link {{ $__env->yieldContent('title') == 'Politiques de vente' ? 'active' : '' }}" href="{{asset('/politiques')}}">@lang('Sales policy')</a>
                </li>
                <li class="nav-item">
                    <a class="text-nowrap nav-link {{ $__env->yieldContent('title') == 'À propos de nous' ? 'active' : '' }}" href="{{asset('/about')}}">@lang('About us')</a>
                </li>
                <li class="nav-item">
                    <a class="text-nowrap nav-link {{ $__env->yieldContent('title') == 'Nous contacter' ? 'active' : '' }}" href="{{ route('pages.nouscontacter') }}">@lang('Contact us')</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="text-nowrap nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">@lang('Language') {{$locale}}</a>
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
                <div class="d-flex">
                    <a class="btn btn-secondary mx-3 my-2 my-sm-0" href="{{ route('reservation.index') }}">@lang('Reservation')</a>
                    <a class="btn btn-info mx-3 my-2 my-sm-0" href="{{ route('panier.index') }}">@lang('Cart')</a>
                    <a class="btn btn-primary mx-3 my-2 my-sm-0" href="{{ route('logout') }}">@lang('Logout')</a>
                </div>
            @endguest    
            </div>
        </div>
    </nav>
    
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
        <li class="nav-item"><a href="{{asset('/')}}" class="nav-link px-2 text-body-secondary">@lang('Home')</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">@lang('Find a car')</a></li>
        <li class="nav-item"><a href="{{ route('pages.politiques') }}" class="nav-link px-2 text-body-secondary">@lang('Sales policy')</a></li>
        <li class="nav-item"><a href="{{ route('pages.aproposdenous') }}" class="nav-link px-2 text-body-secondary">@lang('About us')</a></li>
        <li class="nav-item"><a href="{{ route('pages.nouscontacter') }}" class="nav-link px-2 text-body-secondary">@lang('Contact us')</a></li>
        </ul>
        <p class="text-center text-body-secondary">&copy; 2024 OZCARS, Inc</p>
    </footer>
    @endif
</body>
<!--ajouter JS du Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>