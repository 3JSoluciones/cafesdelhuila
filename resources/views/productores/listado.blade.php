<head>
    <script src="/js/scrip.js"></script>
</head>
<body>
@if($productores->count() == 0)
    <div class="text-center">
        <h4><b>Sin Datos Registrados</b></h4>
    </div>
@else
<table class="tabla display" cellspacing="0" width="100%">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <thead>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>TELEFONO</th>
        <th>EMAIL</th>
        <th>ORGANIZACION</th>
        <th>ACCION</th>
    </tr>
    </thead>
    <tbody>
    @foreach($productores as $productor)

        <tr>
          <td>{{ $productor->id }}</td>
          <td><a href="{{ URL::route('productoresPerfil-getPerfil', $productor->id )}}">{{ $productor->nombre }}</a></td>
          <td>{{ $productor->telefono }}</td>
          <td>{{ $productor->email }}</td>
          <td>@if(isset($productor->organizacion->nombre)) {{ $productor->organizacion->nombre }} @else Ninguna @endif</td>
          <td>
              <input type="button" value="Actualizar" class="btn_actualizar_prod
                              btn btn-primary btn-sm"
                     id_prod="{{ $productor->id }}"
                     nombre_prod="{{ $productor->nombre }}"
                     org_prod="{{ $productor->organizacion_id}}"
                     tel_prod="{{ $productor->telefono }}"
                     ema_prod="{{ $productor->email }}"
                     bioPro="{{ $productor->bio }}">
              <input type="button" value="Eliminar" class="btn_eliminar_prod
                              btn btn-danger btn-sm" id_prod="{{ $productor->id }}">
              <input type="hidden" id="id_productorPerfil">
          </td>
        </tr>

    @endforeach
    </tbody>
</table>
@endif


</body>
