@extends('layouts.main')

@section('content')

    <p><label>REGISTRO DE AROMAS</label></p>

    <div class="row">
        <div class="col-lg-3">

            <div class="form-group">
                <label for="input">Nombre</label><br>
                <input type="text" class="k-textbox" id="nombre" name="nombre" required="required"
                       placeholder="Ingrese el Nombre" style="width: 100%">
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Agregar Aroma" class="btn btn-primary btn-sm">
        </div>
    </div>

@stop