<script src="/js/scrip.js"></script>
@if($certificacionesProductores->count() == 0)
    <div class="text-center">
        <h4><b>Sin Datos Registrados</b></h4>
    </div>
@else
<table class="table display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>CERTIFICACION</th>
        <th>CREADO</th>
        <th>ACCION</th>
    </tr>
    </thead>
    <tbody>
    @foreach($certificacionesProductores as $certificacionProductor)
        <tr>
            <td>{{ $certificacionProductor->id }}</td>
            <td>{{ $certificacionProductor->certificacion->nombre }}</td>
            <td>{{ $certificacionProductor->created_at }}</td>
            <td>
                <input type="button" value="Eliminar" class="btn_eliminar_certiProd
                                btn btn-danger btn-sm" id_certiProd="{{ $certificacionProductor->id }}">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif
