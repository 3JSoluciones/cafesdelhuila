@extends('layouts.main')
<style type="text/css">
    .img_perfil {
        width: 150px;
        border-radius: 10%;
        box-shadow: 0px 0px 16px #000;
    }

    .img_perfil:hover {
        width: 150px;
        border-radius: 10%;
        box-shadow: 0px 0px 16px #000;
        opacity: 0.6;
    }
    
</style>

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li><a href="/productores/create" >Productores</a></li>
                <li class="active" id="proceso_activo">{{ $productor->nombre }}</li>
            </ol>
        </div>
    </div>

    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="row">
        <div class="col-lg-2">
            <img src="/img/naruto.jpg" class="img_perfil text-center">
        </div>

        <div class="col-lg-10">
            <input type="hidden" id="id_productor" value="{{ $productor->id }}">
            <input type="hidden" id="id_organizacion" value="{{ $productor->organizacion_id }}">
            Nombre:         {{ $productor->nombre }}<br />
            Correo:         {{ $productor->email }}<br />
            Telefono:       {{ $productor->telefono }}<br />
            Organizacion:   {{ $productor->organizacion->nombre }}<br />
            Creado:         {{ $productor->created_at }}<br />
            <hr>
        </div>
    </div>

   <div class="row">
      <div class="col-lg-12">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#productor">Productor</a></li>
            <li><a data-toggle="tab" href="#fincas">Fincas</a></li>
            <li><a data-toggle="tab" href="#certificaciones">Certificaciones</a></li>
            <li><a data-toggle="tab" href="#medios">Medios</a></li>
        </ul>

        <div class="tab-content">
            <div id="productor" class="tab-pane fade in active">
                <h3>productor</h3>
            </div>
            <div id="fincas" class="tab-pane fade">
                <div id="contenedor_fincas"></div>
                <div id="contenedor_listado_fincas" ></div>
            </div>
            <div id="certificaciones" class="tab-pane fade">
                <div id="contenedor_certificacion"></div>
                <div id="contenedor_listado_certificacion" ></div>
            </div>
            <div id="medios" class="tab-pane fade">
                <h3>medios</h3>
            </div>
        </div>

      </div>
   </div>

    </form>

@section('page-js-code')

<script type="application/javascript">

    $(document).ready(function () {
        listadoFincas();
        crearFincas();
        listadoCertificaciones();
        crearCertificaciones();
    });

    //--------------------------------------------------------------------
    //inicia fincas
    //--------------------------------------------------------------------

    //Crear
    function crearFincas() {
        $.get("{{ URL('http://cafesdelhuila.com/fincas/crear') }}",
                function (data) {
                    $('#contenedor_fincas').hide().html(data).slideDown('slow');
                }
        );
    };

    //listado
    function listadoFincas() {
        var id = $("#id_productor").val();
        $('.contenedor_carga').slideDown('slow');
        $.get("{{ URL('http://cafesdelhuila.com/fincas/listado' ) }}",
                {
                    id: id
                },
                function (data) {
                    $('#contenedor_listado_fincas').hide().html(data).slideDown('slow');
                    $('.contenedor_carga').slideUp('slow');
                }
        );
    };

    //limpiar capos
    function limpiarCamposFincas() {
        $("#id_finca")          .val('');
        $("#productor_id")      .val('');
        $("#departamento_id")   .val('');
        $("#municipio_id")      .val('');
        $("#corregimiento")     .val('');
        $("#vereda")            .val('');
        $("#finca")             .val('');
        $("#coordenadas")       .val('');
        $("#altitud")           .val('');
        $("#inicioCosecha")     .val('');
        $("#finCosecha")        .val('');
        $("#inicioMitaca")      .val('');
        $("#finMitaca")         .val('');
    };

    //animacion del contenedor de registro
    $(document).on('click',".btn_agregar_finca", function () {
        $(".btn_agregar_finca").slideUp('slow');
        $("#contenedor_registro_finca").slideDown('slow');
        $(".btn_actualizar_finca").attr('disabled','true');
        $(".btn_eliminar_finca").attr('disabled','true');
    });

    //btn agregar y actualizar
    $(document).on('click',"#btn-agregar-finca", function(){

        var id                      = $("#id_finca").val();
        var idP                      = $("#id_productor").val();
        var Departamento_id         = $("#departamento_id").val();
        var Municipio_id            = $("#municipio_id").val();
        var Corregimiento           = $("#corregimiento").val();
        var Vereda                  = $("#vereda").val();
        var Finca                   = $("#finca").val();
        var Coordenadas             = $("#coordenadas").val();
        var Altitud                 = $("#altitud").val();
        var Cosecha_comienza        = $("#inicioCosecha").val();
        var Cosecha_termina         = $("#finCosecha").val();
        var Mitaca_comienza         = $("#inicioMitaca").val();
        var Mitaca_termina          = $("#finMitaca").val();

        if($("#btn-agregar-finca").attr('accion') == 1) {

                //btn agregar
                $.ajax({
                    url: 'http://cafesdelhuila.com/fincas',
                    data: {
                        Productor_id: idP,
                        Departamento_id: Departamento_id,
                        Municipio_id: Municipio_id,
                        Corregimiento: Corregimiento,
                        Vereda: Vereda,
                        Finca: Finca,
                        Coordenadas: Coordenadas,
                        Altitud: Altitud,
                        Cosecha_comienza: Cosecha_comienza,
                        Cosecha_termina: Cosecha_termina,
                        Mitaca_comienza: Mitaca_comienza,
                        Mitaca_termina: Mitaca_termina,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function (data) {
                        toastr.info("Registro de " + Finca + " exitoso.", "FINCAS");
                        listadoFincas();
                        limpiarCamposFincas();
                        $(".btn_agregar_finca").slideDown('slow');
                        $("#contenedor_registro_finca").slideUp('slow');
                    }
                });

        } else {

                //btn actualizar
                $.ajax({
                    url: 'http://cafesdelhuila.com/fincas/' + id + '',
                    data: {
                        id: id,
                        Productor_id: idP,
                        Departamento_id: Departamento_id,
                        Municipio_id: Municipio_id,
                        Corregimiento: Corregimiento,
                        Vereda: Vereda,
                        Finca: Finca,
                        Coordenadas: Coordenadas,
                        Altitud: Altitud,
                        Cosecha_comienza: Cosecha_comienza,
                        Cosecha_termina: Cosecha_termina,
                        Mitaca_comienza: Mitaca_comienza,
                        Mitaca_termina: Mitaca_termina,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    type: 'PUT',
                    success: function (data) {
                        toastr.info("Actualizacion de " + Finca + " exitosa.", "FINCAS");
                        listadoFincas();
                        limpiarCamposFincas();
                        $("#btn-agregar-finca").val('Agregar Finca');
                        $("#btn-agregar-finca").attr('accion','1');
                        $(".btn_agregar_finca").slideDown('slow');
                        $("#contenedor_registro_finca").slideUp('slow');
                    }
                });
            }

    });

    //btn actualizar
    $(document).on('click','.btn_actualizar_finca', function () {

        $(".btn_agregar_finca").slideUp('slow');
        $("#contenedor_registro_finca").slideDown('slow');
        $("#btn-agregar-finca").val('Actualizar Finca');
        $("#btn-agregar-finca").attr('accion','2');
        $(".btn_actualizar_finca").attr('disabled','true');
        $(".btn_eliminar_finca").attr('disabled','true');

        $("#id_finca")         .val($(this).attr('id'));
        $("#productor_id")      .val($(this).attr('Productor_id'));
        $("#departamento_id")   .val($(this).attr('Departamento_id'));
        $("#municipio_id")      .val($(this).attr('Municipio_id'));
        $("#corregimiento")     .val($(this).attr('Corregimiento'));
        $("#vereda")            .val($(this).attr('Vereda'));
        $("#finca")             .val($(this).attr('Finca'));
        $("#coordenadas")       .val($(this).attr('Coordenadas'));
        $("#altitud")           .val($(this).attr('Altitud'));
        $("#inicioCosecha")     .val($(this).attr('Cosecha_comienza'));
        $("#finCosecha")        .val($(this).attr('Cosecha_termina'));
        $("#inicioMitaca")      .val($(this).attr('Mitaca_comienza'));
        $("#finMitaca")         .val($(this).attr('Mitaca_termina'));

    });

    //btn eliminar
    $(document).on('click','.btn_eliminar_finca', function () {

        $("#id_finca").val($(this).attr('id_finca'));
        toastr.error("¿Esta seguro que desea eliminar la finca?<br>" +
                "<button class='btn-danger confirmar'>Confirmar eliminar</button>","FINCAS");

    });

    //confirmar eliminar
    $(document).on('click','.confirmar', function () {

        var id = $("#id_finca").val();
        $.ajax({
            url: 'http://cafesdelhuila.com/fincas/' + id + '',
            data:{
                id:id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'json',
            type:'DELETE',
            success:function(data) {
                toastr.info("Eliminacion exitosa.", "FINCAS");
                listadoFincas();
            }
        });

    });

    //cancelar actualizar
    $(document).on('click','#btn-cancelar-finca', function () {

        $(".btn_agregar_finca").slideDown('slow');
        $("#contenedor_registro_finca").slideUp('slow');
        $(".btn_actualizar_finca").attr('disabled',false);
        $(".btn_eliminar_finca").attr('disabled',false);
        $("#btn-agregar-finca").val('Agregar Finca');
        $("#btn-agregar-finca").attr('accion','1');
        limpiarCamposFincas();

    });

    //--------------------------------------------------------------------
    //termina fincas
    //--------------------------------------------------------------------

    //--------------------------------------------------------------------
    //inicia certificaciones productores
    //--------------------------------------------------------------------

    //Crear
    function crearCertificaciones() {
        $.get("{{ URL('http://cafesdelhuila.com/certificacionesProductores/crear') }}",
                function (data) {
                    $('#contenedor_certificacion').hide().html(data).slideDown('slow');
                }
        );
    };

    //listado
    function listadoCertificaciones() {
        var id = $("#id_productor").val();
        $('.contenedor_carga').slideDown('slow');
        $.get("{{ URL('http://cafesdelhuila.com/certificacionesProductores/listado' ) }}",
                {
                    id: id
                },
                function (data) {
                    $('#contenedor_listado_certificacion').hide().html(data).slideDown('slow');
                    $('.contenedor_carga').slideUp('slow');
                }
        );
    };

    //animacion del contenedor de registro
    $(document).on('click',".btn_agregar_certificacionProductor",function () {
        $(".btn_agregar_certificacionProductor").slideUp('slow');
        $("#contenedor_registro_certiProduct").slideDown('slow');
        $(".btn_actualizar_certiProd").attr('disabled','true');
        $(".btn_eliminar_certiProd").attr('disabled','true');
        $("#productor_id").attr('disabled',true);
    });

    //limpiar capos
    function limpiarCamposCertProduc() {
        $("#productor_id").val('');
        $("#certificacion_id").val('');
        $("#id_certProd").val('');
    };

    //btn agregar y actualizar
    $(document).on('click',"#btn-agregar-certificacionProductor",function(){

        var idP                 = $("#id_productor").val();
        var Certificacion_id    = $("#certificacion_id").val();
        var id                  = $("#id_certProd").val();

        if($("#btn-agregar-certificacionProductor").attr('accion') == 1) {

            //btn agregar
            $.ajax({
                url: 'http://cafesdelhuila.com/certificacionesProductores',
                data: {
                    Productor_id: idP,
                    Certificacion_id: Certificacion_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                type: 'POST',
                success: function (data) {
                    toastr.info("Registro exitoso.", "CERTIFICACIONES DE PRODUCTORES");
                    listadoCertificaciones();
                    limpiarCamposCertProduc();
                    $(".btn_agregar_certificacionProductor").slideDown('slow');
                    $("#contenedor_registro_certiProduct").slideUp('slow');
                }
            });

        } else {

                //btn actualizar
                $.ajax({
                    url: 'http://cafesdelhuila.com/certificacionesProductores/' + id + '',
                    data: {
                        id: id,
                        Productor_id: idP,
                        Certificacion_id: Certificacion_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    type: 'PUT',
                    success: function (data) {
                        toastr.info("Actualizacion exitosa.", "CERTIFICACIONES DE PRODUCTORES");
                        listadoCertificaciones();
                        limpiarCamposCertProduc();
                        $("#btn-agregar-certificacionProductor").val('Agregar Certificacion a Productores');
                        $("#btn-agregar-certificacionProductor").attr('accion','1');
                        $(".btn_agregar_certificacionProductor").slideDown('slow');
                        $("#contenedor_registro_certiProduct").slideUp('slow');
                    }
                });
            }


    });

    //btn actualizar
    $(document).on('click','.btn_actualizar_certiProd', function () {

        $(".btn_agregar_certificacionProductor").slideUp('slow');
        $("#contenedor_registro_certiProduct").slideDown('slow');
        $("#btn-agregar-certificacionProductor").val('Actualizar Certificacion a Productores');
        $("#btn-agregar-certificacionProductor").attr('accion','2');
        $(".btn_actualizar_certiProd").attr('disabled','true');
        $(".btn_eliminar_certiProd").attr('disabled','true');

        $("#id_certProd")       .val($(this).attr('id_certiprod'));
        $("#productor_id")      .val($(this).attr('prod_certiProd'));
        $("#certificacion_id")  .val($(this).attr('cert_certiProd'));

    });

    //btn eliminar
    $(document).on('click','.btn_eliminar_certiProd', function () {

        $("#id_certProd").val($(this).attr('id_certiProd'));
        toastr.error("¿Esta seguro que desea eliminar la certificacion del productor?<br>" +
                "<button class='btn-danger confirmar'>Confirmar eliminar</button>","CERTIFICACIONES DE PRODUCTORES");

    });

    //confirmar eliminar
    $(document).on('click','.confirmar', function () {

        var id = $("#id_certProd").val();
        $.ajax({
            url: 'http://cafesdelhuila.com/certificacionesProductores/' + id + '',
            data:{
                id:id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'json',
            type:'DELETE',
            success:function(data) {
                toastr.info("Eliminacion exitosa.", "CERTIFICACIONES DE PRODUCTORES");
                listadoCertificaciones();
            }
        });

    });

    //cancelar actualizar
    $(document).on('click','#btn-cancelar-certiProd', function () {

        $(".btn_agregar_certificacionProductor").slideDown('slow');
        $("#contenedor_registro_certiProduct").slideUp('slow');
        $(".btn_actualizar_certiProd").attr('disabled',false);
        $(".btn_eliminar_certiProd").attr('disabled',false);
        $("#btn-agregar-certificacionProductor").val('Agregar Certificacion a Productores');
        $("#btn-agregar-certificacionProductor").attr('accion','1');
        limpiarCamposCertProduc();

    });

    //--------------------------------------------------------------------
    //termina certificaciones productores
    //--------------------------------------------------------------------

</script>

@stop

@stop