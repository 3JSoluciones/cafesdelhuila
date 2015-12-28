<html>
    <head>
        <title>Cafes del Huila</title>
    </head>

    <!-- estilos -->

    <!-- bootstrap -->
    <link href="/bower_components/bootswatch/yeti/bootstrap.css" rel="stylesheet">

    <!-- fin de los estilos -->

<body>

@include('layouts.topbar')

<br>
@yield('content')

@include('layouts.footer')

</body>

    <!-- js -->

    <!-- jquery -->
    <script src="/bower_components/jquery/dist/jquery.js"></script>
    <!-- bootstrap -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Toastr -->
    <script src="/bower_components/toastr/toastr.js"></script>

    <!-- fin js -->

</html>
