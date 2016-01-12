<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($lotes->count() == 0)
    <div class="text-center">
        <h4><b>Sin Datos Registrados</b></h4>
    </div>
@else
<table class="tabla display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>NIT</th>
        <th>NOMBRE</th>
        <th>AREA</th>
        <th>FINCA</th>
        <th>TP.BENEF</th>
        <th>TP.SECAD</th>
        <th>CREADO</th>
        <th>ACCION</th>
    </tr>
    </thead>
    <tbody>
    @foreach($lotes as $lote)
        <tr>
            <td>{{ $lote->id }}</td>
            <td>{{ $lote->nombre }}</td>
            <td>{{ $lote->area }}</td>
            <td>{{ $lote->finca->finca }}</td>
            <td>{{ $lote->tipo_beneficio->nombre }}</td>
            <td>{{ $lote->tipo_secado->nombre }}</td>
            <td>{{ $lote->created_at }}</td>
            <td>
                <input type="button" value="Actualizar" class="btn_actualizar_lote
                                btn btn-primary btn-sm"
                       id                           ="{{ $lote->id }}"
                       Finca_id                     ="{{ $lote->finca_id }}"
                       <?php

                       if($lote->variedad1_id == 0) { } else { ?> Variedad1_id ="{{ $lote->variedad1_id }}" <?php }
                       if($lote->variedad2_id == 0) { } else { ?> Variedad2_id ="{{ $lote->variedad2_id }}" <?php }
                       if($lote->variedad3_id == 0) { } else { ?> Variedad3_id ="{{ $lote->variedad3_id }}" <?php }

                       ?>
                       Tipo_beneficio_id            ="{{ $lote->tipo_beneficio_id }}"
                       Tipo_secado_id               ="{{ $lote->tipo_secado_id }}"
                       Cantidad_arboles_variedad1   ="{{ $lote->cantidad_arboles_variedad1 }}"
                       Cantidad_arboles_variedad2   ="{{ $lote->cantidad_arboles_variedad2 }}"
                       Cantidad_arboles_variedad3   ="{{ $lote->cantidad_arboles_variedad3 }}"
                       Nombre                       ="{{ $lote->nombre }}"
                       Area                         ="{{ $lote->area }}"
                       Perfil                       ="{{ $lote->perfil }}"

                        >
                <input type="button" value="Eliminar" class="btn_eliminar_lote
                                btn btn-danger btn-sm" id_lote="{{ $lote->id }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

</body>