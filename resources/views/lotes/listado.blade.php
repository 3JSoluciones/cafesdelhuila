<script src="/js/scrip.js"></script>

<table class="table display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>NIT</th>
        <th>NOMBRE</th>
        <th>AREA</th>
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
                       Acidez_id                    ="{{ $lote->acidez_id }}"
                       Aroma_id                     ="{{ $lote->aroma_id }}"
                       Sabor_id                     ="{{ $lote->sabor_id }}"
                       Tipo_beneficio_id            ="{{ $lote->tipo_beneficio_id }}"
                       Tipo_secado_id               ="{{ $lote->tipo_secado_id }}"
                       Cantidad_arboles_variedad1   ="{{ $lote->cantidad_arboles_variedad1 }}"
                       Cantidad_arboles_variedad2   ="{{ $lote->cantidad_arboles_variedad2 }}"
                       Cantidad_arboles_variedad3   ="{{ $lote->cantidad_arboles_variedad3 }}"
                       Nombre                       ="{{ $lote->nombre }}"
                       Area                         ="{{ $lote->area }}"
                       perfil                       ="{{ $lote->perfil }}"
                       <?php
                       if($lote->notas_variedad1 == '') { } else { ?> notas_variedad1 = "{{ $lote->notas_variedad1 }}" <?php }
                       if($lote->notas_variedad2 == '') { } else { ?> notas_variedad2 = "{{ $lote->notas_variedad2 }}" <?php }
                       if($lote->notas_variedad3 == '') { } else { ?> notas_variedad3 = "{{ $lote->notas_variedad3 }}" <?php }
                       ?>
                        >
                <input type="button" value="Eliminar" class="btn_eliminar_lote
                                btn btn-danger btn-sm"
                                id_lote = "{{ $lote->id }}"
                                perfil  = "{{ $lote->perfil }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
