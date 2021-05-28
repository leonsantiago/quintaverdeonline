<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    {{--    <link rel="stylesheet" type="text/css" href="<?= base_url?>assets/css/print.css" media="print" />--}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    {{--F O N T S--}}
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@600&family=Lato&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=B612&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Quinta verde</title>
</head>
<body>

<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container-fluid admin-menu">
            <a class="navbar-brand" href="#">
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
                        <a class="nav-link" href="{{ route('admin.orders') }}">Pedidos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('admin.products') }}">Ver todos</a></li>
                            <li><a class="dropdown-item" href="{{ route('product.create') }}">Agregar</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Modificar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.shopping') }}">Lista de compras</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('menu')

</div>


<footer class="footer" id="footer" style="background: white;">
    <div class="row text-center text-shadow">
        <p>Desarrollado por
            <a href="https://www.instagram.com/akhenaleon">  <span > Santiago Leon </span> &copy; <?= date('Y') ?></a>
        </p>
    </div>
</footer>
</body>
</html>








