@extends('layouts.main')

@section('content')

    <p><label>REGISTRO DE VARIEDADES</label></p>

        <div class="row">
            <div class="col-lg-3">

                <div class="form-group">
                    <label for="input">Acidez</label><br>
                    <select name="acidez_id" id="acidez_id" style="width: 100%">
                        <option value="">Seleccione..</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="input">Aroma</label><br>
                    <select name="aroma_id" id="aroma_id" style="width: 100%">
                        <option value="">Seleccione..</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="input">Sabor</label><br>
                    <select name="sabor_id" id="sabor_id" style="width: 100%"><option value="">Seleccione..</option>
                    </select>
                </div>

            </div>
        </div>

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
                <input type="button" value="Agregar Variedad" class="btn btn-primary btn-sm">
        </div>
    </div>

@stop