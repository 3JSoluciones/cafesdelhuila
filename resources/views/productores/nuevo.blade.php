@extends('layouts.main')

@section('content')

    <p><label>REGISTRO DE PRODUCTORES</label></p>

    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label for="input">Nombre</label><br>
                <input type="text" class="k-textbox" id="nombre" name="nombre" required="required"
                       placeholder="Ingrese el Nombre" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="input">Telefono</label><br>
                <input type="text" class="k-textbox" id="telefono" name="telefono" required="required"
                       placeholder="Ingrese el telefono" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="input">Organizacion</label><br>
                <select name="organizacion_id" id="organizacion_id" style="width: 100%">
                    <option value="">Seleccione..</option>
                </select>
            </div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label for="input">Correo Electronico</label><br>
                <input type="email" class="k-textbox" id="email" name="email" required="required"
                       placeholder="ejemplo@outlook.com" style="width: 100%">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Agregar Productor" class="btn btn-primary btn-sm">
        </div>
    </div>

@stop