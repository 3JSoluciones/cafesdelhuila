<html>
    <head>
        <title>Cafes del Huila</title>

        <!-- estilos -->
        <!-- bootstrap -->
        <link href="/bower_components/bootswatch/cerulean/bootstrap.css" rel="stylesheet">
        <link href="/bower_components/bootstrap/dist/css/bootstrap2.min.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="http://davidstutz.github.io/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" type="text/css"/>
        <link href="/bower_components/toastr/toastr.css" rel="stylesheet">
        <!-- fin de los estilos -->

        @yield('page-css-code')

    </head>
<body >

    <div class="text-center">
        @include('layouts.topbar')
    </div>

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


