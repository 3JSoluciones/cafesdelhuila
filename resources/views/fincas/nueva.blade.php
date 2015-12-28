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

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Productor</label><br>
                <select name="productor_id" id="productor_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Departamento</label><br>
                <select name="departamento_id" id="departamento_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Municipio</label><br>
                <select name="municipio_id" id="municipio_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>
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
            <input type="button" value="Agregar Variedad" class="btn btn-primary btn-sm">
        </div>
    </div>

<script type="text/javascript">

    $(document).ready(function () {
        $('#inicioCosecha').datetimepicker();
        $('#finCosecha').datetimepicker();
        $('#inicioMitaca').datetimepicker();
        $('#finMitaca').datetimepicker();
    });

</script>

@stop

