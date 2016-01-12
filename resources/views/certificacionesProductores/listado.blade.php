<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($certificacionesProductores->count() == 0)
    <div class="text-center">
        <h4><b>Sin Datos Registrados</b></h4>
    </div>
@else
<table class="tabla display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>NIT</th>
        <th>PRODUCTOR</th>
        <th>CERTIFICACION</th>
        <th>CREADO</th>
        <th>ACCION</th>
    </tr>
    </thead>
    <tbody>
    @foreach($certificacionesProductores as $certificacionProductor)
        <tr>
            <td>{{ $certificacionProductor->id }}</td>
            <td>{{ $certificacionProductor->productor->nombre }}</td>
            <td>{{ $certificacionProductor->certificacion->nombre }}</td>
            <td>{{ $certificacionProductor->created_at }}</td>
            <td>
                <input type="button" value="Actualizar" class="btn_actualizar_certiProd
                                btn btn-primary btn-sm"
                       id_certiProd="{{ $certificacionProductor->id }}"
                       prod_certiProd="{{ $certificacionProductor->productor->id }}"
                       cert_certiProd="{{ $certificacionProductor->certificacion->id }}" >
                <input type="button" value="Eliminar" class="btn_eliminar_certiProd
                                btn btn-danger btn-sm" id_certiProd="{{ $certificacionProductor->id }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

</body>