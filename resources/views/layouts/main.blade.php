<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cafes del Huila</title>

    <!-- estilos -->
    <!-- bootstrap -->

    <link href="/bower_components/jquery/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/bower_components/jquery/jquery.dataTables.css">

    <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="http://davidstutz.github.io/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" type="text/css"/>
    <link href="/bower_components/toastr/toastr.css" rel="stylesheet">
    <!-- fin de los estilos -->

    @yield('page-css-code')

</head>
<body id="app-layout">
<center>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="/home">
                   <b>Cafes Del Huila</b>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/">INICIO</a></li>
                        </ul>

                        <li><a href="/login">Iniciar Sesion</a></li>
                        <li><a href="/register">Crear una cuenta</a></li>
                    @else

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/home">INICIO</a></li>
                        </ul>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/logout"><i class="fa fa-btn fa-sign-out"></i>Cerrar sesion ..</a></li>
                            </ul>
                        </li>

                    @endif
                </ul>
            </div>

        </div>
    </nav>
</center>
<div class="container">
    @yield('content')
</div>

<div class="text-center">
    @include('layouts.footer')
</div>



<!-- js -->

<!-- jquery -->
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://davidstutz.github.io/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>

<script type="text/javascript" charset="utf8" src="/bower_components/jquery/jquery.dataTables.js"></script>

<!-- Toastr -->
<script src="/bower_components/toastr/toastr.js"></script>
<script src="/js/scrip.js"></script>
<!-- fin js -->

<script type="application/javascript">

    $(document).ready(function () {

        //configuracion notificaciones

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

    });

</script>

@yield('page-js-code')


</body>
</html>


