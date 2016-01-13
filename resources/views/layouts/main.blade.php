<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cafes del Huila</title>

    <!-- estilos -->

    <!--
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
         <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" type="text/css" />
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css' />
         <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css' />
         <link href="https://kendo.cdn.telerik.com/2014.1.318/styles/kendo.common.min.css" rel="stylesheet" />
         <link href="//cdn.kendostatic.com/2013.1.319/styles/kendo.default.min.css" rel="stylesheet" />
         <link href="http://davidstutz.github.io/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" type="text/css" rel="stylesheet"/>
       -->
        <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="/bower_components/jquery/jquery.dataTables.min.css" rel="stylesheet">
        <link href="/bower_components/jquery/jquery.dataTables.css" rel="stylesheet" type="text/css" >
        <link href="/bower_components/toastr/toastr.css" rel="stylesheet">
        <link href="/bower_components/bootstrap/dist/css/bootstrap-combined.min.css" rel="stylesheet" type="text/css" />
        <link href="/telerik/styles/kendo.common.min.css" rel="stylesheet" type="text/css" />
        <link href="/telerik/styles/kendo.bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- fin de los estilos -->

    <style type="text/css">

        span.k-widget.k-tooltip-validation {
            border: 0;
            padding: 0;
            margin: 0;
            background: none;
            box-shadow: none;
            display: inline-block;
            color: #b9b9b9;
        }

        .date {
            width: 100%;
        }

        .select {
            width: 100%;
        }

    </style>

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
                <ul class="nav navbar-nav navbar-left">

                    <!-- Authentication Links -->
                    @if (Auth::guest())


                    @else

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="http://cafesdelhuila.com/productores/create">PRODUCTORES</a></li>
                        </ul>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                DATOS <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                    <li><a href="http://cafesdelhuila.com/acidez/create"><i class="fa fa-btn fa-sign-out"></i>Acidez</a></li>
                                    <li><a href="http://cafesdelhuila.com/aromas/create"><i class="fa fa-btn fa-sign-out"></i>Aromas</a></li>
                                    <li><a href="http://cafesdelhuila.com/certificaciones/create"><i class="fa fa-btn fa-sign-out"></i>Certificaciones</a></li>
                                    <li><a href="http://cafesdelhuila.com/departamentos/create"><i class="fa fa-btn fa-sign-out"></i>Departamentos</a></li>
                                    <li><a href="http://cafesdelhuila.com/municipios/create"><i class="fa fa-btn fa-sign-out"></i>Municipios</a></li>
                                    <li><a href="http://cafesdelhuila.com/organizaciones/create"><i class="fa fa-btn fa-sign-out"></i>Organizaciones</a></li>
                                    <li><a href="http://cafesdelhuila.com/sabores/create"><i class="fa fa-btn fa-sign-out"></i>Sabores</a></li>
                                    <li><a href="http://cafesdelhuila.com/tiposBeneficios/create"><i class="fa fa-btn fa-sign-out"></i>Tipos Beneficios</a></li>
                                    <li><a href="http://cafesdelhuila.com/tiposSecados/create"><i class="fa fa-btn fa-sign-out"></i>Tipos Secados</a></li>
                                    <li><a href="http://cafesdelhuila.com/variedades/create"><i class="fa fa-btn fa-sign-out"></i>Variedades</a></li>
                            </ul>
                        </li>

                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    <div class="navbar-brand contenedor_carga nav navbar-nav navbar-right"></div>
                    <!-- Authentication Links -->
                    @if (Auth::guest())

                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="/">INICIO</a></li>
                        </ul>

                        <li><a href="/login">Iniciar Sesion</a></li>
                        <li><a href="/register">Crear una cuenta</a></li>
                    @else

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

    <div class="panel-body text-center">
       <img src="/img/descarga.jpeg" width="600px"; style="padding: 0; margin: 0; margin-right: 0px; text-align: center !important;">
        <!--<b style="color: #901504; font-size: 100px; text-shadow: 0 0 0.1em, 0 0 0.1em #0001ff">CAFES DEL HUILA</b>-->
    </div>

    @yield('content')
</div>

<div class="text-center">
    @include('layouts.footer')
</div>



<!-- js -->

<!--
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="http://davidstutz.github.io/bootstrap-multiselect/dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
<script src="https://kendo.cdn.telerik.com/2014.1.318/js/kendo.all.min.js"></script>
-->


<script src="/bower_components/jquery/dist/jquery.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/telerik/js/kendo.all.min.js"></script>
<script src="/bower_components/jquery/jquery.validate.js"></script>
<script src="/bower_components/jquery/jquery.dataTables.js" type="text/javascript" charset="utf8"></script>
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
        };

        $('.contenedor_carga')
                .hide()
                .html('<img src="{{ asset('img/loader.gif') }}" width="18px">' );

    });

</script>

@yield('page-js-code')


</body>
</html>


