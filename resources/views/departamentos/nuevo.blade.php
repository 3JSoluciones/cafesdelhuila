@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Departamentos</li>
            </ol>
        </div>
    </div>

    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div id="contenedor_registro_depart" style="display: none">

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="input">Nombre</label>
                    <input type="text" class="k-textbox" id="nombre" name="nombre"
                           required validationMessage="El campo {0} es obligatorio"
                           placeholder="Ingrese el Nombre" style="width: 100%">
                    <input type="hidden" id="id_depart" name="id_depart">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                       id="btn-cancelar-departamento">
                <input type="button" value="Agregar Departamento" class="btn btn-primary btn-sm"
                       id="btn-agregar-departamento" accion="1">
            </div>
        </div>

        </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Departamento"
                       class="btn_agregar_departamento btn btn-primary btn-sm" >
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <hr>
                <div id="contenedor_listado_departamento" ></div>
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
            $.get("{{ URL('http://cafesdelhuila.com/departamentos/listado') }}",
                    function (data) {
                        $('#contenedor_listado_departamento').hide().html(data).slideDown('slow');
                        $('.contenedor_carga').slideUp('slow');
                    }
            );
        };

        //animacion del contenedor de registro
        $(".btn_agregar_departamento").click(function () {
            $(".btn_agregar_departamento").slideUp('slow');
            $("#contenedor_registro_depart").slideDown('slow');
            $(".btn_actualizar_departamento").attr('disabled','true');
            $(".btn_eliminar_departamento").attr('disabled','true');
        });

        //limpiar capos
        function limpiar() {
            $("#nombre").val('');
            $("#id_depart").val('');
        };

        //btn agregar y actualizar
        $("#btn-agregar-departamento").click(function(){

            var nombre  = $("#nombre").val();
            var id      = $("#id_depart").val();

            if($("#btn-agregar-departamento").attr('accion') == 1) {

                if (validator.validate()) {
                    //btn agregar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/departamentos',
                        data: {
                            nombre: nombre,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            toastr.info("Registro de " + nombre + " exitoso.", "DEPARTAMENTOS");
                            listado();
                            limpiar();
                            $(".btn_agregar_departamento").slideDown('slow');
                            $("#contenedor_registro_depart").slideUp('slow');
                        }
                    });
                }

            } else {

                if (validator.validate()) {
                    //btn actualizar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/departamentos/' + id + '',
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
                            toastr.info("Actualizacion de " + nombre + " exitosa.", "DEPARTAMENTOS");
                            listado();
                            limpiar();
                            $("#btn-agregar-departamento").val('Agregar departamento');
                            $("#btn-agregar-departamento").attr('accion','1');
                            $(".btn_agregar_departamento").slideDown('slow');
                            $("#contenedor_registro_depart").slideUp('slow');
                        }
                    });
                }

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_departamento', function () {

            $(".btn_agregar_departamento").slideUp('slow');
            $("#contenedor_registro_depart").slideDown('slow');
            $(".btn_actualizar_departamento").attr('disabled','true');
            $(".btn_eliminar_departamento").attr('disabled','true');
            $("#btn-agregar-departamento").val('Actualizar departamento');
            $("#btn-agregar-departamento").attr('accion','2');
            $("#id_depart").val($(this).attr('id_depart'));
            $("#nombre").val($(this).attr('nombre_depart'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_departamento', function () {

            $("#id_depart").val($(this).attr('id_depart'));
            toastr.error("¿Esta seguro que desea eliminar el departamento?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","DEPARTAMENTOS");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_depart").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/departamentos/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    toastr.info("Eliminacion exitosa.", "DEPARTAMENTOS");
                    listado();
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-departamento', function () {

            $(".btn_agregar_departamento").slideDown('slow');
            $("#contenedor_registro_depart").slideUp('slow');
            $(".btn_actualizar_departamento").attr('disabled',false);
            $(".btn_eliminar_departamento").attr('disabled',false);
            $("#btn-agregar-departamento").val('Agregar departamento');
            $("#btn-agregar-departamento").attr('accion','1');
            limpiar();

        });


    </script>
    @stop

@stop