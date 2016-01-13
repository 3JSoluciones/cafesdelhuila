<form class="formValidation">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" id="id_lote" name="id_lote">

    <div id="contenedor_registro_lote" style="display: none">

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Variedad 1</label>
                    <select name="variedad1" id="variedad1" class="select"
                            validationMessage="El campo {0} es obligatorio" required style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($variedades as $variedad)
                            <option value="{{ $variedad->id }}">{{ $variedad->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Variedad 2</label>
                    <select name="variedad2" id="variedad2" class="select" style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($variedades as $variedad)
                            <option value="{{ $variedad->id }}">{{ $variedad->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Variedad 3</label>
                    <select name="variedad3" id="variedad3" class="select" style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($variedades as $variedad)
                            <option value="{{ $variedad->id }}">{{ $variedad->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Cantidad de arboles por variedad 1</label>
                    <input type="text" class="k-textbox" id="cantidad_aboles_variedad1" name="cantidad_aboles_variedad1"
                           required validationMessage="El campo Cantidad de arboles es obligatorio"
                           placeholder="Ingrese" style="width: 100%">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Cantidad de arboles por variedad 2</label>
                    <input type="text" class="k-textbox" id="cantidad_aboles_variedad2" name="cantidad_aboles_variedad2" placeholder="Ingrese" style="width: 100%">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Cantidad de arboles por variedad 3</label>
                    <input type="text" class="k-textbox" id="cantidad_aboles_variedad3" name="cantidad_aboles_variedad3" placeholder="Ingrese" style="width: 100%">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Finca</label>
                    <select name="finca_id" id="finca_id" class="select"
                            validationMessage="El campo finca es obligatorio" required style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($fincas as $finca)
                            <option value="{{ $finca->id }}">{{ $finca->finca }} </option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Tipo Beneficio</label>
                    <select name="tipo_beneficio_id" id="tipo_beneficio_id" class="select"
                            validationMessage="El campo tipo beneficio es obligatorio" required style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($tiposBeneficios as $tipoBeneficio)
                            <option value="{{ $tipoBeneficio->id }}">{{ $tipoBeneficio->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Tipo Secado</label>
                    <select name="tipo_secado_id" id="tipo_secado_id" class="select"
                            validationMessage="El campo tipo secado es obligatorio" required style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($tiposSecados as $tipoSecado)
                            <option value="{{ $tipoSecado->id }}">{{ $tipoSecado->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Acidez</label>
                    <select name="acidez_id" id="acidez_id" class="select"
                            validationMessage="El campo acidez es obligatorio" required style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($acidezes as $acidez)
                            <option value="{{ $acidez->id }}">{{ $acidez->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Aroma</label>
                    <select name="aroma_id" id="aroma_id" class="select"
                            validationMessage="El campo aroma es obligatorio" required style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($aromas as $aroma)
                            <option value="{{ $aroma->id }}">{{ $aroma->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Sabor</label>
                    <select name="sabor_id" id="sabor_id" class="select"
                            validationMessage="El campo sabor es obligatorio" required style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($sabores as $sabor)
                            <option value="{{ $sabor->id }}">{{ $sabor->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Nombre</label>
                    <input type="text" class="k-textbox" id="nombre" name="nombre"
                           required validationMessage="El campo {0} es obligatorio"
                           placeholder="Ingrese el nombre" style="width: 100%">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Area</label>
                    <input type="text" class="k-textbox" id="area" name="area"
                           required validationMessage="El campo {0} es obligatorio"
                           placeholder="Ingrese la area" style="width: 100%">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Perfil</label>
                    <input type="text" class="k-textbox" id="perfil" name="perfil"
                           required validationMessage="El campo {0} es obligatorio"
                           placeholder="Ingrese el perfil" style="width: 100%">
                </div>
            </div>

            <div class="col-lg-12 text-right">
                <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                       id="btn-cancelar-lote">
                <input type="button" value="Agregar Lote" class="btn btn-primary btn-sm"
                       id="btn-agregar-lotes" accion="1">
            </div>
        </div>


        <div class="col-lg-12 text-right">
            <input type="button" value="+ Agregar Lote"
                   class="btn_agregar_lotes btn btn-primary btn-sm">
            <hr>
        </div>



</form>