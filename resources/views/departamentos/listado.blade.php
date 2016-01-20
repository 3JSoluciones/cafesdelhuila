<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($departamentos->count() == 0)
    <div class="text-center">
        <h4><b>Sin Datos Registrados</b></h4>
    </div>
@else
<table class="tabla display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>CREADO</th>
        <th>ACCION</th>
    </tr>
    </thead>
    <tbody>
    @foreach($departamentos as $departamento)
        <tr>
            <td>{{ $departamento->id }}</td>
            <td>{{ $departamento->nombre }}</td>
            <td>{{ $departamento->created_at }}</td>
            <td>
                <input type="button" value="Actualizar" class="btn_actualizar_departamento
                                btn btn-primary btn-sm" id_depart="{{ $departamento->id }}" nombre_depart="{{ $departamento->nombre }}">
                <input type="button" value="Eliminar" class="btn_eliminar_departamento
                                btn btn-danger btn-sm" id_depart="{{ $departamento->id }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

</body>
