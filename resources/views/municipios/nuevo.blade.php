@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li class="active" id="proceso_activo">Municipios</li>
            </ol>
        </div>
    </div>

    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">

   <div id="contenedor_registro_munici" style="display: none">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text" class="k-textbox" id="nombre" name="nombre"
                       required validationMessage="El campo {0} es obligatorio"
                       placeholder="Ingrese el Nombre" style="width: 100%">
                <input type="hidden" id="id_municipio" name="id_municipio">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-municipio">
            <input type="button" value="Agregar Municipio" accion="1"
                   class="btn btn-primary btn-sm" id="btn-agregar-municipio">
        </div>
    </div>

    </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Municipio"
                       class="btn_agregar_municipio btn btn-primary btn-sm" >
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <hr>
                <div id="contenedor_listado_municipios" ></div>
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
                $.get("{{ URL('http://cafesdelhuila.com/municipios/listado') }}",
                        function (data) {
                            $('#contenedor_listado_municipios').hide().html(data).slideDown('slow');
                            $('.contenedor_carga').slideUp('slow');
                        }
                );
            };

            //limpiar capos
            function limpiar() {
                $("#nombre").val('');
                $("#id_municipio").val('');
            };

            //animacion del contenedor de registro
            $(".btn_agregar_municipio").click(function () {
                $(".btn_agregar_municipio").slideUp('slow');
                $("#contenedor_registro_munici").slideDown('slow');
                $(".btn_actualizar_municipio").attr('disabled','true');
                $(".btn_eliminar_municipio").attr('disabled','true');
            });

            //btn agregar y actualizar
            $("#btn-agregar-municipio").click(function(){

                var nombre  = $("#nombre").val();
                var id      = $("#id_municipio").val();

                if($("#btn-agregar-municipio").attr('accion') == 1) {

                    var validator = $(".formValidation").kendoValidator().data("kendoValidator");
                    if (validator.validate()) {
                        //btn agregar
                        $.ajax({
                            url: 'http://cafesdelhuila.com/municipios',
                            data: {
                                nombre: nombre,
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            type: 'POST',
                            success: function (data) {
                                toastr.info("Registro de " + nombre + " exitoso.", "MUNICIPIOS");
                                listado();
                                limpiar();
                                $(".btn_agregar_municipio").slideDown('slow');
                                $("#contenedor_registro_munici").slideUp('slow');
                            }
                        });
                    }

                } else {

                    var validator = $(".formValidation").kendoValidator().data("kendoValidator");
                    if (validator.validate()) {
                        //btn actualizar
                        $.ajax({
                            url: 'http://cafesdelhuila.com/municipios/' + id + '',
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
                                toastr.info("Actualizacion de " + nombre + " exitosa.", "MUNICIPIOS");
                                listado();
                                limpiar();
                                $("#btn-agregar-municipio").val('Agregar municipio');
                                $("#btn-agregar-municipio").attr('accion','1');
                                $(".btn_agregar_municipio").slideDown('slow');
                                $("#contenedor_registro_munici").slideUp('slow');
                            }
                        });
                    }

                }

            });

            //btn actualizar
            $(document).on('click','.btn_actualizar_municipio', function () {

                $(".btn_agregar_municipio").slideUp('slow');
                $("#contenedor_registro_munici").slideDown('slow');
                $(".btn_actualizar_municipio").attr('disabled','true');
                $(".btn_eliminar_municipio").attr('disabled','true');
                $(".current").attr('disabled','true');
                $("#btn-agregar-municipio").val('Actualizar municipio');
                $("#btn-agregar-municipio").attr('accion','2');
                $("#id_municipio").val($(this).attr('id_municipio'));
                $("#nombre").val($(this).attr('nombre_municipio'));
                console.log('actualizando');

            });

            //btn eliminar
            $(document).on('click','.btn_eliminar_municipio', function () {

                $("#id_municipio").val($(this).attr('id_municipio'));
                toastr.error("¿Esta seguro que desea eliminar el municipio?<br>" +
                        "<button class='btn-danger confirmar'>Confirmar eliminar</button>","MUNICIPIOS");

            });

            //confirmar eliminar
            $(document).on('click','.confirmar', function () {

                var id = $("#id_municipio").val();
                $.ajax({
                    url: 'http://cafesdelhuila.com/municipios/' + id + '',
                    data:{
                        id:id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    type:'DELETE',
                    success:function(data) {
                        toastr.info("Eliminacion exitosa.", "MUNICIPIOS");
                        listado();
                    }
                });

            });

            //cancelar actualizar
            $(document).on('click','#btn-cancelar-municipio', function () {

                $(".btn_agregar_municipio").slideDown('slow');
                $("#contenedor_registro_munici").slideUp('slow');
                $(".btn_actualizar_municipio").attr('disabled',false);
                $(".btn_eliminar_municipio").attr('disabled',false);
                $("#btn-agregar-municipio").val('Agregar municipio');
                $("#btn-agregar-municipio").attr('accion','1');
                limpiar();

            });

        </script>

    @stop

@stop