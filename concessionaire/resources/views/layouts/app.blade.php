<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <!--ajouter CSS du Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="d-flex flex-column h-100">
    <!--header-->
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('pages.nouscontacter') }}">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('pages.aproposdenous') }}">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('pages.politiques') }}">Politiques</a>
      </li>
    </ul>
    <ul>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.create') }}">inscription</a>
        </li>
        
    </ul>
  </div>
</nav>
    </header>
    <!--main-->
    <div>
        @yield('content')
    </div>
    <!--footer-->
</body>
<!--ajouter JS du Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</html>