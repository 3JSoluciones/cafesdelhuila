@if($medios->count() == 0)
    <div class="text-center">

    </div>
@else

    <style>

    .img_click{
      width:  70px;
      height: 70px;
      box-shadow: 0px 0px 5px black;
    }

    .img_click:hover{
      width:  70px;
      height: 70px;
      box-shadow: 0px 0px 8px blue;
    }

    #tdAlinearConMedio {
      padding-top: 30px;
    }

    </style>

    <table class="table display" cellspacing="0" width="100%">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <thead>
        <tr>
            <th>ID</th>
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
                <td>
                  <a href="/medios/{{ $medio->nombre}}" target="newwindow"
                    data-toggle="tooltip" data-placement="right"
                    title="PRESIONE CLICK PARA VER O DESCARGAR SEGUN SEA EL TIPO DE ARCHIVO">
                    <?php
                    if (Storage::exists($medio->nombre)) {
                        $nombre     = $medio->nombre;
                        $tamanio    = Storage::size($medio->nombre);
                        $creado     = $medio->created_at;
                        $tipo       = $medio->tipo;

                        if($tipo == 'jpg' || $tipo == 'png' || $tipo == 'jpeg') {
                          ?><img class="img_click" src="/medios/{{ $medio->nombre}}"><?php
                        }
                        else if($tipo == 'pdf') {
                          ?><img class="img_click" src="/img/pdf.png"><?php
                        }
                        else if($tipo == 'xls' || $tipo == 'txt' || $tipo == 'ods') {
                          ?><img class="img_click" src="/img/excel.png"><?php
                        }
                        else if($tipo == 'rar' || $tipo == 'zip' || $tipo == 'tar' || $tipo == 'gz') {
                          ?><img class="img_click" src="/img/rar.png"><?php
                        }

                    } else {
                        $nombre     = 'El medio ha sido eliminado';
                        $tamanio    = 0;
                        $creado     = '0000-00-00 00:00:00';
                        ?>
                        <img class="img_click" src="/medios/no_foto.png">
                        <?php
                    }
                    ?>
                  </a>
                </td>
                <td id="tdAlinearConMedio">{{ $nombre }}</td>
                <td id="tdAlinearConMedio">{{ $tamanio}}(bytes) </td>
                <td id="tdAlinearConMedio">{{ $creado }}</td>
                <td id="tdAlinearConMedio">
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
