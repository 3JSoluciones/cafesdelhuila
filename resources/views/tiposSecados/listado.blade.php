<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($tiposSecados->count() == 0)
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
    @foreach($tiposSecados as $tipoSecado)
        <tr>
            <td>{{ $tipoSecado->id }}</td>
            <td>{{ $tipoSecado->nombre }}</td>
            <td>{{ $tipoSecado->created_at }}</td>
            <td>
                <input type="button" value="Actualizar" class="btn_actualizar_tipoSeca
                                btn btn-primary btn-sm" id_tipoSeca="{{ $tipoSecado->id }}" nombre_tipoSeca="{{ $tipoSecado->nombre }}">
                <input type="button" value="Eliminar" class="btn_eliminar_tipoSeca
                                btn btn-danger btn-sm" id_tipoSeca="{{ $tipoSecado->id }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

</body>