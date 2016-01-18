<form class="fileMedios" method="POST" action="{{ URL::route('mediosProductor-postCrear')}}" accept-charset="UTF-8" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div id="div_medio" style="display: none;">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="exampleInputFile" >Archivo</label>
                <input type="file" name="medio" id="medio" required>
                <input type="hidden" id="id_productor_Medios" name="id_productor_Medios">
                <p class="help-block" style="color: #b9b9b9">Por favor seleccione un archivo de su equipo.</p>
            </div>
        </div>

        <div class="col-lg-8" >
            <div class="form-group">
                <label >Acciones</label>
                <button type="submit" id="btn-agregar-medio" class="btn btn-primary btn-sm">Agregar Medio</button>
                <button type="button" id="btn-cancelar-medio" class="btn btn-danger btn-sm">Cancelar</button>
            </div>
        </div>
    </div>

    <div class="col-lg-12 text-right">
        <input type="button" value="+ Agregar Medio"
               class="btn_agregar_medio btn btn-primary btn-sm" >
        <hr>
    </div>
</form>
