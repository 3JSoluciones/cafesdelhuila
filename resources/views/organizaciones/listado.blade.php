<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($organizaciones->count() == 0)
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
    @foreach($organizaciones as $organizacion)
        <tr>
            <td>{{ $organizacion->id }}</td>
            <td>{{ $organizacion->nombre }}</td>
            <td>{{ $organizacion->created_at }}</td>
            <td>
                <input type="button" value="Actualizar" class="btn_actualizar_organiz
                                btn btn-primary btn-sm" id_organiz="{{ $organizacion->id }}" nombre_organiz="{{ $organizacion->nombre }}">
                <input type="button" value="Eliminar" class="btn_eliminar_organiz
                                btn btn-danger btn-sm" id_organiz="{{ $organizacion->id }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

</body>