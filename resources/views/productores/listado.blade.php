<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($productores->count() == 0)
    <div class="text-center">
        <h4><b>Sin Datos Registrados</b></h4>
    </div>
@else
    <table class="tabla display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>NIT</th>
        <th>NOMBRE</th>
        <th>TELEFONO</th>
        <th>EMAIL</th>
        <th>ORGANIZACION</th>
        <th>ACCION</th>
    </tr>
    </thead>
    <tbody>
    @foreach($productores as $productor)
        <tr>
            <td>{{ $productor->id }}</td>
            <td>{{ $productor->nombre }}</td>
            <td>{{ $productor->telefono }}</td>
            <td>{{ $productor->email }}</td>
            <td>{{ $productor->organizacion->nombre }}</td>
            <td>
                <input type="button" value="Ver.Perfil" class="btn_perfil_prod
                                btn btn-warning btn-sm" id_prod="{{ $productor->id }}">
                <input type="button" value="Actualizar" class="btn_actualizar_prod
                                btn btn-primary btn-sm"
                       id_prod="{{ $productor->id }}"
                       nombre_prod="{{ $productor->nombre }}"
                       org_prod="{{ $productor->organizacion->id }}"
                       tel_prod="{{ $productor->telefono }}"
                       ema_prod="{{ $productor->email }}">
                <input type="button" value="Eliminar" class="btn_eliminar_prod
                                btn btn-danger btn-sm" id_prod="{{ $productor->id }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

</body>