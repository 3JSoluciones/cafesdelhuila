<form class="formValidation" method="POST" action="{{ URL::route('lotes-postCrear')}}" accept-charset="UTF-8" enctype="multipart/form-data">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" id="id_loteActualizarProd" name="id_loteActualizarProd">

    <div id="contenedor_registro_lote" style="display: none">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Variedad 1</label>
                    <select name="variedad1" id="variedad1" class="select" required="required"
                            validationMessage="El campo {0} es obligatorio"  style="width: 100%">
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
                            validationMessage="El campo Cantidad de arboles es obligatorio" required="required"
                           placeholder="Ingrese la variedad" style="width: 100%">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Cantidad de arboles por variedad 2</label>
                    <input type="text" class="k-textbox" id="cantidad_aboles_variedad2" name="cantidad_aboles_variedad2"
                           placeholder="Ingrese la variedad" style="width: 100%">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Cantidad de arboles por variedad 3</label>
                    <input type="text" class="k-textbox" id="cantidad_aboles_variedad3" name="cantidad_aboles_variedad3"
                           placeholder="Ingrese la variedad" style="width: 100%">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Notas variedad 1</label>
                    <input type="text" class="k-textbox" id="notas_variedad1" name="notas_variedad1"
                           placeholder="Ingrese las notas" style="width: 100%">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Notas variedad 2</label>
                    <input type="text" class="k-textbox" id="notas_variedad2" name="notas_variedad2"
                           placeholder="Ingrese las notas" style="width: 100%">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Notas variedad 3</label>
                    <input type="text" class="k-textbox" id="notas_variedad3" name="notas_variedad3"
                           placeholder="Ingrese las notas" style="width: 100%">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Finca</label>
                    <select name="finca_id" id="finca_id" class="select" required="required"
                            validationMessage="El campo finca es obligatorio"  style="width: 100%">
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
                    <select name="tipo_beneficio_id" id="tipo_beneficio_id" class="select" required="required"
                            validationMessage="El campo tipo beneficio es obligatorio"  style="width: 100%">
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
                    <select name="tipo_secado_id" id="tipo_secado_id" class="select" required="required"
                            validationMessage="El campo tipo secado es obligatorio"  style="width: 100%">
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
                    <select name="acidez_id" id="acidez_id" class="select" required="required"
                            validationMessage="El campo acidez es obligatorio"  style="width: 100%">
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
                    <select name="aroma_id" id="aroma_id" class="select" required="required"
                            validationMessage="El campo aroma es obligatorio"  style="width: 100%">
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
                    <select name="sabor_id" id="sabor_id" class="select" required="required"
                            validationMessage="El campo sabor es obligatorio"  style="width: 100%">
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
                            validationMessage="El campo {0} es obligatorio" required="required"
                           placeholder="Ingrese el nombre" style="width: 100%">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Area</label>
                    <input type="text" class="k-textbox" id="area" name="area" style="width:100%;"
                            validationMessage="El campo {0} es obligatorio"
                           placeholder="Ingrese la area">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="exampleInputFile" >Perfil</label>
                    <input type="file"class="k-textbox" name="perfil" id="perfil" style="width:100%;">
                    <input type="hidden" id="id_lotes_perfil" name="id_lotes_perfil">
                    <h6>
                      <b>
                        <div id="perfilEstado" style="color:#ccc; display:none;"></div>
                        <div id="perfilEstadoParaDescargar">
                          <a href="#" id="actualizarPerfilUrl" target="newwindow"></a>
                          <span class="label label-default">Click para - [DESCARGAR]</span>
                        </div>
                      </b>
                    </h6>
                </div>
            </div>

            <div class="col-lg-12 text-right">
                <input  type="button" value="Cancelar" class="btn btn-danger btn-sm"id="btn-cancelar-lote">
                <button type="submit" id="btn-agregar-lotes"   class="btn btn-primary btn-sm">Agregar Lote al Productor</button>
                <button type="submit" id="btn-actualizar-lote" class="btn btn-primary btn-sm" style="display:none;">Actualizar Lote del Productor</button>
                <input  type="hidden" id="lote_actualizar" value="1">
                <input  type="hidden" id="id_lote_actualizar">
                <input  type="hidden" id="id_perfil_lote_eliminar">

            </div>
        </div>


        <div class="col-lg-12 text-right">
            <input type="button" value="+ Agregar Lote"
                   class="btn_agregar_lotes btn btn-primary btn-sm">
            <hr>
        </div>
</form>
