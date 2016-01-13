@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
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
                        <input type="text" class="k-textbox" id="nombre" name="nombre"
                               required validationMessage="El campo {0} es obligatorio"
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

        <div class="row">
            <div class="col-lg-12">
                <hr>
                <div id="contenedor_listado_acidez" ></div>
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
            $.get("{{ URL('http://cafesdelhuila.com/acidez/listado') }}",
                   function (data) {
                        $('#contenedor_listado_acidez').hide().html(data).slideDown('slow');
                        $('.contenedor_carga').slideUp('slow');
                   }
            );
        };

        //animacion del contenedor de registro
        $(".btn_agregar_acidez").click(function () {
            $(".btn_agregar_acidez").slideUp('slow');
            $("#contenedor_registro_acidez").slideDown('slow');
            $(".btn_actualizar_acidez").attr('disabled','true');
            $(".btn_eliminar_acidez").attr('disabled','true');
        });

        //limpiar capos
        function limpiar() {
            $("#nombre").val('');
            $("#id_acidez").val('');
        };

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
                            toastr.info("Registro de " + nombre + " exitoso.", "ACIDEZ");
                            listado();
                            limpiar();
                            $(".btn_agregar_acidez").slideDown('slow');
                            $("#contenedor_registro_acidez").slideUp('slow');
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
                            toastr.info("Actualizacion de " + nombre + " exitosa.", "ACIDEZ");
                            listado();
                            limpiar();
                            $("#btn-agregar-acidez").val('Agregar Acidez');
                            $("#btn-agregar-acidez").attr('accion','1');
                            $(".btn_agregar_acidez").slideDown('slow');
                            $("#contenedor_registro_acidez").slideUp('slow');
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
                    toastr.info("Eliminacion exitosa.", "ACIDEZ");
                    listado();
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
            limpiar();

        });


    </script>
@stop

@stop
