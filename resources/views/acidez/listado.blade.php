<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($acidez->count() == 0)
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
        @foreach($acidez as $acidz)
            <tr>
                <td>{{ $acidz->id }}</td>
                <td>{{ $acidz->nombre }}</td>
                <td>{{ $acidz->created_at }}</td>
                <td>
                    <input type="button" value="Actualizar" class=" btn_actualizar_acidez
                                btn btn-primary btn-sm" id_acidez="{{ $acidz->id }}" nombre_acidez="{{ $acidz->nombre }}">
                    <input type="button" value="Eliminar" class="btn_eliminar_acidez
                                btn btn-danger btn-sm" id_acidez="{{ $acidz->id }}">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif

</body>
