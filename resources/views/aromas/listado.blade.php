<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($aromas->count() == 0)
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
    @foreach($aromas as $aroma)
        <tr>
            <td>{{ $aroma->id }}</td>
            <td>{{ $aroma->nombre }}</td>
            <td>{{ $aroma->created_at }}</td>
            <td>
                <input type="button" value="Actualizar" class="btn_actualizar_aromas
                                btn btn-primary btn-sm" id_aromas="{{ $aroma->id }}" nombre_aromas="{{ $aroma->nombre }}">
                <input type="button" value="Eliminar" class="btn_eliminar_aromas
                                btn btn-danger btn-sm" id_aromas="{{ $aroma->id }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

</body>