<html>
    <head>
        <title>Cafes del Huila</title>

        <!-- estilos -->
        <!-- bootstrap -->
        <link href="/bower_components/bootswatch/cerulean/bootstrap.css" rel="stylesheet">
        <link href="/bower_components/bootstrap/dist/css/bootstrap2.min.css" rel="stylesheet">
        <link href="/bower_components/bootstrap/dist/css/bootstrapValidator.min.css" rel="stylesheet">
        <!-- fin de los estilos -->

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
    <script src="/bower_components/jquery/dist/jquery.js"></script>
    <script src="/bower_components/jquery/dist/jquery-1.11.2.min.js"></script>
    <!-- bootstrap -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Toastr -->
    <script src="/bower_components/toastr/toastr.js"></script>
    <!-- fin js -->

    <script type="application/javascript">

        $(document).ready(function () {

            //configuracion d <scs notificaciones
            function msg() {

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "300",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

            };


        });

    </script>

    @yield('page-js-code')


</body>
</html>


