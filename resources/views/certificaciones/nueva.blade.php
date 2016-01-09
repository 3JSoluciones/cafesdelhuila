@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Certificaciones</li>
            </ol>
        </div>
    </div>

    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">

   <div id="contenedor_registro_certifi" style="display: none">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text"  class="k-textbox" id="nombre" name="nombre" required="required"
                       placeholder="Ingrese el Nombre" style="width: 100%" required validationMessage="El campo {0} es obligatorio">
                <input type="hidden" id="id_certif" name="id_certif">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-certif">
            <input type="button" value="Agregar Certificacion" accion="1"
                   class="btn btn-primary btn-sm" id="btn-agregar-certificacion">
        </div>
    </div>

    </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Certificacion"
                       class="btn_agregar_certificacion btn btn-primary btn-sm">
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_certif" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>NOMBRE</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($certificaciones as $certificacione)
                        <tr>
                            <td>{{ $certificacione->id }}</td>
                            <td>{{ $certificacione->nombre }}</td>
                            <td>{{ $certificacione->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_certif
                                btn btn-primary btn-sm" id_certif="{{ $certificacione->id }}" nombre_certif="{{ $certificacione->nombre }}">
                                <input type="button" value="Eliminar" class="btn_eliminar_certif
                                btn btn-danger btn-sm" id_certif="{{ $certificacione->id }}">
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
        $('#tabla_certif').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //animacion del contenedor de registro
        $(".btn_agregar_certificacion").click(function () {
            $(".btn_agregar_certificacion").slideUp('slow');
            $("#contenedor_registro_certifi").slideDown('slow');
            $(".btn_actualizar_certif").attr('disabled','true');
            $(".btn_eliminar_certif").attr('disabled','true');
        });

        //btn agregar y actualizar
        $("#btn-agregar-certificacion").click(function(){

            var nombre = $("#nombre").val();
            var id      = $("#id_certif").val();

            if($("#btn-agregar-certificacion").attr('accion') == 1) {

                if (validator.validate()) {
                    $.ajax({
                        url: 'http://cafesdelhuila.com/certificaciones',
                        data: {
                            nombre: nombre,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            self.location = "http://cafesdelhuila.com/certificaciones/create";
                        }
                    });
                }

            } else {

                if (validator.validate()) {
                    $.ajax({
                        url: 'http://cafesdelhuila.com/certificaciones/' + id + '',
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
                            self.location = "http://cafesdelhuila.com/certificaciones/create";
                        }
                    });
                }

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_certif', function () {

            $(".btn_actualizar_certif").attr('disabled','true');
            $(".btn_eliminar_certif").attr('disabled','true');
            $(".btn_agregar_certificacion").slideUp('slow');
            $("#contenedor_registro_certifi").slideDown('slow');
            $("#btn-agregar-certificacion").val('Actualizar certificacion');
            $("#btn-agregar-certificacion").attr('accion','2');
            $("#id_certif").val($(this).attr('id_certif'));
            $("#nombre").val($(this).attr('nombre_certif'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_certif', function () {

            $("#id_certif").val($(this).attr('id_certif'));
            toastr.error("¿Esta seguro que desea eliminar la certificacion?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","CERTIFICACIONES");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_certif").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/certificaciones/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    self.location="http://cafesdelhuila.com/certificaciones/create";
                }
            });

        });

        //cancelar actualizar btn
        $(document).on('click','#btn-cancelar-certif', function () {

            $(".btn_actualizar_certif").attr('disabled',false);
            $(".btn_eliminar_certif").attr('disabled',false);
            $(".btn_agregar_certificacion").slideDown('slow');
            $("#contenedor_registro_certifi").slideUp('slow');
            $("#btn-agregar-certificacion").val('Agregar certificacion');
            $("#btn-agregar-certificacion").attr('accion','1');
            $("#nombre").val('');

        });



    </script>
@stop

@stop