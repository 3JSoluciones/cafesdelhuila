@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Lotes</li>
            </ol>
        </div>
    </div>
    <p><label>REGISTRO DE LOTES</label></p>

    <form>
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="toke" >

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Variedad 1</label><br>
                <select name="variedad1" id="variedad1" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($variedades as $variedad)
                        <option value="{{ $variedad->id }}">{{ $variedad->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Variedad 2</label><br>
                <select name="variedad2" id="variedad2" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($variedades as $variedad)
                        <option value="{{ $variedad->id }}">{{ $variedad->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Variedad 3</label><br>
                <select name="variedad3" id="variedad3" class="form-control" style="width: 100%">
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
                <label for="input">Cantidad de arboles por variedad 1</label><br>
                <input type="text" class="form-control" id="cantidad_aboles_variedad1" name="cantidad_aboles_variedad1" required="required"
                       placeholder="Ingrese" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Cantidad de arboles por variedad 2</label><br>
                <input type="text" class="form-control" id="cantidad_aboles_variedad2" name="cantidad_aboles_variedad2" required="required"
                       placeholder="Ingrese" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Cantidad de arboles por variedad 3</label><br>
                <input type="text" class="form-control" id="cantidad_aboles_variedad3" name="cantidad_aboles_variedad3" required="required"
                       placeholder="Ingrese" style="width: 100%">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Finca</label><br>
                <select name="finca_id" id="finca_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($fincas as $finca)
                        <option value="{{ $finca->id }}">{{ $finca->finca }} </option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Tipo Beneficio</label><br>
                <select name="tipo_beneficio_id" id="tipo_beneficio_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($tiposBeneficios as $tipoBeneficio)
                        <option value="{{ $tipoBeneficio->id }}">{{ $tipoBeneficio->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Tipo Secado</label><br>
                <select name="tipo_secado_id" id="tipo_secado_id" class="form-control" style="width: 100%">
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
                <label for="input">Nombre</label><br>
                <input type="text" class="form-control" id="nombre" name="nombre" required="required"
                       placeholder="Ingrese el nombre" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Area</label><br>
                <input type="text" class="form-control" id="area" name="area" required="required"
                       placeholder="Ingrese la area" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Perfil</label><br>
                <input type="text" class="form-control" id="perfil" name="perfil" required="required"
                       placeholder="Ingrese el perfil" style="width: 100%">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Agregar Lote" class="btn btn-primary btn-sm"
                    id="btn-agregar-lotes">
        </div>
    </div>

    </form>

    @section('page-js-code')

    <script type="application/javascript">

        $("#btn-agregar-lotes").click(function(){

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

            $.ajax({
                url: 'http://cafesdelhuila.com/lotes',
                data:{
                    Finca_id:Finca_id,
                    Variedad1_id:Variedad1_id,
                    Variedad2_id:Variedad2_id,
                    Variedad3_id:Variedad3_id,
                    Tipo_beneficio_id:Tipo_beneficio_id,
                    Tipo_secado_id:Tipo_secado_id,
                    Cantidad_arboles_variedad1:Cantidad_arboles_variedad1,
                    Cantidad_arboles_variedad2:Cantidad_arboles_variedad2,
                    Cantidad_arboles_variedad3:Cantidad_arboles_variedad3,
                    Nombre:Nombre,
                    Area:Area,
                    Perfil:Perfil,
                },
                headers:{'X-CSRF-TOKEN': toke},
                dataType:'json',
                type:'POST',
                success:function(data) {
                    toastr.info("El lote " + nombre + " se agrego con exito.","REGISTRO DE LOTES");
                    $("#finca_id").val('');
                    $("#variedad1").val('');
                    $("#variedad2").val('');
                    $("#variedad3").val('');
                    $("#tipo_beneficio_id").val('');
                    $("#tipo_secado_id").val('');
                    $("#cantidad_aboles_variedad1").val('');
                    $("#cantidad_aboles_variedad2").val('');
                    $("#cantidad_aboles_variedad3").val('');
                    $("#nombre").val('');
                    $("#area").val('');
                    $("#perfil").val('');
                }
            });
        });


    </script>

    @stop

@stop