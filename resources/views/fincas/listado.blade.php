<script src="/js/scrip.js"></script>
@if($fincas->count() == 0)
    <div class="text-center">
        <h4><b>Sin Datos Registrados</b></h4>
    </div>
@else
    <table class="table display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>FINCA</th>
            <th>DEPARTAMENTO</th>
            <th>MUNICIPIO</th>
            <th>CORRE</th>
            <th>VEREDA</th>
            <th>CREADO</th>
            <th>ACCION</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fincas as $finca)
            <tr>
                <td>{{ $finca->id }}</td>
                <td>{{ $finca->finca }}</td>
                <td>@if(isset($finca->departamento->nombre)) {{ $finca->departamento->nombre }} @else Ninguno @endif</td>
                <td>@if(isset($finca->municipio->nombre)){{ $finca->municipio->nombre }} @else Ninguno @endif</td>
                <td>{{ $finca->corregimiento }}</td>
                <td>{{ $finca->vereda }}</td>
                <td>{{ $finca->created_at }}</td>
                <td>
                    <input type="button" value="Actualizar" class="btn_actualizar_finca
                                btn btn-primary btn-sm"
                           id                   ="{{ $finca->id }}"
                           Productor_id         ="{{ $finca->productor->id }}"
                           Departamento_id      ="{{ $finca->departamento_id }}"
                           Municipio_id         ="{{ $finca->municipio_id }}"
                           Corregimiento        ="{{ $finca->corregimiento }}"
                           Vereda               ="{{ $finca->vereda }}"
                           Finca                ="{{ $finca->finca }}"
                           Longitud             ="{{ $finca->longitud }}"
                           Latitud              ="{{ $finca->latitud }}"
                           Altitud              ="{{ $finca->altitud }}"
                           cosecha_comienza     ="{{ $finca->cosecha_comienza }}"
                           cosecha_termina      ="{{ $finca->cosecha_termina }}"
                           mitaca_comienza      ="{{ $finca->mitaca_comienza }}"
                           mitaca_termina       ="{{ $finca->mitaca_termina }}">
                    <input type="button" value="Eliminar" class="btn_eliminar_finca
                                btn btn-danger btn-sm" id_finca="{{ $finca->id }}">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
