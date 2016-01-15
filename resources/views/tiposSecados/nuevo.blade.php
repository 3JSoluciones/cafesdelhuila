@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li class="active" id="proceso_activo">Tipo de Secados</li>
            </ol>
        </div>
    </div>

    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">

  <div id="contenedor_registro_tipoSecad" style="display: none">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text" class="k-textbox" id="nombre" name="nombre"
                       required validationMessage="El campo {0} es obligatorio"
                       placeholder="Ingrese el Nombre" style="width: 100%">
                <input type="hidden" id="id_tipoSeca" name="id_tipoSeca">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-tipoSeca">
            <input type="button" value="Agregar Nuevo Tipo" class="btn btn-primary btn-sm"
                    id="btn-agregar-tipoSecados" accion="1">
        </div>
    </div>

    </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Nuevo Tipo"
                       class="btn_agregar_tipoSecados btn btn-primary btn-sm">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <hr>
                <div id="contenedor_listado_tipoSecado" ></div>
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
            $.get("{{ URL('http://cafesdelhuila.com/tiposSecados/listado') }}",
                    function (data) {
                        $('#contenedor_listado_tipoSecado').hide().html(data).slideDown('slow');
                        $('.contenedor_carga').slideUp('slow');
                    }
            );
        };

        //animacion del contenedor de registro
        $(".btn_agregar_tipoSecados").click(function () {
            $(".btn_agregar_tipoSecados").slideUp('slow');
            $("#contenedor_registro_tipoSecad").slideDown('slow');
            $(".btn_actualizar_tipoSeca").attr('disabled','true');
            $(".btn_eliminar_tipoSeca").attr('disabled','true');
        });

        //limpiar capos
        function limpiar() {
            $("#nombre")            .val('');
            $("#id_tipoSeca")       .val('');
        };

        //btn agregar y actualizar
        $("#btn-agregar-tipoSecados").click(function(){

            var nombre  = $("#nombre").val();
            var id      = $("#id_tipoSeca").val();

            if($("#btn-agregar-tipoSecados").attr('accion') == 1) {

                var validator = $(".formValidation").kendoValidator().data("kendoValidator");
                if (validator.validate()) {
                    //btn agregar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/tiposSecados',
                        data: {
                            nombre: nombre,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            toastr.info("Registro de " + nombre + " exitoso.", "TIPOS DE SECADOS");
                            listado();
                            limpiar();
                            $(".btn_agregar_tipoSecados").slideDown('slow');
                            $("#contenedor_registro_tipoSecad").slideUp('slow');
                        }
                    });
                }

            } else {

                var validator = $(".formValidation").kendoValidator().data("kendoValidator");
                if (validator.validate()) {
                    //btn actualizar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/tiposSecados/' + id + '',
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
                            toastr.info("Actualizacion de " + nombre + " exitosa.", "TIPOS DE BENEFICIOS");
                            listado();
                            limpiar();
                            $("#btn-agregar-tipoSecados").val('Agregar Tipo Secado');
                            $("#btn-agregar-tipoSecados").attr('accion','1');
                            $(".btn_agregar_tipoSecados").slideDown('slow');
                            $("#contenedor_registro_tipoSecad").slideUp('slow');
                        }
                    });
                }

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_tipoSeca', function () {

            $(".btn_agregar_tipoSecados").slideUp('slow');
            $("#contenedor_registro_tipoSecad").slideDown('slow');
            $(".btn_actualizar_tipoSeca").attr('disabled','true');
            $(".btn_eliminar_tipoSeca").attr('disabled','true');
            $("#btn-agregar-tipoSecados").val('Actualizar Tipo Secado');
            $("#btn-agregar-tipoSecados").attr('accion','2');
            $("#id_tipoSeca").val($(this).attr('id_tipoSeca'));
            $("#nombre").val($(this).attr('nombre_tipoSeca'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_tipoSeca', function () {

            $("#id_tipoSeca").val($(this).attr('id_tipoSeca'));
            toastr.error("¿Esta seguro que desea eliminar el Tipo de Secado?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","TIPOS DE SECADOS");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_tipoSeca").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/tiposSecados/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    toastr.info("Eliminacion exitosa.", "TIPOS DE SECADOS");
                    listado();
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-tipoSeca', function () {

            $(".btn_agregar_tipoSecados").slideDown('slow');
            $("#contenedor_registro_tipoSecad").slideUp('slow');
            $(".btn_actualizar_tipoSeca").attr('disabled',false);
            $(".btn_eliminar_tipoSeca").attr('disabled',false);
            $("#btn-agregar-tipoSecados").val('Agregar Tipo Secado');
            $("#btn-agregar-tipoSecados").attr('accion','1');
            limpiar();

        });

    </script>
@stop

@stop