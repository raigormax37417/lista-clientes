<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elecciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet" />

</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://www.google.com/jsapi"></script>
    <header>
   <!-- <nav class="navbar navbar-dark bg-primary navbar-expand-lg">
      <ul id="menu" class="navbar-nav mr-auto">
        <li class="nav-item active"><a class="navbar-brand" href="">Inicio</a></li>
        <li class="dropdown-item container-submenu">
          <a class="dropdown-item submenu-btn" href="#">Candidato<i class="fas fa-chevron-down"></i></a>
          <ul class="dropdown-menu">
            <li class="dropdown-item"><a class="dropdown-item" href="{{ route('candidato.create') }}">Crear</a></li>
            <li class="dropdown-item"><a class="dropdown-item" href="{{ route('candidato.index') }}">Consultar</a></li>
          </ul>
        </li>
        <li class="dropdown-item container-submenu">
          <a class="dropdown-item submenu-btn" href="#">Casilla<i class="fas fa-chevron-down"></i></a>
          <ul class="dropdown-menu">
            <li class="dropdown-item"><a class="dropdown-item" href="{{ route('casilla.create') }}">Crear</a></li>
            <li class="dropdown-item"><a class="dropdown-item" href="{{ route('casilla.index') }}">Consultar</a></li>
          </ul>
        </li>
        <li class="dropdown-item container-submenu">
          <a class="dropdown-item submenu-btn" href="#">Elección<i class="fas fa-chevron-down"></i></a>
          <ul class="dropdown-menu">
            <li class="dropdown-item"><a class="dropdown-item" href="{{ route('eleccion.create') }}">Crear</a></li>
            <li class="dropdown-item"><a class="dropdown-item" href="{{ route('eleccion.index') }}">Consultar</a></li>
          </ul>
        </li>
        <li class="dropdown-item container-submenu">
          <a class="dropdown-item submenu-btn" href="#">Voto<i class="fas fa-chevron-down"></i></a>
          <ul class="dropdown-menu">
            <li class="dropdown-item"><a class="dropdown-item" href="{{ route('voto.create') }}">Crear</a></li>
            <li class="dropdown-item"><a class="dropdown-item" href="{{ route('voto.index') }}">Consultar</a></li>
          </ul>
        </li>
        <li class="dropdown-item"><a class="dropdown-item" href="">Cerrar Sesión</a></li>
       </ul>
      </nav> -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Candidato 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('candidato.create') }}">Crear</a></li>
            <li><a class="dropdown-item" href="{{ route('candidato.index') }}">Consultar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Casilla 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('casilla.create') }}">Crear</a></li>
            <li><a class="dropdown-item" href="{{ route('casilla.index') }}">Consultar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Elección 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('eleccion.create') }}">Crear</a></li>
            <li><a class="dropdown-item" href="{{ route('eleccion.index') }}">Consultar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Voto 
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('voto.create') }}">Crear</a></li>
            <li><a class="dropdown-item" href="{{ route('voto.index') }}">Consultar</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>   
    </header>
    <div class="container">
       <div class="row">
           <div class="col-md-2">
               <img src="https://media.glassdoor.com/sqll/2494896/instituto-tecnológico-nacional-de-méxico-squarelogo-1554785525101.png" width="200px">
           </div>
           <div class="col-md-8 text-center">
               <h1>Instituto Tecnológico del Valle de Oaxaca</h1>
           </div>
           <div class="col-md-2">
           </div>
       </div>
        @yield('content')
    </div>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
