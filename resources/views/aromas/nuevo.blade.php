@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li class="active" id="proceso_activo">Aromas</li>
            </ol>
        </div>
    </div>

    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">

   <div id="contenedor_registro_aroma" style="display: none">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text" class="k-textbox" id="nombre" name="nombre" required="required"
                       placeholder="Ingrese el Nombre" style="width: 100%" required validationMessage="El campo {0} es obligatorio">
                <input type="hidden" id="id_aromas" name="id_aromas">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-aromas">
            <input type="button" value="Agregar Aroma" class="btn btn-primary btn-sm"
                    id="btn-agregar-aromas" accion="1">
        </div>
    </div>

   </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Aroma" class="btn_agregar_aromas btn btn-primary btn-sm">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <hr>
                <div id="contenedor_listado_aromas" ></div>
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
            $.get("{{ URL::Route('aromas-getListado') }}",
                   function (data) {
                        $('#contenedor_listado_aromas').hide().html(data).slideDown('slow');
                        $('.contenedor_carga').slideUp('slow');
                   }
            );
        };

        //limpiar capos
        function limpiar() {
            $("#nombre").val('');
            $("#id_aromas").val('');
        };

        //animacion del contenedor de registro
        $(".btn_agregar_aromas").click(function () {
            $(".btn_agregar_aromas").slideUp('slow');
            $("#contenedor_registro_aroma").slideDown('slow');
            $(".btn_actualizar_aromas").attr('disabled','true');
            $(".btn_eliminar_aromas").attr('disabled','true');
        });

        //btn agregar y actualizar
        $("#btn-agregar-aromas").click(function(){


            var nombre  = $("#nombre").val();
            var id      = $("#id_aromas").val();

            if($("#btn-agregar-aromas").attr('accion') == 1) {

                var validator = $(".formValidation").kendoValidator().data("kendoValidator");
                if (validator.validate()) {
                    //btn agregar
                    $.post("{{ URL::route('aromas-postCrear') }}?" + $('.formValidation').serialize(),
                    {
                        nombre:nombre,
                    },
                    function (data) {
                      toastr.info("Registro de " + nombre + " exitoso.", "AROMAS");
                      listado();
                      limpiar();
                      $(".btn_agregar_aromas").slideDown('slow');
                      $("#contenedor_registro_aroma").slideUp('slow');
                    });
                }

            } else {

                var validator = $(".formValidation").kendoValidator().data("kendoValidator");
                if (validator.validate()) {
                    //btn actualizar
                    $.post("{{ URL::route('aromas-postActualizar') }}?" + $('.formValidation').serialize(),
                    {
                      id: id,
                      nombre: nombre,
                    },
                    function (data) {
                      toastr.info("Actualizacion de " + nombre + " exitosa.", "AROMAS");
                      listado();
                      limpiar();
                      $("#btn-agregar-aromas").val('Agregar Aromas');
                      $("#btn-agregar-aromas").attr('accion','1');
                      $(".btn_agregar_aromas").slideDown('slow');
                      $("#contenedor_registro_aroma").slideUp('slow');
                    });
                }

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_aromas', function () {

            $(".btn_actualizar_aromas").attr('disabled','true');
            $(".btn_eliminar_aromas").attr('disabled','true');
            $(".btn_agregar_aromas").slideUp('slow');
            $("#contenedor_registro_aroma").slideDown('slow');
            $("#btn-agregar-aromas").val('Actualizar Aromas');
            $("#btn-agregar-aromas").attr('accion','2');
            $("#id_aromas").val($(this).attr('id_aromas'));
            $("#nombre").val($(this).attr('nombre_aromas'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_aromas', function () {

            $("#id_aromas").val($(this).attr('id_aromas'));
            toastr.error("¿Esta seguro que desea eliminar el aroma?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","AROMAS");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_aromas").val();
            $.post("{{ URL::route('aromas-postEliminar') }}",
            {
              id: id,
            },
            function (data) {
              toastr.info("Eliminacion exitosa.", "AROMAS");
              listado();
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-aromas', function () {

            $(".btn_actualizar_aromas").attr('disabled',false);
            $(".btn_eliminar_aromas").attr('disabled',false);
            $(".btn_agregar_aromas").slideDown('slow');
            $("#contenedor_registro_aroma").slideUp('slow');
            $("#btn-agregar-aromas").val('Agregar Aromas');
            $("#btn-agregar-aromas").attr('accion','1');
            limpiar();

        });

    </script>
    @stop

@stop
