<form class="formValidation">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" id="id_certProd" name="id_certProd">

    <div id="contenedor_registro_certiProduct" style="display: none">


            <div class="col-lg-12">
                <div class="form-group">
                    <label for="input">Certificacion</label>
                    <select name="certificacion_id" id="certificacion_id" class="select" style="width: 100%"
                            required validationMessage="El campo certificacion es obligatorio">
                        <option value="">Seleccione..</option>
                        <!--<optgroup label="Grupo de certificaciones">-->
                        @foreach($certificaciones as $certificacion)
                            <option value="{{ $certificacion->id }}">{{ $certificacion->nombre }}</option>
                            @endforeach
                                    <!--</optgroup>-->
                    </select>
                    <h6 id="mgs_certifiProductores" style="color:#ccc; display:none;">recuerde que el campo es obligatorio</h6>
                </div>
            </div>

            <div class="col-lg-12 text-right">
                <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                       id="btn-cancelar-certiProd">
                <input type="button" value="Agregar Certificacion al Productor" class="btn btn-primary btn-sm"
                       id="btn-agregar-certificacionProductor" accion="1">
            </div>
        </div>


        <div class="col-lg-12 text-right">
            <br><input type="button" value="+ Agregar Certificacion al Productor"
                   class="btn_agregar_certificacionProductor btn btn-primary btn-sm" >
            <hr>
        </div>

</form>
