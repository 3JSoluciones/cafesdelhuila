<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($tiposBeneficios->count() == 0)
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
    @foreach($tiposBeneficios as $tipoBeneficio)
        <tr>
            <td>{{ $tipoBeneficio->id }}</td>
            <td>{{ $tipoBeneficio->nombre }}</td>
            <td>{{ $tipoBeneficio->created_at }}</td>
            <td>
                <input type="button" value="Actualizar" class="btn_actualizar_tipoBene
                                btn btn-primary btn-sm" id_tipoBene="{{ $tipoBeneficio->id }}" nombre_tipoBene="{{ $tipoBeneficio->nombre }}">
                <input type="button" value="Eliminar" class="btn_eliminar_tipoBene
                                btn btn-danger btn-sm" id_tipoBene="{{ $tipoBeneficio->id }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

</body>
