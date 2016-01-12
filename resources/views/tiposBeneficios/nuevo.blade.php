@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Tipo de Beneficios</li>
            </ol>
        </div>
    </div>
    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">

   <div id="contenedor_registro_tipoBenef" style="display: none">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text" class="k-textbox" id="nombre" name="nombre"
                       required validationMessage="El campo {0} es obligatorio"
                       placeholder="Ingrese el Nombre" style="width: 100%">
                <input type="hidden" id="id_tipoBene" name="id_tipoBene">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-tipoBene">
            <input type="button" value="Agregar Nuevo Tipo" class="btn btn-primary btn-sm"
                    id="btn-agregar-tipoBeneficio" accion="1">
        </div>
    </div>

    </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Nuevo Tipo"
                       class="btn_agregar_tipoBeneficio btn btn-primary btn-sm">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <hr>
                <div id="contenedor_listado_tipoBeneficio" ></div>
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
            $.get("{{ URL('http://cafesdelhuila.com/tiposBeneficios/listado') }}",
                    function (data) {
                        $('#contenedor_listado_tipoBeneficio').hide().html(data).slideDown('slow');
                        $('.contenedor_carga').slideUp('slow');
                    }
            );
        };

        //animacion del contenedor de registro
        $(".btn_agregar_tipoBeneficio").click(function () {
            $(".btn_agregar_tipoBeneficio").slideUp('slow');
            $("#contenedor_registro_tipoBenef").slideDown('slow');
            $(".btn_actualizar_tipoBene").attr('disabled','true');
            $(".btn_eliminar_tipoBene").attr('disabled','true');
        });

        //limpiar capos
        function limpiar() {
            $("#nombre")            .val('');
            $("#id_tipoBene")       .val('');
        };

        //btn agregar y actualizar
        $("#btn-agregar-tipoBeneficio").click(function(){

            var nombre  = $("#nombre").val();
            var id      = $("#id_tipoBene").val();

            if($("#btn-agregar-tipoBeneficio").attr('accion') == 1) {

                if (validator.validate()) {
                    //btn agregar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/tiposBeneficios',
                        data: {
                            nombre: nombre,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            toastr.info("Registro de " + nombre + " exitoso.", "TIPOS DE BENEFICIOS");
                            listado();
                            limpiar();
                            $(".btn_agregar_tipoBeneficio").slideDown('slow');
                            $("#contenedor_registro_tipoBenef").slideUp('slow');
                        }
                    });
                }

            } else {

                if (validator.validate()) {
                    //btn actualizar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/tiposBeneficios/' + id + '',
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
                            $("#btn-agregar-tipoBeneficio").val('Agregar tipo beneficio');
                            $("#btn-agregar-tipoBeneficio").attr('accion','1');
                            $(".btn_agregar_tipoBeneficio").slideDown('slow');
                            $("#contenedor_registro_tipoBenef").slideUp('slow');
                        }
                    });
                }

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_tipoBene', function () {

            $(".btn_agregar_tipoBeneficio").slideUp('slow');
            $("#contenedor_registro_tipoBenef").slideDown('slow');
            $(".btn_actualizar_tipoBene").attr('disabled','true');
            $(".btn_eliminar_tipoBene").attr('disabled','true');
            $("#btn-agregar-tipoBeneficio").val('Actualizar tipo beneficio');
            $("#btn-agregar-tipoBeneficio").attr('accion','2');
            $("#id_tipoBene").val($(this).attr('id_tipoBene'));
            $("#nombre").val($(this).attr('nombre_tipoBene'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_tipoBene', function () {

            $("#id_tipoBene").val($(this).attr('id_tipoBene'));
            toastr.error("¿Esta seguro que desea eliminar el tipo de beneficio?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","TIPOS DE BENEFICIOS");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_tipoBene").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/tiposBeneficios/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    toastr.info("Eliminacion exitosa.", "TIPOS DE BENEFICIOS");
                    listado();
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-tipoBene', function () {

            $(".btn_agregar_tipoBeneficio").slideDown('slow');
            $("#contenedor_registro_tipoBenef").slideUp('slow');
            $(".btn_actualizar_tipoBene").attr('disabled',false);
            $(".btn_eliminar_tipoBene").attr('disabled',false);
            $("#btn-agregar-tipoBeneficio").val('Agregar tipo beneficio');
            $("#btn-agregar-tipoBeneficio").attr('accion','1');
            limpiar();

        });


    </script>
@stop

@stop