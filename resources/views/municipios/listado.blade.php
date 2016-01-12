<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($municipios->count() == 0)
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
    @foreach($municipios as $municipio)
        <tr>
            <td>{{ $municipio->id }}</td>
            <td>{{ $municipio->nombre }}</td>
            <td>{{ $municipio->created_at }}</td>
            <td>
                <input type="button" value="Actualizar" class="btn_actualizar_municipio
                                btn btn-primary btn-sm" id_municipio="{{ $municipio->id }}" nombre_municipio="{{ $municipio->nombre }}">
                <input type="button" value="Eliminar" class="btn_eliminar_municipio
                                btn btn-danger btn-sm" id_municipio="{{ $municipio->id }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

</body>