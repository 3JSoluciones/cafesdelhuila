@extends('layouts.main')
<style type="text/css">
    .img_perfil {
        width: 180px;
        height: 150px;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0px 0px 12px #000b93;
    }

    .img_perfil:hover {
        width: 180px;
        height: 150px;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0px 0px 12px #000b93;
    }

    .drag-drop span.desc {
        color: #000;
        cursor: pointer;
    }

    #img_activa{
        width: 180px;
        height: 150px;
        border-radius: 50%;
        top: 0;
        left: 0;
        right:0;
        position: absolute;
        opacity: 0;
        z-index: 3;
        margin-left: auto;
        margin-right: auto;
        cursor: pointer;
    }

    .img {
        width: 180px;
        height: 150px;
        border-radius: 50%;
        top: 0;
        left: 0;
        right:0;
        position: absolute;
        opacity: 0;
        z-index: 3;
        margin-left: auto;
        margin-right: auto;
        cursor: pointer;
    }

</style>

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="/productores/create" >Productores</a></li>
                <li class="active" id="proceso_activo">{{ $productor->nombre }}</li>
            </ol>
        </div>
    </div>

    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="row">
        <div class="col-lg-2">
            <div><img class='img_perfil' id='img_perfil' src='/img/naruto.png'></div>
            <div class="drag-drop" >
                <div class="img" type="file">
                    <input id="img_activa" type="file" multiple="multiple" name="image" />
                </div>
                <input type="submit" class="btn btn-primary btn-xs"value="Establecer Imag Seleccionada" style="display: none" name="upload" id="upload">
            </div>
        </div>

        <div class="col-lg-4">
            <input type="hidden" id="id_productor"      value="{{ $productor->id }}">
            <input type="hidden" id="id_organizacion"   value="{{ $productor->organizacion_id }}">
            <input type="hidden" id="id_medio">
            <input type="hidden" id="id_lote">
            <p></p><b>
                {{ $productor->nombre }}<br />
                {{ $productor->telefono }}<br />
                {{ $productor->email }}</b><br />
            <input type="submit" class="btn btn-primary btn-xs"value="Establecer Img Seleccionada" name="upload" id="upload">

        </div>

        <div class="col-lg-6">
            <h5><b>ORGANIZACIONES</b></h5>
            <ul>
                <li>{{ $productor->organizacion->nombre }}</li>
            </ul>
        </div>

    </div>

   <div class="row">
      <div class="col-lg-12">

        <ul class="nav nav-tabs">
            <p /><br /><li class="active"><a data-toggle="tab" href="#productor">Productor</a></li>
            <li><a data-toggle="tab" href="#fincas">Fincas</a></li>
            <li><a data-toggle="tab" href="#lotes">Lotes</a></li>
            <li><a data-toggle="tab" href="#certificaciones">Certificaciones</a></li>
            <li><a data-toggle="tab" href="#medios">Medios</a></li>
        </ul>

        <div class="tab-content">
            <div id="productor" class="tab-pane fade in active">
                <table class="table">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>NOMBRE</th>
                        <th>TELEFONO</th>
                        <th>EMAIL</th>
                        <th>ORGANIZACION</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><b>{{ $productor->id }}</b></td>
                        <td><b>{{ $productor->nombre }}</b></td>
                        <td><b>{{ $productor->telefono }}</b></td>
                        <td><b>{{ $productor->email }}</b></td>
                        <td><b>{{ $productor->organizacion->nombre }}</b></td>
                        <td>
                            <a href="http://cafesdelhuila.com/productores/actualizar/{{ $productor->id}}">
                                <input type="button" value="Actualizar" class="btn btn-primary btn-sm">
                            </a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div id="fincas" class="tab-pane fade">
                <div id="contenedor_fincas"></div>
                <div id="contenedor_listado_fincas" ></div>
            </div>
            <div id="lotes" class="tab-pane fade">
                <div id="contenedor_lotes" ></div>
                <div id="contenedor_listado_lotes" ></div>
            </div>
            <div id="certificaciones" class="tab-pane fade">
                <div id="contenedor_certificacion"></div>
                <div id="contenedor_listado_certificacion" ></div>
            </div>
            <div id="medios" class="tab-pane fade">
                <div id="contenedor_medios"></div>
                <div id="contenedor_listado_medios"></div>
            </div>
        </div>

      </div>
   </div>


    </form>

@section('page-js-code')
<script type="application/javascript">

    $(document).ready(function () {
        listadoFincas();
        listadoCertificaciones();
        listadoMedios();
        listadoLotes();
        crearFincas();
        crearCertificaciones();
        crearMedios();
        crearLotes();
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
        $("#latitud")           .val('');
        $("#longitud")          .val('');
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
        var idP                     = $("#id_productor").val();
        var Departamento_id         = $("#departamento_id").val();
        var Municipio_id            = $("#municipio_id").val();
        var Corregimiento           = $("#corregimiento").val();
        var Vereda                  = $("#vereda").val();
        var Finca                   = $("#finca").val();
        var Longitud                = $("#longitud").val();
        var Latitud                 = $("#latitud").val();
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
                        Longitud: Longitud,
                        Latitud: Latitud,
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
                        crearLotes();
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
                        Longitud: Longitud,
                        Latitud: Latitud,
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
                        crearLotes();
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
        $("#longitud")          .val($(this).attr('Longitud'));
        $("#latitud")           .val($(this).attr('Latitud'));
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

    //--------------------------------------------------------------------
    //inicia medios
    //--------------------------------------------------------------------

    //Crear
    function crearMedios() {
        $.get("{{ URL('http://cafesdelhuila.com/medios/crear') }}",
                function (data) {
                    $('#contenedor_medios').hide().html(data).slideDown('slow');
                    $("#id_productor_Medios").val({{ $productor->id }});
                }
        );
    }

    //listado
    function listadoMedios() {
        var id = $("#id_productor").val();
        $('.contenedor_carga').slideDown('slow');
        $.get("{{ URL('http://cafesdelhuila.com/medios/listado' ) }}",
                {
                    id: id
                },
                function (data) {
                    $('#contenedor_listado_medios').hide().html(data).slideDown('slow');
                    $('.contenedor_carga').slideUp('slow');
                }
        );
    }

    //cambia la propiedad del archivo
    $(document).on('change','#nombre',function () {
        var file        = this.files[0];
        nombreArchivo   = file.name;
        tamanioArchivo  = file.size;
        tipoArchivo     = file.type;

        $("#nombre").val(nombreArchivo);
    });

    //btn mostrar formulario registro
    $(document).on('click','.btn_agregar_medio',function(){
        $(".btn_agregar_medio").slideUp('slow');
        $("#div_medio").slideDown('slow');
        $("#div_agregar_medio").slideDown('slow');
        $(".btn_eliminar_medio").attr('disabled',true);
    });

    //btn eliminar
    $(document).on('click','.btn_eliminar_medio', function () {

        $("#id_medio").val($(this).attr('id_medio'));
        toastr.error("¿Esta seguro que desea eliminar el medio?<br>" +
                "<button class='btn-danger confirmar-eliminar-medio'>Confirmar eliminar</button>","MEDIO DE PRODUCTORES");

    });

    //confirmar eliminar
    $(document).on('click','.confirmar-eliminar-medio', function () {

        var id = $("#id_medio").val();
        $.ajax({
            url: 'http://cafesdelhuila.com/medios/' + id + '',
            data:{
                id:id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'json',
            type:'DELETE',
            success:function(data) {
                toastr.info("Eliminacion exitosa.", "MEDIOS");
                listadoMedios();
            }
        });

    });


    //cancelar
    $(document).on('click','#btn-cancelar-medio', function () {

        $(".btn_agregar_medio").slideDown('slow');
        $("#div_medio").slideUp('slow');
        $("#div_agregar_medio").slideUp('slow');
        $(".btn_eliminar_medio").attr('disabled',false);

    });


    //--------------------------------------------------------------------
    //termina medios
    //--------------------------------------------------------------------

    //--------------------------------------------------------------------
    //inicia lotes
    //--------------------------------------------------------------------

    //listado
    function listadoLotes() {
        var id  = $("#id_finca").val();
        var idP = $("#id_productor").val();
        $('.contenedor_carga').slideDown('slow');
        $.get("{{ URL('http://cafesdelhuila.com/lotes/listado' ) }}",
                {
                    id: id,
                    idP:idP
                },
                function (data) {
                    $('#contenedor_listado_lotes').hide().html(data).slideDown('slow');
                    $('.contenedor_carga').slideUp('slow');
                }
        );
    }

    //Crear
    function crearLotes() {
        var id = $("#id_productor").val();
        $.get("{{ URL('http://cafesdelhuila.com/lotes/crear') }}",
                {
                   id:id
                },
                function (data) {
                    $('#contenedor_lotes').hide().html(data).slideDown('slow');
                }
        );
    };

    //limpiar capos
    function limpiarCamposLotes() {
        $("#id_lote")                   .val('');
        $("#finca_id")                  .val('');
        $("#variedad1")                 .val('');
        $("#variedad2")                 .val('');
        $("#variedad3")                 .val('');
        $("#acidez_id")                 .val('');
        $("#aroma_id")                  .val('');
        $("#sabor_id")                  .val('');
        $("#tipo_beneficio_id")         .val('');
        $("#tipo_secado_id")            .val('');
        $("#cantidad_aboles_variedad1") .val('');
        $("#cantidad_aboles_variedad2") .val('');
        $("#cantidad_aboles_variedad3") .val('');
        $("#nombre")                    .val('');
        $("#area")                      .val('');
        $("#perfil")                    .val('');
    };

    //animacion del contenedor de registro
    $(document).on('click','.btn_agregar_lotes',function () {
        $(".btn_agregar_lotes").slideUp('slow');
        $("#contenedor_registro_lote").slideDown('slow');
        $(".btn_actualizar_lote").attr('disabled','true');
        $(".btn_eliminar_lote").attr('disabled','true');
    });

    //btn agregar y actualizar
    $(document).on('click','#btn-agregar-lotes',function(){

        var id                              = $("#id_lote").val();
        var Finca_id                        = $("#finca_id").val();
        var Variedad1_id                    = $("#variedad1").val();
        var Variedad2_id                    = $("#variedad2").val();
        var Variedad3_id                    = $("#variedad3").val();
        var Acidez_id                       = $("#acidez_id").val();
        var Aroma_id                        = $("#aroma_id").val();
        var Sabor_id                        = $("#sabor_id").val();
        var Tipo_beneficio_id               = $("#tipo_beneficio_id").val();
        var Tipo_secado_id                  = $("#tipo_secado_id").val();
        var Cantidad_arboles_variedad1      = $("#cantidad_aboles_variedad1").val();
        var Cantidad_arboles_variedad2      = $("#cantidad_aboles_variedad2").val();
        var Cantidad_arboles_variedad3      = $("#cantidad_aboles_variedad3").val();
        var Nombre                          = $("#nombre").val();
        var Area                            = $("#area").val();
        var Perfil                          = $("#perfil").val();

        if($("#btn-agregar-lotes").attr('accion') == 1) {

                //btn agregar
                $.ajax({
                    url: 'http://cafesdelhuila.com/lotes',
                    data: {
                        Finca_id: Finca_id,
                        Variedad1_id: Variedad1_id,
                        Variedad2_id: Variedad2_id,
                        Variedad3_id: Variedad3_id,
                        Acidez_id:Acidez_id,
                        Aroma_id:Aroma_id,
                        Sabor_id:Sabor_id,
                        Tipo_beneficio_id: Tipo_beneficio_id,
                        Tipo_secado_id: Tipo_secado_id,
                        Cantidad_arboles_variedad1: Cantidad_arboles_variedad1,
                        Cantidad_arboles_variedad2: Cantidad_arboles_variedad2,
                        Cantidad_arboles_variedad3: Cantidad_arboles_variedad3,
                        Nombre: Nombre,
                        Area: Area,
                        Perfil: Perfil,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function (data) {
                        toastr.info("Registro de " + Nombre + " exitoso.", "LOTES");
                        listadoLotes()
                        limpiarCamposLotes();
                        $(".btn_agregar_lotes").slideDown('slow');
                        $("#contenedor_registro_lote").slideUp('slow');
                    }
                });

        } else {

                //btn actualizar
                $.ajax({
                    url: 'http://cafesdelhuila.com/lotes/' + id + '',
                    data: {
                        id: id,
                        Finca_id: Finca_id,
                        Variedad1_id: Variedad1_id,
                        Variedad2_id: Variedad2_id,
                        Variedad3_id: Variedad3_id,
                        Acidez_id:Acidez_id,
                        Aroma_id:Aroma_id,
                        Sabor_id:Sabor_id,
                        Tipo_beneficio_id: Tipo_beneficio_id,
                        Tipo_secado_id: Tipo_secado_id,
                        Cantidad_arboles_variedad1: Cantidad_arboles_variedad1,
                        Cantidad_arboles_variedad2: Cantidad_arboles_variedad2,
                        Cantidad_arboles_variedad3: Cantidad_arboles_variedad3,
                        Nombre: Nombre,
                        Area: Area,
                        Perfil: Perfil,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    type: 'PUT',
                    success: function (data) {
                        toastr.info("Actualizacion de " + Nombre + " exitosa.", "LOTES");
                        listadoLotes();
                        limpiarCamposLotes();
                        $("#btn-agregar-lotes").val('Agregar Lote');
                        $("#btn-agregar-lotes").attr('accion','1');
                        $(".btn_agregar_lotes").slideDown('slow');
                        $("#contenedor_registro_lote").slideUp('slow');
                    }
                });
            }


    });

    //btn actualizar
    $(document).on('click','.btn_actualizar_lote', function () {

        $(".btn_agregar_lotes").slideUp('slow');
        $("#contenedor_registro_lote").slideDown('slow');
        $("#btn-agregar-lotes").val('Actualizar Lote');
        $("#btn-agregar-lotes").attr('accion','2');
        $(".btn_actualizar_lote").attr('disabled','true');
        $(".btn_eliminar_lote").attr('disabled','true');

        $("#id_lote")                   .val($(this).attr('id'));
        $("#finca_id")                  .val($(this).attr('finca_id'));
        $("#variedad1")                 .val($(this).attr('Variedad1_id'));
        $("#variedad2")                 .val($(this).attr('Variedad2_id'));
        $("#variedad3")                 .val($(this).attr('Variedad3_id'));
        $("#acidez_id")                 .val($(this).attr('Acidez_id'));
        $("#aroma_id")                  .val($(this).attr('Aroma_id'));
        $("#sabor_id")                  .val($(this).attr('Sabor_id'));
        $("#tipo_beneficio_id")         .val($(this).attr('Tipo_beneficio_id'));
        $("#tipo_secado_id")            .val($(this).attr('Tipo_secado_id'));
        $("#cantidad_aboles_variedad1") .val($(this).attr('Cantidad_arboles_variedad1'));
        $("#cantidad_aboles_variedad2") .val($(this).attr('Cantidad_arboles_variedad2'));
        $("#cantidad_aboles_variedad3") .val($(this).attr('Cantidad_arboles_variedad3'));
        $("#nombre")                    .val($(this).attr('Nombre'));
        $("#area")                      .val($(this).attr('Area'));
        $("#perfil")                    .val($(this).attr('Perfil'));

    });

    //btn eliminar
    $(document).on('click','.btn_eliminar_lote', function () {

        $("#id_lote").val($(this).attr('id_lote'));
        toastr.error("¿Esta seguro que desea eliminar el lote?<br>" +
                "<button class='btn-danger confirmar'>Confirmar eliminar</button>","LOTES");

    });

    //confirmar eliminar
    $(document).on('click','.confirmar', function () {

        var id = $("#id_lote").val();
        $.ajax({
            url: 'http://cafesdelhuila.com/lotes/' + id + '',
            data:{
                id:id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'json',
            type:'DELETE',
            success:function(data) {
                toastr.info("Eliminacion exitosa.", "LOTES");
                listadoLotes();
            }
        });

    });

    //cancelar actualizar
    $(document).on('click','#btn-cancelar-lote', function () {

        $(".btn_agregar_lotes").slideDown('slow');
        $("#contenedor_registro_lote").slideUp('slow');
        $("#btn-agregar-lotes").val('Agregar Lote');
        $("#btn-agregar-lotes").attr('accion','1');
        $(".btn_actualizar_lote").attr('disabled',false);
        $(".btn_eliminar_lote").attr('disabled',false);
        limpiarCamposLotes()

    });

    //--------------------------------------------------------------------
    //termina lotes
    //--------------------------------------------------------------------


</script>

@stop

@stop