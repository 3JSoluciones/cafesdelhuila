<form class="formValidation">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" id="id_finca" name="id_finca">

    <div id="contenedor_registro_finca" style="display: none">

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Corregimiento</label>
                    <input type="text" class="k-textbox" id="corregimiento" name="orregimiento"
                           placeholder="Ingrese el nombre del corregimiento" style="width: 100%"
                           validationMessage="El campo {0} es obligatorio">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Vereda</label>
                    <input type="text" class="k-textbox" id="vereda" name="vereda"
                           placeholder="Ingrese el nombre de la vereda" style="width: 100%"
                           validationMessage="El campo {0} es obligatorio">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Finca</label>
                    <input type="text" class="k-textbox" id="finca" name="finca"
                           placeholder="Ingrese el nombre de la finca" style="width: 100%"
                           validationMessage="El campo {0} es obligatorio">
                           <h6 id="mgs_fincasFinca" style="color:#ccc; display:none;">recuerde que el campo es obligatorio</h6>
                </div>
            </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Longitud</label>
                <input type="text" class="k-textbox" id="longitud" name="longitud"
                       placeholder="Ingrese las Longitud" style="width: 100%"
                       validationMessage="El campo {0} es obligatorio">
            </div>
        </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Latitud</label>
                    <input type="text" class="k-textbox" id="latitud" name="latitud"
                           placeholder="Ingrese las Latitud" style="width: 100%"
                           validationMessage="El campo {0} es obligatorio">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Altitud</label>
                    <input type="text" class="k-textbox" id="altitud" name="altitud"
                           placeholder="Ingrese la altitud" style="width: 100%"
                           validationMessage="El campo {0} es obligatorio">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="date">Inicio de la Cosecha</label>
                    <input type='date' class="form-control" id='inicioCosecha' name="inicioCosecha"
                           validationMessage="El campo Inicio de la Cosecha es obligatorio" />
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="date">Finalizacion de la Cosecha</label>
                    <input type='date' class="form-control" id='finCosecha' name="finCosecha"
                           validationMessage="El campo Finalizacion de la Cosecha es obligatorio"/>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="date">Inicio de la Mitaca</label>
                    <input type='date' class="form-control" id='inicioMitaca' name="inicioMitaca"
                           validationMessage="El campo Inicio de la Mitaca es obligatorio"/>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="date">Finalizacion de la Mitaca</label>
                    <input type='date' class="form-control" id='finMitaca' name="finMitaca"
                           validationMessage="El campo Finalizacion de la Mitaca es obligatorio"/>
                </div>
            </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Departamento</label>
                <select name="departamento_id" id="departamento_id" class="select" style="width: 100%"
                        validationMessage="El campo departamento es obligatorio" >
                    <option value="">Seleccione..</option>

                    @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                    @endforeach

                </select>
                <h6 id="mgs_fincasDepar" style="color:#ccc; display:none;">recuerde que el campo es obligatorio</h6>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Municipio</label>
                <select name="municipio_id" id="municipio_id" class="select" style="width: 100%"
                        validationMessage="El campo municipio es obligatorio" >
                    <option value="">Seleccione..</option>

                    @foreach($municipios as $municipio)
                        <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                    @endforeach

                </select>
                <h6 id="mgs_fincasMuni" style="color:#ccc; display:none;">recuerde que el campo es obligatorio</h6>
            </div>
        </div>


            <div class="col-lg-12 text-right">
                <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                       id="btn-cancelar-finca">
                <input type="button" value="Agregar Finca" class="btn btn-primary btn-sm"
                       id="btn-agregar-finca" accion="1">
            </div>
        </div>


        <div class="col-lg-12 text-right">
            <br><input type="button" value="+ Agregar Finca"
                   class="btn_agregar_finca btn btn-primary btn-sm" ><hr>
        </div>

</form>
