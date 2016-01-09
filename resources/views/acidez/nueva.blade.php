@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Acidez</li>
            </ol>
        </div>
    </div>

    <form id="formularioAcidez" class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <div id="contenedor_registro_acidez" style="display: none">



        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="nombre" class="required">Nombre</label>
                        <input type="text" class="k-textbox" id="nombre" name="nombre" required validationMessage="El campo {0} es obligatorio"
                               placeholder="Ingrese el Nombre" style="width: 100%">

                    <input type="hidden" id="id_acidez" name="id_acidez">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                       id="btn-cancelar-acidez">
                <input type="button" value="Agregar Acidez" class=" btn btn-primary btn-sm"
                       id="btn-agregar-acidez" accion="1">
            </div>
        </div>

    </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Acidez" class="btn_agregar_acidez btn btn-primary btn-sm">
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_acidez" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
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

            </div>
        </div>

    </form>

@section('page-js-code')

    <script type="application/javascript">

        //Establecer tabla con jquery table
        $('#tabla_acidez').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //animacion del contenedor de registro
        $(".btn_agregar_acidez").click(function () {
            $(".btn_agregar_acidez").slideUp('slow');
            $("#contenedor_registro_acidez").slideDown('slow');
            $(".btn_actualizar_acidez").attr('disabled','true');
            $(".btn_eliminar_acidez").attr('disabled','true');
        });

        //btn agregar y actualizar
        $("#btn-agregar-acidez").click(function(){

            var nombre  = $("#nombre").val();
            var id      = $("#id_acidez").val();

            if($("#btn-agregar-acidez").attr('accion') == 1) {

                if (validator.validate()) {
                    //btn agregar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/acidez',
                        data:{
                            nombre:nombre,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType:'json',
                        type:'POST',
                        success:function(data) {
                            self.location="http://cafesdelhuila.com/acidez/create";
                        }
                    });

                }


            } else {

                if (validator.validate()) {
                    //btn actualizar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/acidez/' + id + '',
                        data: {
                            id: id,
                            nombre: nombre,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        type: 'PUT',
                        success: function (data) {
                            self.location = "http://cafesdelhuila.com/acidez/create";
                        }
                    });
                }

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_acidez', function () {

            $(".btn_agregar_acidez").slideUp('slow');
            $("#contenedor_registro_acidez").slideDown('slow');
            $(".btn_actualizar_acidez").attr('disabled','true');
            $(".btn_eliminar_acidez").attr('disabled','true');

            $("#btn-agregar-acidez").val('Actualizar Acidez');
            $("#btn-agregar-acidez").attr('accion','2');
            $("#btn-cancelar-acidez").slideDown('slow');
            $("#id_acidez").val($(this).attr('id_acidez'));
            $("#nombre").val($(this).attr('nombre_acidez'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_acidez', function () {

            $("#id_acidez").val($(this).attr('id_acidez'));
            toastr.error("¿Esta seguro que desea eliminar la acidez?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","ACIDEZ");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_acidez").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/acidez/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    self.location="http://cafesdelhuila.com/acidez/create";
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-acidez', function () {

            $(".btn_agregar_acidez").slideDown('slow');
            $("#contenedor_registro_acidez").slideUp('slow');
            $(".btn_actualizar_acidez").attr('disabled',false);
            $(".btn_eliminar_acidez").attr('disabled',false);

            $("#btn-agregar-acidez").val('Agregar Acidez');
            $("#btn-agregar-acidez").attr('accion','1');
            $("#nombre").val('');

        });


    </script>
@stop

@stop
