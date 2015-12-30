@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Fincas</li>
            </ol>
        </div>
    </div>
    <p><label>REGISTRO DE FINCAS</label></p>

    <form>
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="toke" >

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Productor</label><br>
                <select name="productor_id" id="productor_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($productores as $productor)
                        <option value="{{ $productor->id }}">{{ $productor->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Departamento</label><br>
                <select name="departamento_id" id="departamento_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Municipio</label><br>
                <select name="municipio_id" id="municipio_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($municipios as $municipio)
                        <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Corregimiento</label><br>
                <input type="text" class="form-control" id="corregimiento" name="orregimiento" required="required"
                       placeholder="Ingrese el nombre del corregimiento" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Vereda</label><br>
                <input type="text" class="form-control" id="vereda" name="vereda" required="required"
                       placeholder="Ingrese el nombre de la vereda" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Finca</label><br>
                <input type="text" class="form-control" id="finca" name="finca" required="required"
                       placeholder="Ingrese el nombre de la finca" style="width: 100%">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Coordenadas</label><br>
                <input type="text" class="form-control" id="coordenadas" name="coordenadas" required="required"
                       placeholder="Ingrese las coordenadas" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Altitud</label><br>
                <input type="text" class="form-control" id="altitud" name="altitud" required="required"
                       placeholder="Ingrese la altitud" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="date">Inicio de la Cosecha</label><br>
                <input type='date' class="form-control" id='inicioCosecha' />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="date">Finalizacion de la Cosecha</label><br>
                <input type='date' class="form-control" id='finCosecha' />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="date">Inicio de la Mitaca</label><br>
                <input type='date' class="form-control" id='inicioMitaca' />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="date">Finalizacion de la Mitaca</label><br>
                <input type='date' class="form-control" id='finMitaca' />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Agregar Variedad" class="btn btn-primary btn-sm"
                    id="btn-agregar-finca">
        </div>
    </div>

    </form>

    @section('page-js-code')

    <script type="application/javascript">

        $("#btn-agregar-finca").click(function(){

            var Productor_id            = $("#productor_id").val();
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

            $.ajax({
                url: 'http://cafesdelhuila.com/fincas',
                data:{
                    Productor_id:Productor_id,
                    Departamento_id:Departamento_id,
                    Municipio_id:Municipio_id,
                    Corregimiento:Corregimiento,
                    Vereda:Vereda,
                    Finca:Finca,
                    Coordenadas:Coordenadas,
                    Altitud:Altitud,
                    Cosecha_comienza:Cosecha_comienza,
                    Cosecha_termina:Cosecha_termina,
                    Mitaca_comienza:Mitaca_comienza,
                    Mitaca_termina:Mitaca_termina,
                },
                headers:{'X-CSRF-TOKEN': toke},
                dataType:'json',
                type:'POST',
                success:function(data) {
                    toastr.info("La finca " + Finca + " se agrego con exito.","REGISTRO DE FINCAS");
                    $("#productor_id").val('');
                    $("#departamento_id").val('');
                    $("#municipio_id").val('');
                    $("#corregimiento").val('');
                    $("#vereda").val('');
                    $("#finca").val('');
                    $("#coordenadas").val('');
                    $("#altitud").val('');
                    $("#inicioCosecha").val('');
                    $("#finCosecha").val('');
                    $("#inicioMitaca").val('');
                    $("#finMitaca").val('');
                }
            });
        });


    </script>

    @stop

@stop

