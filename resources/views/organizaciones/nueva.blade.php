@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li class="active" id="proceso_activo">Organizaciones</li>
            </ol>
        </div>
    </div>

    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <div id="contenedor_registro_organiz" style="display: none">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text" class="k-textbox" id="nombre" name="nombre"
                       required validationMessage="El campo Cantidad de arboles es obligatorio"
                       placeholder="Ingrese el Nombre" style="width: 100%">
                <input type="hidden" id="id_organiz" name="id_organiz">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-organiz">
            <input type="button" value="Agregar Organizacion" accion="1"
                   class="btn btn-primary btn-sm" id="btn-agregar-organizacion">
        </div>
    </div>

    </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Organizacion"
                       class="btn_agregar_organizacion btn btn-primary btn-sm" >
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <hr>
                <div id="contenedor_listado_organizaciones" ></div>
            </div>
        </div>

    </form>

    @section('page-js-code')

    <script type="application/javascript">

        $(document).ready(function () {
            listado();
        });

        //listado
        function listado() {
            $('.contenedor_carga').slideDown('slow');
            $.get("{{ URL('http://cafesdelhuila.com/organizaciones/listado') }}",
                    function (data) {
                        $('#contenedor_listado_organizaciones').hide().html(data).slideDown('slow');
                        $('.contenedor_carga').slideUp('slow');
                    }
            );
        };

        //animacion del contenedor de registro
        $(".btn_agregar_organizacion").click(function () {
            $(".btn_agregar_organizacion").slideUp('slow');
            $("#contenedor_registro_organiz").slideDown('slow');
            $(".btn_actualizar_organiz").attr('disabled','true');
            $(".btn_eliminar_organiz").attr('disabled','true');
        });

        //limpiar capos
        function limpiar() {
            $("#nombre").val('');
            $("#id_organiz").val('');
        };

        //btn agregar y actualizar
        $("#btn-agregar-organizacion").click(function(){

            var nombre  = $("#nombre").val();
            var id      = $("#id_organiz").val();

            if($("#btn-agregar-organizacion").attr('accion') == 1) {

                if (validator.validate()) {
                    //btn agregar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/organizaciones',
                        data: {
                            nombre: nombre,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            toastr.info("Registro de " + nombre + " exitoso.", "ORGANIZACIONES");
                            listado();
                            limpiar();
                            $(".btn_agregar_organizacion").slideDown('slow');
                            $("#contenedor_registro_organiz").slideUp('slow');
                        }
                    });
                }

            } else {

                if (validator.validate()) {
                    //btn actualizar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/organizaciones/' + id + '',
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
                            toastr.info("Actualizacion de " + nombre + " exitosa.", "ORGANIZACIONES");
                            listado();
                            limpiar();
                            $("#btn-agregar-organizacion").val('Agregar organizacion');
                            $("#btn-agregar-organizacion").attr('accion','1');
                            $(".btn_agregar_organizacion").slideDown('slow');
                            $("#contenedor_registro_organiz").slideUp('slow');
                        }
                    });
                }

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_organiz', function () {

            $(".btn_agregar_organizacion").slideUp('slow');
            $("#contenedor_registro_organiz").slideDown('slow');
            $(".btn_actualizar_organiz").attr('disabled','true');
            $(".btn_eliminar_organiz").attr('disabled','true');
            $("#btn-agregar-organizacion").val('Actualizar organizacion');
            $("#btn-agregar-organizacion").attr('accion','2');
            $("#id_organiz").val($(this).attr('id_organiz'));
            $("#nombre").val($(this).attr('nombre_organiz'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_organiz', function () {

            $("#id_organiz").val($(this).attr('id_organiz'));
            toastr.error("¿Esta seguro que desea eliminar la organizacion?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","ORGANIZACIONES");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_organiz").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/organizaciones/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    toastr.info("Eliminacion exitosa.", "ORGANIZACIONES");
                    listado();
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-organiz', function () {

            $(".btn_agregar_organizacion").slideDown('slow');
            $("#contenedor_registro_organiz").slideUp('slow');
            $(".btn_actualizar_organiz").attr('disabled',false);
            $(".btn_eliminar_organiz").attr('disabled',false);
            $("#btn-agregar-organizacion").val('Agregar organizacion');
            $("#btn-agregar-organizacion").attr('accion','1');
            limpiar();

        });


    </script>
    @stop

@stop