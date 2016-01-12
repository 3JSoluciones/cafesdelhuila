<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($sabores->count() == 0)
    <div class="text-center">
        <h4><b>Sin Datos Registrados</b></h4>
    </div>
@else
    <table class="tabla display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>NIT</th>
        <th>NOMBRE</th>
        <th>CREADO</th>
        <th>ACCION</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sabores as $sabor)
        <tr>
            <td>{{ $sabor->id }}</td>
            <td>{{ $sabor->nombre }}</td>
            <td>{{ $sabor->created_at }}</td>
            <td>
                <input type="button" value="Actualizar" class="btn_actualizar_sabor
                                btn btn-primary btn-sm" id_sabor="{{ $sabor->id }}" nombre_sabor="{{ $sabor->nombre }}">
                <input type="button" value="Eliminar" class="btn_eliminar_sabor
                                btn btn-danger btn-sm" id_sabor="{{ $sabor->id }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

</body>