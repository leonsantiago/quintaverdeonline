<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link href="{{ secure_asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ secure_asset('js/bootstrap.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
    {{--    <link rel="stylesheet" type="text/css" href="<?= base_url?>assets/css/print.css" media="print" />--}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    {{--F O N T S--}}
    
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@600&family=Lato&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=B612&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- T O G G L E   C H E C K B O X --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <title>Quinta verde</title>
</head>
<body>

<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container-fluid admin-menu">
            <a class="navbar-brand" href="{{ route('admin.orders.index') }}">
                <img  src="https://quintaverde.online/assets/img/otros/quinta_verde2.png" class="rounded" style="height: 70px" alt="Quinta verde logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">Inicio</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.orders.index') }}">Pedidos</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.products') }}">Productos</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('promotions.index') }}">Promociones</a>
                  </li>
                </ul>
                <hr>
                <div class="pull-right">
                  @if(Auth::check())
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                      {{ csrf_field() }}
                      <button style="color:rgba(0, 0, 0, 0.5); background: none; border: none;" type="submit">Cerrar sesión</button>
                    </form>
                  @else
                    <a id="login" class="btn btn-primary" href="{{ route('login') }}" >Iniciar sesión </a>
                  @endif
                </div>
            </div>
        </div>
    </nav>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if (isset(Auth::user()->id) && Auth::user()->admin)
      @yield('menu')
    @endif

    @yield('login')

</div>

<footer class="footer" id="footer" style="background: white; margin-top: 100px; font-size: 2vh;">
    <div class="row text-center text-shadow">
        <p>Desarrollado por
            <a href="https://www.instagram.com/akhenaleon"  style=" color: black;">  <span style=" color: black;"> Santiago Leon </span> &copy; <?= date('Y') ?></a>
        </p>
    </div>
</footer>

</body>
</html>









