<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($variedades->count() == 0)
    <div class="text-center">
        <h4><b>Sin Datos Registrados</b></h4>
    </div>
@else
    <table class="tabla display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>ACIDEZ</th>
        <th>AROMA</th>
        <th>SABOR</th>
        <th>CREADO</th>
        <th>ACCION</th>
    </tr>
    </thead>
    <tbody>
    @foreach($variedades as $variedad)
        <tr>
            <td>{{ $variedad->id }}</td>
            <td>{{ $variedad->nombre }}</td>
            <td>@if(isset($variedad->acidez->nombre)) {{ $variedad->acidez->nombre }} @else Ninguna @endif</td>
            <td>@if(isset($variedad->aroma->nombre)) {{ $variedad->aroma->nombre }} @else Ninguna @endif</td>
            <td>@if(isset($variedad->sabor->nombre)) {{ $variedad->sabor->nombre }} @else Ninguna @endif</td>
            <td>{{ $variedad->created_at }}</td>
            <td>
                <input type="button" value="Actualizar" class="btn_actualizar_varied
                                btn btn-primary btn-sm"
                       id_varied="{{ $variedad->id }}"
                       nombre_varied="{{ $variedad->nombre }}"
                       acidez_varied="{{ $variedad->acidez_id }}"
                       aroma_varied="{{ $variedad->aroma_id }}"
                       sabor_varied="{{ $variedad->sabor_id }}"
                       varidCol_varied="{{ $variedad->variedadescol }}" >
                <input type="button" value="Eliminar" class="btn_eliminar_varied
                                btn btn-danger btn-sm" id_varied="{{ $variedad->id }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

</body>
