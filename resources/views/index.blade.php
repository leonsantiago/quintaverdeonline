<!DOCTYPE html>
<html lang="es">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        {{--    <link rel="stylesheet" type="text/css" href="<?= base_url?>assets/css/print.css" media="print" />--}}
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@600&family=Lato&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>Quinta verde</title>
    </head>
    <body>
    <header class="row main-header  justify-content-center">
        <div class="col-9" id="logo">
            <div class="header mx-auto">
                <a href="{{ route('products/index') }}">
                    <img  src="https://quintaverde.online/assets/img/otros/quinta_verde2.png" class="rounded" style="height: 100px" alt="Quinta verde logo">
                </a>
            </div>
        </div>
    </header>

    <div class="container">

        @yield('content')

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
