<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($certificaciones->count() == 0)
    <div class="text-center">
        <h4><b>Sin Datos Registrados</b></h4>
    </div>
@else
<table id="tabla_certificaciones" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>NIT</th>
        <th>NOMBRE</th>
        <th>CREADO</th>
        <th>ACCION</th>
    </tr>
    </thead>
    <tbody>
    @foreach($certificaciones as $certificacione)
        <tr>
            <td>{{ $certificacione->id }}</td>
            <td>{{ $certificacione->nombre }}</td>
            <td>{{ $certificacione->created_at }}</td>
            <td>
                <input type="button" value="Actualizar" class="btn_actualizar_certif
                                btn btn-primary btn-sm" id_certif="{{ $certificacione->id }}" nombre_certif="{{ $certificacione->nombre }}">
                <input type="button" value="Eliminar" class="btn_eliminar_certif
                                btn btn-danger btn-sm" id_certif="{{ $certificacione->id }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

</body>