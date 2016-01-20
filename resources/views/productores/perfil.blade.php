@extends('layouts.main')

@section('page-css-code')
    <style type="text/css">
        .img_perfil {
            width: 180px;
            height: 150px;
            cursor: pointer;
            box-shadow: 0px 0px 12px #000b93;
        }

        .img_perfil:hover {
            width: 180px;
            height: 150px;
            cursor: pointer;
            opacity: 0.4;
            box-shadow: 0px 0px 12px #000b93;
        }

        .drag-dropImg span.desc {
            color: #000;
            cursor: pointer;
        }

				#img {
					 	background: #d9edf7;
						padding:4px;
						border-radius: 6px;
				}

    </style>


@stop

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/">Inicio</a></li>
                <li><a href="{{ URL::route('productores-getCrear')}}" >Productores</a></li>
                <li class="active" id="proceso_activo"><b><a href="{{ URL::route('productoresPerfil-getPerfil',$productor->id)}}">{{ $productor->nombre }}</a></b></li>
            </ol>
        </div>
    </div>

        <div class="row" >

            <div class="col-lg-2 ">
                <div>
                  <?php
                  if ($productor->foto != null) {
                  ?>
								  <br><br>
								  	<a href="/perfiles/{{ $productor->foto}}" target="newwindow">
								  	<img class='img_perfil' id='img_perfil' src='/perfiles/{{ $productor->foto}}'>
									</a>
								  <?php
                  } else {
                  ?> <br><br>
		      <a href="/perfiles/no_foto.png" target="newwindow">
		      <img class='img_perfil' id='img_perfil' src='/perfiles/no_foto.png'>
		      </a>
		      <?php
                  }
                  ?>
                    <input type="hidden" id="nombreFotoPerfil" value="{{ $productor->foto }}">

                </div>
            </div>

            <div class="col-lg-3">
                    <h5><b>PRODUCTOR</b></h5>
                    <div class="alert alert-info">
                      <b>{{ $productor->nombre }}</b><br />
                      {{ $productor->telefono }}<br />
                      {{ $productor->email }}<br />
                    </div>
            <form class="formValidation" method="POST"
							    action="{{ URL::route('productores-postSubirImagen')}}"
							    accept-charset="UTF-8" enctype="multipart/form-data">
				    <meta name="csrf-token" content="{{ csrf_token() }}">

                <input type="hidden" id="idPro" name="idPro" value="{{ $productor->id}}">
                <input type="hidden" id="id_productor"      value="{{ $productor->id }}">
                <input type="hidden" id="id_organizacion"   value="{{ $productor->organizacion_id }}">
                <input type="hidden" id="id_medio">
                <input type="hidden" id="medio">
                <input type="hidden" id="id_lote">
                <input type="file" class="filestyle" required style="width:100%;"
										validationMessage="El campo foto es obligatorio"
										data-buttonBefore="true" name="img" id="img">
                <button type="submit" id="btn-agregar-medio"
										class="btn btn-primary btn-sm" style="width:100%;">
										Establecer foto seleccionada</button>

            </div>
            </form>

            <div class="col-lg-4" style="height:200px; ">
                <h5><b>BIO</b></h5>
                <div class="alert alert-info">
                    <i>{{ $productor->bio }}</i>
                </div>
            </div>

            <div class="col-lg-3" style="height:200px; ">
                <h5><b>ORGANIZACIONES</b></h5>
                <div class="alert alert-success">
                    <ul>
                      <li><i>@if(isset($productor->organizacion->nombre)) {{ $productor->organizacion->nombre }} @else Ninguna @endif</i></li>
                    </ul>
                </div>
            </div>

        </div>

        <hr>

        <div class="row">
            <div class="col-lg-12">

                <ul class="nav nav-tabs">
                    <p /><br />
                    <li @if($medioAgregado == 1) class="active" @elseif($medioAgregado == 2) @endif><a data-toggle="tab" href="#productor">Productor</a></li>
                    <li><a data-toggle="tab" href="#fincas">Fincas</a></li>
                    <li><a data-toggle="tab" href="#lotes">Lotes</a></li>
                    <li><a data-toggle="tab" href="#certificaciones">Certificaciones</a></li>
                    <li @if($medioAgregado == 1) @elseif($medioAgregado == 2) class="active" @endif><a data-toggle="tab" href="#medios">Medios</a></li>
                </ul>

                <div class="tab-content">
                    <div id="productor" @if($medioAgregado == 1) class="tab-pane fade in active"
                         @elseif($medioAgregado == 2) class="tab-pane fade" @endif>
              <form class="formValidation">
                  <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                <td><b>@if(isset($productor->organizacion->nombre)) {{ $productor->organizacion->nombre }} @else Ninguna @endif</b></td>
                                <td>
                                    <a href="{{ URL::route('productoresPerfil-getActualizar', $productor->id)}}">
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
                    <div id="medios"  @if($medioAgregado == 1) class="tab-pane fade"
                         @elseif($medioAgregado == 2) class="tab-pane fade in active" @endif>
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
            $(":file").filestyle({buttonBefore: true});
        });

        $(".img_perfil").click(function () {
            var archivo = $('#nombreFotoPerfil').val();
            $.get("{{ URL::route('productoresPerfilImagen-getPerfilImagen', $productor->foto) }}",
                    {
                        archivo: archivo
                    },
                    function (data) {
                    }
            );
        });

        //--------------------------------------------------------------------
        //inicia fincas
        //--------------------------------------------------------------------


        //Crear
        function crearFincas() {
            $.get("{{ URL::route('fincas-getCrear') }}",
                    function (data) {
                        $('#contenedor_fincas').hide().html(data).slideDown('slow');
                    }
            );
        };

        //listado
        function listadoFincas() {
            var id = $("#id_productor").val();
            $('.contenedor_carga').slideDown('slow');
            $.get("{{ URL::route('fincas-getListado') }}",
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
                if(Departamento_id == '' || Municipio_id == '' || Finca == '') {
                  $("#mgs_fincasFinca").slideDown('slow');
                  $("#mgs_fincasDepar").slideDown('slow');
                  $("#mgs_fincasMuni").slideDown('slow');
                } else {
                  $.post("{{ URL::route('fincas-postCrear') }}?" + $('.formValidation').serialize(),
                  {
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
                  function (data) {
                    toastr.info("Registro de " + Finca + " exitoso.", "FINCAS");
                    listadoFincas();
                    limpiarCamposFincas();
                    crearLotes();
                    $(".btn_agregar_finca").slideDown('slow');
                    $("#contenedor_registro_finca").slideUp('slow');
                    $("#mgs_fincasFinca").slideUp('slow');
                    $("#mgs_fincasDepar").slideUp('slow');
                    $("#mgs_fincasMuni").slideUp('slow');
                  });
                }

            } else {

                //btn actualizar
                if(Departamento_id == '' || Municipio_id == '' || Finca == '') {
                  $("#mgs_fincasFinca").slideDown('slow');
                  $("#mgs_fincasDepar").slideDown('slow');
                  $("#mgs_fincasMuni").slideDown('slow');
                } else {
                $.post("{{ URL::route('fincas-postActualizar') }}?" + $('.formValidation').serialize(),
                {
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
                function (data) {
                  toastr.info("Actualizacion de " + Finca + " exitosa.", "FINCAS");
                  listadoFincas();
                  limpiarCamposFincas();
                  crearLotes();
                  $("#btn-agregar-finca").val('Agregar Finca');
                  $("#btn-agregar-finca").attr('accion','1');
                  $(".btn_agregar_finca").slideDown('slow');
                  $("#contenedor_registro_finca").slideUp('slow');
                  $("#mgs_fincasFinca").slideUp('slow');
                  $("#mgs_fincasDepar").slideUp('slow');
                  $("#mgs_fincasMuni").slideUp('slow');
                });
              }
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
            $("#inicioCosecha")     .val($(this).attr('cosecha_comienza'));
            $("#finCosecha")        .val($(this).attr('cosecha_termina'));
            $("#inicioMitaca")      .val($(this).attr('mitaca_comienza'));
            $("#finMitaca")         .val($(this).attr('mitaca_termina'));

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
            $.post("{{ URL::route('fincas-postEliminar') }}",
            {
              id: id,
            },
            function (data) {
              toastr.info("Eliminacion exitosa.", "FINCAS");
              listadoFincas();
              listadoLotes();
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
            $("#mgs_fincasFinca").slideUp('slow');
            $("#mgs_fincasDepar").slideUp('slow');
            $("#mgs_fincasMuni").slideUp('slow');

        });

        //--------------------------------------------------------------------
        //termina fincas
        //--------------------------------------------------------------------

        //--------------------------------------------------------------------
        //inicia certificaciones productores
        //--------------------------------------------------------------------

        //Crear
        function crearCertificaciones() {
            $.get("{{ URL::Route('certificacionesProductores-getCrear') }}",
                    function (data) {
                        $('#contenedor_certificacion').hide().html(data).slideDown('slow');
                    }
            );
        };

        //listado
        function listadoCertificaciones() {
            var id = $("#id_productor").val();
            $('.contenedor_carga').slideDown('slow');
            $.get("{{ URL::Route('certificacionesProductores-getListado') }}",
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

                //btn agregar
                if($("#certificacion_id").val() != '') {

                  $.post("{{ URL::route('certificacionesProductores-postCrear') }}?" + $('.formValidation').serialize(),
                  {
                    Productor_id: idP,
                    Certificacion_id: Certificacion_id,
                  },
                  function (data) {
                    toastr.info("Registro exitoso.", "CERTIFICACIONES DE PRODUCTORES");
                    listadoCertificaciones();
                    limpiarCamposCertProduc();
                    $(".btn_agregar_certificacionProductor").slideDown('slow');
                    $("#contenedor_registro_certiProduct").slideUp('slow');
                    $("#mgs_certifiProductores").slideUp('slow');
                  });

                } else {

                  $("#mgs_certifiProductores").slideDown('slow');

                }
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
            $.post("{{ URL::route('certificacionesProductores-postEliminar') }}",
            {
              id: id,
            },
            function (data) {
              toastr.info("Eliminacion exitosa.", "CERTIFICACIONES DE PRODUCTORES");
              listadoCertificaciones();
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
            $("#mgs_certifiProductores").slideUp('slow');

        });

        //--------------------------------------------------------------------
        //termina certificaciones productores
        //--------------------------------------------------------------------

        //--------------------------------------------------------------------
        //inicia medios
        //--------------------------------------------------------------------


        <?php
        if($medioAgregado == 1) {

        } elseif($medioAgregado == 2) {
            ?>toastr.info("El medio se creo con exito.","MEDIOS");<?php
        }
        ?>
        //Crear
        function crearMedios() {
            $.get("{{ URL::Route('mediosProductor-getCrear') }}",
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
            $.get("{{ URL::Route('mediosProductor-getListado') }}",
                    {
                        id: id
                    },
                   function (data) {
                     $('#contenedor_listado_medios').hide().html(data).slideDown('slow');
                     $('.contenedor_carga').slideUp('slow');
                   }
            );
        }

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
            $("#medio").val($(this).attr('medio'));
            toastr.error("¿Esta seguro que desea eliminar el medio?<br>" +
                    "<button class='btn-danger confirmar-eliminar-medio'>Confirmar eliminar</button>","MEDIO DE PRODUCTORES");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar-eliminar-medio', function () {

            var id      = $("#id_medio").val();
            var medio   = $("#medio").val();
            $.post("{{ URL::route('mediosProductor-postEliminar') }}",
            {
              id: id,
              medio:medio,
            },
            function (data) {
              toastr.info("Eliminacion exitosa.", "MEDIOS");
              listadoMedios();
            });

        });

        //cancelar
        $(document).on('click','#btn-cancelar-medio', function () {

            $(".btn_agregar_medio").slideDown('slow');
            $("#div_medio").slideUp('slow');
            $("#div_agregar_medio").slideUp('slow');
            $(".btn_eliminar_medio").attr('disabled',false);
            $("#nombre_opcional").val('');

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
            $.get("{{ URL::Route('lotes-getListado') }}",
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
            $.get("{{ URL::route('lotes-getCrear') }}",
                    {
                      id:id,
                    },
                    function (data) {
                        $('#contenedor_lotes').hide().html(data).slideDown('slow');
                        $("#id_lotes_perfil").val({{ $productor->id }});
                    }
            );
        };


        //limpiar capos
        function limpiarCamposLotes() {

          $("#id_loteActualizarProd")     .val('');
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
          $("#notas_variedad1")           .val('');
          $("#notas_variedad2")           .val('');
          $("#notas_variedad3")           .val('');
          $("#perfilEstado")              .text('');

          $("#actualizarPerfilUrl").text('');
          $("#actualizarPerfilUrl").attr("href","#");

        };

        //animacion del contenedor de registro
        $(document).on('click','.btn_agregar_lotes',function () {

            $(".btn_agregar_lotes").slideUp('slow');
            $("#contenedor_registro_lote").slideDown('slow');
            $("#btn-actualizar-lote").slideUp('slow');
            $("#btn-agregar-lotes").slideDown('slow');
            $(".btn_actualizar_lote").attr('disabled','true');
            $(".btn_eliminar_lote").attr('disabled','true');
            $("#perfilEstado").slideUp('slow');
            $("#perfilEstado").text('');
            $("#perfilEstadoParaDescargar").slideUp('slow');

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_lote', function () {

          $("#perfilEstado").text($(this).attr('perfil'));

          if($("#perfilEstado").text() == '') {
            $("#perfilEstado").slideUp('slow');
            $("#perfilEstado").text('');
            $("#perfilEstadoParaDescargar").slideUp('slow');
          } else {
            $("#perfilEstado").text($(this).attr('perfil'));
            $("#actualizarPerfilUrl").text($(this).attr('perfil'));
            $("#actualizarPerfilUrl").attr("href","/medios_lotes/"+$(this).attr('perfil'));
            $("#perfilEstadoParaDescargar").slideDown('slow');
          }

            $(".btn_agregar_lotes").slideUp('slow');
            $("#btn-agregar-lotes").slideUp('slow');
            $("#btn-actualizar-lote").slideDown('slow');
            $("#contenedor_registro_lote").slideDown('slow');
            $("#btn-agregar-lotes").val('Actualizar Lote');
            $("#btn-agregar-lotes").attr('accion','2');
            $(".btn_actualizar_lote").attr('disabled','true');
            $(".btn_eliminar_lote").attr('disabled','true');

            $("#id_loteActualizarProd")     .val($(this).attr('idLoteProductor'));
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
            $("#notas_variedad1")           .val($(this).attr('notas_variedad1'));
            $("#notas_variedad2")           .val($(this).attr('notas_variedad2'));
            $("#notas_variedad3")           .val($(this).attr('notas_variedad3'));

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_lote', function () {

            $("#id_lote").val($(this).attr('id_lote'));
            $("#id_perfil_lote_eliminar").val($(this).attr('perfil'));
            toastr.error("¿Esta seguro que desea eliminar el lote?<br>" +
                    "<button class='btn-danger confirmarEliminarLote'>Confirmar eliminar</button>","LOTES");

        });

        //confirmar eliminar
        $(document).on('click','.confirmarEliminarLote', function () {

            var id = $("#id_lote").val();
            var perfil = $("#id_perfil_lote_eliminar").val();
            $.post("{{ URL::route('lotes-postEliminar') }}",
            {
              id: id,
              perfil:perfil,
            },
            function (data) {
              toastr.info("Eliminacion exitosa.", "LOTES");
              listadoLotes();
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
