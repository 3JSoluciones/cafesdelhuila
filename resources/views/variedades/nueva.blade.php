@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li class="active" id="proceso_activo">Variedades</li>
            </ol>
        </div>
    </div>

    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">

   <div id="contenedor_registro_variedades" style="display: none">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text" class="k-textbox" id="nombre" name="nombre"
                       required validationMessage="El campo {0} es obligatorio"
                       placeholder="Ingrese el Nombre" style="width: 100%">
                <input type="hidden" id="id_varied" name="id_varied">
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Acidez</label>
                    <select name="acidez_id" id="acidez_id" class="select" style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($acidezes as $acidez)
                            <option value="{{ $acidez->id }}">{{ $acidez->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Aroma</label>
                    <select name="aroma_id" id="aroma_id" class="select"  style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($aromas as $aroma)
                            <option value="{{ $aroma->id }}">{{ $aroma->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Sabor</label>
                    <select name="sabor_id" id="sabor_id" class="select" style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($sabores as $sabor)
                            <option value="{{ $sabor->id }}">{{ $sabor->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>

        <input type="hidden" id="Variedadescol" value="<?php echo date('Y-m-d H:i:s'); ?>">

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-varied">
            <input type="button" value="Agregar Variedad" class="btn btn-primary btn-sm"
                   id="btn-agregar-variedad" accion="1">
        </div>
    </div>

    </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Variedad"
                       class="btn_agregar_variedad btn btn-primary btn-sm">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <hr>
                <div id="contenedor_listado_variedades" ></div>
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
            $.get("{{ URL::Route('variedades-getListado') }}",
                   function (data) {
                        $('#contenedor_listado_variedades').hide().html(data).slideDown('slow');
                        $('.contenedor_carga').slideUp('slow');
                   }
            );
        };

        //animacion del contenedor de registro
        $(".btn_agregar_variedad").click(function () {
            $(".btn_agregar_variedad").slideUp('slow');
            $("#contenedor_registro_variedades").slideDown('slow');
            $(".btn_actualizar_varied").attr('disabled','true');
            $(".btn_eliminar_varied").attr('disabled','true');
        });

        //limpiar capos
        function limpiar() {
            $("#id_varied")     .val('');
            $("#acidez_id")     .val('');
            $("#aroma_id")      .val('');
            $("#sabor_id")      .val('');
            $("#nombre")        .val('');
            $("#Variedadescol") .val('');
        };

        //btn agregar y actualizar
        $("#btn-agregar-variedad").click(function(){

            var Acidez_id       = $("#acidez_id").val();
            var Aroma_id        = $("#aroma_id").val();
            var Sabor_id        = $("#sabor_id").val();
            var nombre          = $("#nombre").val();
            var Variedadescol   = $("#Variedadescol").val();
            var id              = $("#id_varied").val();

            if($("#btn-agregar-variedad").attr('accion') == 1) {

                var validator = $(".formValidation").kendoValidator().data("kendoValidator");
                if (validator.validate()) {
                    //btn agregar
                    $.post("{{ URL::route('variedades-postCrear') }}?" + $('.formValidation').serialize(),
                    {
                      Acidez_id: Acidez_id,
                      Aroma_id: Aroma_id,
                      Sabor_id: Sabor_id,
                      nombre: nombre,
                      Variedadescol: Variedadescol,
                    },
                    function (data) {
                      toastr.info("Registro de " + nombre + " exitoso.", "VARIEDADES");
                      listado();
                      limpiar();
                      $(".btn_agregar_variedad").slideDown('slow');
                      $("#contenedor_registro_variedades").slideUp('slow');
                    });
                }

            } else {

                var validator = $(".formValidation").kendoValidator().data("kendoValidator");
                if (validator.validate()) {
                    //btn actualizar
                    $.post("{{ URL::route('variedades-postActualizar') }}?" + $('.formValidation').serialize(),
                    {
                      id:id,
                      Acidez_id: Acidez_id,
                      Aroma_id: Aroma_id,
                      Sabor_id: Sabor_id,
                      nombre: nombre,
                      Variedadescol: Variedadescol,
                    },
                    function (data) {
                      toastr.info("Actualizacion de " + nombre + " exitosa.", "VARIEDADES");
                      listado();
                      limpiar();
                      $("#btn-agregar-variedad").val('Agregar Variedad');
                      $("#btn-agregar-variedad").attr('accion','1');
                      $(".btn_agregar_variedad").slideDown('slow');
                      $("#contenedor_registro_variedades").slideUp('slow');
                    });
                }

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_varied', function () {

            $(".btn_agregar_variedad").slideUp('slow');
            $("#contenedor_registro_variedades").slideDown('slow');
            $(".btn_actualizar_varied").attr('disabled','true');
            $(".btn_eliminar_varied").attr('disabled','true');
            $("#btn-agregar-variedad").val('Actualizar Variedad');
            $("#btn-agregar-variedad").attr('accion','2');

            $("#id_varied")     .val($(this).attr('id_varied'));
            $("#acidez_id")     .val($(this).attr('acidez_varied'));
            $("#aroma_id")      .val($(this).attr('aroma_varied'));
            $("#sabor_id")      .val($(this).attr('sabor_varied'));
            $("#nombre")        .val($(this).attr('nombre_varied'));
            $("#Variedadescol") .val($(this).attr('varidCol_varied'));

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_varied', function () {

            $("#id_varied").val($(this).attr('id_varied'));
            toastr.error("¿Esta seguro que desea eliminar la variedad?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","VARIEDADES");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_varied").val();
            $.post("{{ URL::route('variedades-postEliminar') }}",
            {
              id: id,
            },
            function (data) {
              toastr.info("Eliminacion exitosa.", "VARIEDADES");
              listado();
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-varied', function () {

            $(".btn_agregar_variedad").slideDown('slow');
            $("#contenedor_registro_variedades").slideUp('slow');
            $(".btn_actualizar_varied").attr('disabled',false);
            $(".btn_eliminar_varied").attr('disabled',false);
            $("#btn-agregar-variedad").val('Agregar Variedad');
            $("#btn-agregar-variedad").attr('accion','1');
            limpiar();

        });

    </script>
    @stop

@stop
