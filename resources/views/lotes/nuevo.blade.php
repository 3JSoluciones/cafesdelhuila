@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Lotes</li>
            </ol>
        </div>
    </div>

    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <input type="hidden" id="id_lote" name="id_lote">

  <div id="contenedor_registro_lote" style="display: none">

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Variedad 1</label>
                <select name="variedad1" id="variedad1" class="select"
                        validationMessage="El campo {0} es obligatorio" required style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($variedades as $variedad)
                        <option value="{{ $variedad->id }}">{{ $variedad->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Variedad 2</label>
                <select name="variedad2" id="variedad2" class="select" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($variedades as $variedad)
                        <option value="{{ $variedad->id }}">{{ $variedad->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Variedad 3</label>
                <select name="variedad3" id="variedad3" class="select" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($variedades as $variedad)
                        <option value="{{ $variedad->id }}">{{ $variedad->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Cantidad de arboles por variedad 1</label>
                <input type="text" class="k-textbox" id="cantidad_aboles_variedad1" name="cantidad_aboles_variedad1"
                       required validationMessage="El campo Cantidad de arboles es obligatorio"
                       placeholder="Ingrese" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Cantidad de arboles por variedad 2</label>
                <input type="text" class="k-textbox" id="cantidad_aboles_variedad2" name="cantidad_aboles_variedad2" placeholder="Ingrese" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Cantidad de arboles por variedad 3</label>
                <input type="text" class="k-textbox" id="cantidad_aboles_variedad3" name="cantidad_aboles_variedad3" placeholder="Ingrese" style="width: 100%">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Finca</label>
                <select name="finca_id" id="finca_id" class="select"
                        validationMessage="El campo finca es obligatorio" requiredstyle="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($fincas as $finca)
                        <option value="{{ $finca->id }}">{{ $finca->finca }} </option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Tipo Beneficio</label>
                <select name="tipo_beneficio_id" id="tipo_beneficio_id" class="select"
                        validationMessage="El campo tipo beneficio es obligatorio" required style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($tiposBeneficios as $tipoBeneficio)
                        <option value="{{ $tipoBeneficio->id }}">{{ $tipoBeneficio->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Tipo Secado</label>
                <select name="tipo_secado_id" id="tipo_secado_id" class="select"
                        validationMessage="El campo tipo secado es obligatorio" required style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($tiposSecados as $tipoSecado)
                        <option value="{{ $tipoSecado->id }}">{{ $tipoSecado->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text" class="k-textbox" id="nombre" name="nombre"
                       required validationMessage="El campo {0} es obligatorio"
                       placeholder="Ingrese el nombre" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Area</label>
                <input type="text" class="k-textbox" id="area" name="area"
                       required validationMessage="El campo {0} es obligatorio"
                       placeholder="Ingrese la area" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Perfil</label>
                <input type="text" class="k-textbox" id="perfil" name="perfil"
                       required validationMessage="El campo {0} es obligatorio"
                       placeholder="Ingrese el perfil" style="width: 100%">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-lote">
            <input type="button" value="Agregar Lote" class="btn btn-primary btn-sm"
                    id="btn-agregar-lotes" accion="1">
        </div>
    </div>

    </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Lote"
                       class="btn_agregar_lotes btn btn-primary btn-sm">
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_lote" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>NOMBRE</th>
                        <th>AREA</th>
                        <th>FINCA</th>
                        <th>TP.BENEF</th>
                        <th>TP.SECAD</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lotes as $lote)
                        <tr>
                            <td>{{ $lote->id }}</td>
                            <td>{{ $lote->nombre }}</td>
                            <td>{{ $lote->area }}</td>
                            <td>{{ $lote->finca->finca }}</td>
                            <td>{{ $lote->tipo_beneficio->nombre }}</td>
                            <td>{{ $lote->tipo_secado->nombre }}</td>
                            <td>{{ $lote->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_lote
                                btn btn-primary btn-sm"
                                       id                           ="{{ $lote->id }}"
                                       Finca_id                     ="{{ $lote->finca_id }}"
                                       <?php

                                       if($lote->variedad1_id == 0) { } else { ?> Variedad1_id ="{{ $lote->variedad1_id }}" <?php }
                                       if($lote->variedad2_id == 0) { } else { ?> Variedad2_id ="{{ $lote->variedad2_id }}" <?php }
                                       if($lote->variedad3_id == 0) { } else { ?> Variedad3_id ="{{ $lote->variedad3_id }}" <?php }

                                       ?>
                                       Tipo_beneficio_id            ="{{ $lote->tipo_beneficio_id }}"
                                       Tipo_secado_id               ="{{ $lote->tipo_secado_id }}"
                                       Cantidad_arboles_variedad1   ="{{ $lote->cantidad_arboles_variedad1 }}"
                                       Cantidad_arboles_variedad2   ="{{ $lote->cantidad_arboles_variedad2 }}"
                                       Cantidad_arboles_variedad3   ="{{ $lote->cantidad_arboles_variedad3 }}"
                                       Nombre                       ="{{ $lote->nombre }}"
                                       Area                         ="{{ $lote->area }}"
                                       Perfil                       ="{{ $lote->perfil }}"

                                        >
                                <input type="button" value="Eliminar" class="btn_eliminar_lote
                                btn btn-danger btn-sm" id_lote="{{ $lote->id }}">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </form>

    @section('page-js-code')

    <script type="application/javascript">

        //Establecer tabla con jquery table
        $('#tabla_lote').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //animacion del contenedor de registro
        $(".btn_agregar_lotes").click(function () {
            $(".btn_agregar_lotes").slideUp('slow');
            $("#contenedor_registro_lote").slideDown('slow');
            $(".btn_actualizar_lote").attr('disabled','true');
            $(".btn_eliminar_lote").attr('disabled','true');
        });

        //btn agregar y actualizar
        $("#btn-agregar-lotes").click(function(){

            var id                              = $("#id_lote").val();
            var Finca_id                        = $("#finca_id").val();
            var Variedad1_id                    = $("#variedad1").val();
            var Variedad2_id                    = $("#variedad2").val();
            var Variedad3_id                    = $("#variedad3").val();
            var Tipo_beneficio_id               = $("#tipo_beneficio_id").val();
            var Tipo_secado_id                  = $("#tipo_secado_id").val();
            var Cantidad_arboles_variedad1      = $("#cantidad_aboles_variedad1").val();
            var Cantidad_arboles_variedad2      = $("#cantidad_aboles_variedad2").val();
            var Cantidad_arboles_variedad3      = $("#cantidad_aboles_variedad3").val();
            var Nombre                          = $("#nombre").val();
            var Area                            = $("#area").val();
            var Perfil                          = $("#perfil").val();

            if($("#btn-agregar-lotes").attr('accion') == 1) {

                if (validator.validate()) {
                    //btn agregar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/lotes',
                        data: {
                            Finca_id: Finca_id,
                            Variedad1_id: Variedad1_id,
                            Variedad2_id: Variedad2_id,
                            Variedad3_id: Variedad3_id,
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
                            self.location = "http://cafesdelhuila.com/lotes/create";
                        }
                    });
                }

            } else {

                if (validator.validate()) {
                    //btn actualizar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/lotes/' + id + '',
                        data: {
                            id: id,
                            Finca_id: Finca_id,
                            Variedad1_id: Variedad1_id,
                            Variedad2_id: Variedad2_id,
                            Variedad3_id: Variedad3_id,
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
                            self.location = "http://cafesdelhuila.com/lotes/create";
                        }
                    });
                }

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
                    self.location="http://cafesdelhuila.com/lotes/create";
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

            $("#id_lote")                   .val('');
            $("#finca_id")                  .val('');
            $("#variedad1")                 .val('');
            $("#variedad2")                 .val('');
            $("#variedad3")                 .val('');
            $("#tipo_beneficio_id")         .val('');
            $("#tipo_secado_id")            .val('');
            $("#cantidad_aboles_variedad1") .val('');
            $("#cantidad_aboles_variedad2") .val('');
            $("#cantidad_aboles_variedad3") .val('');
            $("#nombre")                    .val('');
            $("#area")                      .val('');
            $("#perfil")                    .val('');

        });


    </script>

    @stop

@stop