@if($medios->count() == 0)
    <div class="text-center">

    </div>
@else
    <table class="table display" cellspacing="0" width="100%">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <thead>
        <tr>
            <th>NIT</th>
            <th>MEDIO</th>
            <th>NOMBRE</th>
            <th>TAMAÑO</th>
            <th>CREADO</th>
            <th>ACCION</th>
        </tr>
        </thead>
        <tbody>
        @foreach($medios as $medio)

            <tr>
                <td>{{ $medio->id }}</td>
                <td><?php
                if (Storage::exists($medio->nombre)) {
                    $nombre     = $medio->nombre;
                    $tamanio    = Storage::size($medio->nombre);
                    $creado     = $medio->created_at;
                    ?>
                    <img class="img_click" src="http://cafesdelhuila.com/storage/{{$medio->nombre}}" style="width: 50px; height: 50px; border-radius: 50%;">
                    <?php
                } else {
                    $nombre     = 'El medio ha sido eliminado';
                    $tamanio    = 0;
                    $creado     = '0000-00-00 00:00:00';
                    ?>
                    <img class="img_click" src="http://cafesdelhuila.com/storage/naruto.png" style="width: 50px; height: 50px; border-radius: 50%;">
                    <?php
                }
                ?>

                </td>
                <td>{{ $nombre }}</td>
                <td>{{ $tamanio}}(bytes) </td>
                <td>{{ $creado }}</td>
                <td>
                    <input type="button" value="Eliminar" class="btn_eliminar_medio
                                btn btn-danger btn-sm"
                           id_medio="{{ $medio->id }}"
                           medio="{{ $medio->nombre }}">
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endif
<script src="/js/scrip.js"></script>
