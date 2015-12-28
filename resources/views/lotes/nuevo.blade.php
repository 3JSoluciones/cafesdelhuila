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

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Variedad 1</label><br>
                <select name="variedad1" id="variedad1" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Variedad 2</label><br>
                <select name="variedad2" id="variedad2" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Variedad 3</label><br>
                <select name="variedad3" id="variedad3" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>
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
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Tipo Beneficio</label><br>
                <select name="tipo_beneficio_id" id="tipo_beneficio_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Tipo Secado</label><br>
                <select name="tipo_secado_id" id="tipo_secado_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>
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
            <input type="button" value="Agregar Lote" class="btn btn-primary btn-sm">
        </div>
    </div>

@stop