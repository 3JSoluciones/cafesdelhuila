<html>
    <head>
        <title>Cafes del Huila</title>

        <!-- estilos -->
        <!-- bootstrap -->
        <link href="/bower_components/bootswatch/cerulean/bootstrap.css" rel="stylesheet">
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
    <!-- Toastr -->
    <script src="/bower_components/toastr/toastr.js"></script>
    <!-- fin js -->

    <script src="../js/scrip.js"></script>

    @yield('page-js-code')

</body>
</html>


