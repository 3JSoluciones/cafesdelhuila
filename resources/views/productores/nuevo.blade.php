@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Productores</li>
            </ol>
        </div>
    </div>

    <form>
        <meta name="csrf-token" content="{{ csrf_token() }}">

   <div id="contenedor_registro_product" style="display: none">

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required="required"
                       placeholder="Ingrese el Nombre" style="width: 100%">
                <input type="hidden" id="id_prod" name="id_prod">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required="required"
                       placeholder="Ingrese el telefono" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Organizacion</label>
                <select name="organizacion_id" id="organizacion_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($organizaciones as $organizacion)
                        <option value="{{ $organizacion->id }}">{{ $organizacion->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Correo Electronico</label>
                <input type="email" class="form-control" id="email" name="email" required="required"
                       placeholder="ejemplo@outlook.com" style="width: 100%">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-prod">
            <input type="button" value="Agregar Productor" class="btn btn-primary btn-sm"
                    id="btn-agregar-productores" accion="1">
        </div>
    </div>

    </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Productor"
                       class="btn_agregar_productores btn btn-primary btn-sm">
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_prod" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>NOMBRE</th>
                        <th>TELEFONO</th>
                        <th>EMAIL</th>
                        <th>ORGANIZACION</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productores as $productor)
                        <tr>
                            <td>{{ $productor->id }}</td>
                            <td>{{ $productor->nombre }}</td>
                            <td>{{ $productor->telefono }}</td>
                            <td>{{ $productor->email }}</td>
                            <td>{{ $productor->organizacion->nombre }}</td>
                            <td>{{ $productor->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_prod
                                btn btn-primary btn-sm"
                                       id_prod="{{ $productor->id }}"
                                       nombre_prod="{{ $productor->nombre }}"
                                       org_prod="{{ $productor->organizacion->id }}"
                                       tel_prod="{{ $productor->telefono }}"
                                       ema_prod="{{ $productor->email }}">
                                <input type="button" value="Eliminar" class="btn_eliminar_prod
                                btn btn-danger btn-sm" id_prod="{{ $productor->id }}">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </form>

    @section('page-js-code')

    <script type="application/javascript">

        //Establecer tabla con jquery table
        $('#tabla_prod').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //animacion del contenedor de registro
        $(".btn_agregar_productores").click(function () {
            $(".btn_agregar_productores").slideUp('slow');
            $("#contenedor_registro_product").slideDown('slow');
        });

        //btn agregar y actualizar
        $("#btn-agregar-productores").click(function(){

            var Organizacion_id     = $("#organizacion_id").val();
            var nombre              = $("#nombre").val();
            var Telefono            = $("#telefono").val();
            var Email               = $("#email").val();
            var id                  = $("#id_prod").val();

            if($("#btn-agregar-productores").attr('accion') == 1) {

                //btn agregar
                $.ajax({
                    url: 'http://cafesdelhuila.com/productores',
                    data:{
                        Organizacion_id:Organizacion_id,
                        nombre:nombre,
                        Telefono:Telefono,
                        Email:Email,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    type:'POST',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/productores/create";
                    }
                });

            } else {

                //btn actualizar
                $.ajax({
                    url: 'http://cafesdelhuila.com/productores/' + id + '',
                    data:{
                        id:id,
                        Organizacion_id:Organizacion_id,
                        nombre:nombre,
                        Telefono:Telefono,
                        Email:Email,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    type:'PUT',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/productores/create";
                    }
                });

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_prod', function () {

            $(".btn_agregar_productores").slideUp('slow');
            $("#contenedor_registro_product").slideDown('slow');
            $("#btn-agregar-productores").val('Actualizar Productor');
            $("#btn-agregar-productores").attr('accion','2');

            $("#id_prod")           .val($(this).attr('id_prod'));
            $("#nombre")            .val($(this).attr('nombre_prod'));
            $("#organizacion_id")   .val($(this).attr('org_prod'));
            $("#telefono")          .val($(this).attr('tel_prod'));
            $("#email")             .val($(this).attr('ema_prod'));

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_prod', function () {

            $("#id_prod").val($(this).attr('id_prod'));
            toastr.error("¿Esta seguro que desea eliminar el productor?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","PRODUCTORES");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_prod").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/productores/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    self.location="http://cafesdelhuila.com/productores/create";
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-prod', function () {

            $(".btn_agregar_productores").slideDown('slow');
            $("#contenedor_registro_product").slideUp('slow');
            $("#btn-agregar-productores").val('Agregar Productor');
            $("#btn-agregar-productores").attr('accion','1');
            $("#id_prod")           .val('');
            $("#nombre")            .val('');
            $("#organizacion_id")   .val('');
            $("#telefono")          .val('');
            $("#email")             .val('');

        });

    </script>
    @stop

@stop