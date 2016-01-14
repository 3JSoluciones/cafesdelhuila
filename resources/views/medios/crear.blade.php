<link href="/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<form class="fileMedios" method="POST" action="http://cafesdelhuila.com/medios/create" accept-charset="UTF-8" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="col-lg-6" id="div_medio" style="display: none;">
        <div class="form-group">
            <label for="exampleInputFile">Archivo</label>
            <input type="file" class="form-control" name="file" id="file">
            <input type="hidden" id="id_productor_Medios" name="id_productor_Medios">
            <p class="help-block">Por favor seleccione un archivo de su equipo.</p>
        </div>
    </div>

    <div class="col-lg-12 text-right" id="div_agregar_medio" style="display: none;">
        <button type="button" id="btn-cancelar-medio" class="btn btn-danger btn-sm">Cancelar</button>
        <button type="submit" id="btn-agregar-medio" class="btn btn-primary btn-sm">Agregar Medio</button>
    </div>

    <div class="col-lg-12 text-right">
        <br><input type="button" value="+ Agregar Medio"
                   class="btn_agregar_medio btn btn-primary btn-sm" >
        <hr>
    </div>

</form>

