@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li class="active" id="proceso_activo">Sabores</li>
            </ol>
        </div>
    </div>
    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">

   <div id="contenedor_registro_sabor" style="display: none">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text" class="k-textbox" id="nombre" name="nombre"
                       validationMessage="El campo {0} es obligatorio" required
                       placeholder="Ingrese el Nombre" style="width: 100%">
                <input type="hidden" id="id_sabor" name="id_sabor">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-sabor">
            <input type="button" value="Agregar Sabor" accion="1"
                   class="btn btn-primary btn-sm" id="btn-agregar-sabores">
        </div>
    </div>

    </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Sabor"
                       class="btn_agregar_sabores btn btn-primary btn-sm" >
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <hr>
                <div id="contenedor_listado_sabores" ></div>
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
            $.get("{{ URL('http://cafesdelhuila.com/sabores/listado') }}",
                    function (data) {
                        $('#contenedor_listado_sabores').hide().html(data).slideDown('slow');
                        $('.contenedor_carga').slideUp('slow');
                    }
            );
        };

        //animacion del contenedor de registro
        $(".btn_agregar_sabores").click(function () {
            $(".btn_agregar_sabores").slideUp('slow');
            $("#contenedor_registro_sabor").slideDown('slow');
            $(".btn_actualizar_sabor").attr('disabled','true');
            $(".btn_eliminar_sabor").attr('disabled','true');
        });

        //limpiar capos
        function limpiar() {
            $("#nombre")            .val('');
            $("#id_sabor")           .val('');
        };

        //btn agregar y actualizar
        $("#btn-agregar-sabores").click(function(){

            var nombre  = $("#nombre").val();
            var id      = $("#id_sabor").val();

            if($("#btn-agregar-sabores").attr('accion') == 1) {

                var validator = $(".formValidation").kendoValidator().data("kendoValidator");
                if (validator.validate()) {
                    //btn agregar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/sabores',
                        data: {
                            nombre: nombre,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            toastr.info("Registro de " + nombre + " exitoso.", "SABORES");
                            listado();
                            limpiar();
                            $(".btn_agregar_sabores").slideDown('slow');
                            $("#contenedor_registro_sabor").slideUp('slow');
                        }
                    });
                }

            } else {

                var validator = $(".formValidation").kendoValidator().data("kendoValidator");
                if (validator.validate()) {
                    //btn actualizar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/sabores/' + id + '',
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
                            toastr.info("Actualizacion de " + nombre + " exitosa.", "SABORES");
                            listado();
                            limpiar();
                            $("#btn-agregar-sabores").val('Agregar Sabor');
                            $("#btn-agregar-sabores").attr('accion','1');
                            $(".btn_agregar_sabores").slideDown('slow');
                            $("#contenedor_registro_sabor").slideUp('slow');
                        }
                    });
                }

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_sabor', function () {

            $(".btn_agregar_sabores").slideUp('slow');
            $("#contenedor_registro_sabor").slideDown('slow');
            $(".btn_actualizar_sabor").attr('disabled','true');
            $(".btn_eliminar_sabor").attr('disabled','true');
            $("#btn-agregar-sabores").val('Actualizar Sabor');
            $("#btn-agregar-sabores").attr('accion','2');
            $("#id_sabor").val($(this).attr('id_sabor'));
            $("#nombre").val($(this).attr('nombre_sabor'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_sabor', function () {

            $("#id_sabor").val($(this).attr('id_sabor'));
            toastr.error("¿Esta seguro que desea eliminar el sabor?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","SABORES");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_sabor").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/sabores/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    toastr.info("Eliminacion exitosa.", "SABORES");
                    listado();
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-sabor', function () {

            $(".btn_agregar_sabores").slideDown('slow');
            $("#contenedor_registro_sabor").slideUp('slow');
            $(".btn_actualizar_sabor").attr('disabled',false);
            $(".btn_eliminar_sabor").attr('disabled',false);
            $("#btn-agregar-sabores").val('Agregar Sabor');
            $("#btn-agregar-sabores").attr('accion','1');
            limpiar();

        });

    </script>
@stop

@stop