<form class="formValidationMedios">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="col-lg-6" id="div_medio" style="display: none;">
        <div class="form-group">
            <label for="exampleInputFile">Archivo</label>
            <input type="file" id="nombre" name="nombre" class="k-textbox"
                   required validationMessage="El campo {0} es obligatorio">
            <p class="help-block">Por favor seleccione un archivo de su equipo.</p>
        </div>
    </div>

    <div class="col-lg-12 text-right" id="div_agregar_medio" style="display: none;">
        <input type="button" value="Agregar Medio" class="btn btn-primary btn-sm"
               id="btn-agregar-medio">
    </div>

    <div class="col-lg-12 text-right">
        <input type="button" value="+ Agregar Medio"
               class="btn_agregar_medio btn btn-primary btn-sm" >
        <hr>
    </div>

</form>
