<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($medios->count() == 0)
    <div class="text-center">

    </div>
@else
    <table class="tabla display" cellspacing="0" width="100%">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <thead>
        <tr>
            <th>NIT</th>
            <th>MEDIO</th>
            <th>CREADO</th>
            <th>ACCION</th>
        </tr>
        </thead>
        <tbody>
        @foreach($medios as $medio)

            <tr>
                <td>{{ $medio->id }}</td>
                <td>{{ $medio->nombre }}</td>
                <td>{{ $medio->created_at }}</td>
                <td>
                    <input type="button" value="Eliminar" class="btn_eliminar_medio
                                btn btn-danger btn-sm" id_medio="{{ $medio->id }}">
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endif


</body>