@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Medios</li>
            </ol>
        </div>
    </div>
    <p><label>REGISTRO DE MEDIOS</label></p>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="input">Productor</label><br>
                <select name="productor_id" id="productor_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputFile">Archivo</label>
                <input type="file" id="nombre" name="nombre">
                <p class="help-block">Por favor seleccione un archivo de su equipo.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Agregar Medio" class="btn btn-primary btn-sm">
        </div>
    </div>

@stop
