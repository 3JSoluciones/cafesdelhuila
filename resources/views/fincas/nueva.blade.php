@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Fincas</li>
            </ol>
        </div>
    </div>

    <form>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <input type="hidden" id="id_finca" name="id_finca">

   <div id="contenedor_registro_finca" style="display: none">

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Productor</label>
                <select name="productor_id" id="productor_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($productores as $productor)
                        <option value="{{ $productor->id }}">{{ $productor->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Departamento</label>
                <select name="departamento_id" id="departamento_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Municipio</label>
                <select name="municipio_id" id="municipio_id" class="form-control" style="width: 100%">
                    <option value="">Seleccione..</option>

                    @foreach($municipios as $municipio)
                        <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Corregimiento</label>
                <input type="text" class="form-control" id="corregimiento" name="orregimiento" required="required"
                       placeholder="Ingrese el nombre del corregimiento" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Vereda</label>
                <input type="text" class="form-control" id="vereda" name="vereda" required="required"
                       placeholder="Ingrese el nombre de la vereda" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Finca</label>
                <input type="text" class="form-control" id="finca" name="finca" required="required"
                       placeholder="Ingrese el nombre de la finca" style="width: 100%">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Coordenadas</label>
                <input type="text" class="form-control" id="coordenadas" name="coordenadas" required="required"
                       placeholder="Ingrese las coordenadas" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="input">Altitud</label>
                <input type="text" class="form-control" id="altitud" name="altitud" required="required"
                       placeholder="Ingrese la altitud" style="width: 100%">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="date">Inicio de la Cosecha</label>
                <input type='date' class="form-control" id='inicioCosecha' />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="date">Finalizacion de la Cosecha</label>
                <input type='date' class="form-control" id='finCosecha' />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="date">Inicio de la Mitaca</label>
                <input type='date' class="form-control" id='inicioMitaca' />
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="date">Finalizacion de la Mitaca</label>
                <input type='date' class="form-control" id='finMitaca' />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-finca">
            <input type="button" value="Agregar Variedad" class="btn btn-primary btn-sm"
                    id="btn-agregar-finca" accion="1">
        </div>
    </div>

    </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Variedad"
                       class="btn_agregar_finca btn btn-primary btn-sm" >
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_finca" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>FINCA</th>
                        <th>PRODUCTOR</th>
                        <th>DEPAR</th>
                        <th>MUNI</th>
                        <th>CORRE</th>
                        <th>VER</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fincas as $finca)
                        <tr>
                            <td>{{ $finca->id }}</td>
                            <td>{{ $finca->finca }}</td>
                            <td>{{ $finca->productor->nombre }}</td>
                            <td>{{ $finca->departamento->nombre }}</td>
                            <td>{{ $finca->municipio->nombre }}</td>
                            <td>{{ $finca->corregimiento }}</td>
                            <td>{{ $finca->vereda }}</td>
                            <td>{{ $finca->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_finca
                                btn btn-primary btn-sm"
                                       id                   ="{{ $finca->id }}"
                                       Productor_id         ="{{ $finca->productor->id }}"
                                       Departamento_id      ="{{ $finca->departamento->id }}"
                                       Municipio_id         ="{{ $finca->municipio->id }}"
                                       Corregimiento        ="{{ $finca->corregimiento }}"
                                       Vereda               ="{{ $finca->vereda }}"
                                       Finca                ="{{ $finca->finca }}"
                                       Coordenadas          ="{{ $finca->coordenadas }}"
                                       Altitud              ="{{ $finca->altitud }}"
                                       Cosecha_comienza     ="{{ $finca->cosecha_comienza }}"
                                       Cosecha_termina      ="{{ $finca->cosecha_termina }}"
                                       Mitaca_comienza      ="{{ $finca->mitaca_comienza }}"
                                       Mitaca_termina       ="{{ $finca->mitaca_termina }}">
                                <input type="button" value="Eliminar" class="btn_eliminar_finca
                                btn btn-danger btn-sm" id_finca="{{ $finca->id }}">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </form>

    @section('page-js-code')

    <script type="application/javascript">

        //Establecer tabla con jquery table
        $('#tabla_finca').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //animacion del contenedor de registro
        $(".btn_agregar_finca").click(function () {
            $(".btn_agregar_finca").slideUp('slow');
            $("#contenedor_registro_finca").slideDown('slow');
        });

        //btn agregar y actualizar
        $("#btn-agregar-finca").click(function(){

            var id                      = $("#id_finca").val();
            var Productor_id            = $("#productor_id").val();
            var Departamento_id         = $("#departamento_id").val();
            var Municipio_id            = $("#municipio_id").val();
            var Corregimiento           = $("#corregimiento").val();
            var Vereda                  = $("#vereda").val();
            var Finca                   = $("#finca").val();
            var Coordenadas             = $("#coordenadas").val();
            var Altitud                 = $("#altitud").val();
            var Cosecha_comienza        = $("#inicioCosecha").val();
            var Cosecha_termina         = $("#finCosecha").val();
            var Mitaca_comienza         = $("#inicioMitaca").val();
            var Mitaca_termina          = $("#finMitaca").val();

            if($("#btn-agregar-finca").attr('accion') == 1) {

                //btn agregar
                $.ajax({
                    url: 'http://cafesdelhuila.com/fincas',
                    data:{
                        Productor_id:Productor_id,
                        Departamento_id:Departamento_id,
                        Municipio_id:Municipio_id,
                        Corregimiento:Corregimiento,
                        Vereda:Vereda,
                        Finca:Finca,
                        Coordenadas:Coordenadas,
                        Altitud:Altitud,
                        Cosecha_comienza:Cosecha_comienza,
                        Cosecha_termina:Cosecha_termina,
                        Mitaca_comienza:Mitaca_comienza,
                        Mitaca_termina:Mitaca_termina,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    type:'POST',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/fincas/create";
                    }
                });

            } else {

                //btn actualizar
                $.ajax({
                    url: 'http://cafesdelhuila.com/fincas/' + id + '',
                    data:{
                        id:id,
                        Productor_id:Productor_id,
                        Departamento_id:Departamento_id,
                        Municipio_id:Municipio_id,
                        Corregimiento:Corregimiento,
                        Vereda:Vereda,
                        Finca:Finca,
                        Coordenadas:Coordenadas,
                        Altitud:Altitud,
                        Cosecha_comienza:Cosecha_comienza,
                        Cosecha_termina:Cosecha_termina,
                        Mitaca_comienza:Mitaca_comienza,
                        Mitaca_termina:Mitaca_termina,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    type:'PUT',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/fincas/create";
                    }
                });

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_finca', function () {

            $(".btn_agregar_finca").slideUp('slow');
            $("#contenedor_registro_finca").slideDown('slow');
            $("#btn-agregar-finca").val('Actualizar Finca');
            $("#btn-agregar-finca").attr('accion','2');

            $("#id_finca")         .val($(this).attr('id'));
            $("#productor_id")      .val($(this).attr('Productor_id'));
            $("#departamento_id")   .val($(this).attr('Departamento_id'));
            $("#municipio_id")      .val($(this).attr('Municipio_id'));
            $("#corregimiento")     .val($(this).attr('Corregimiento'));
            $("#vereda")            .val($(this).attr('Vereda'));
            $("#finca")             .val($(this).attr('Finca'));
            $("#coordenadas")       .val($(this).attr('Coordenadas'));
            $("#altitud")           .val($(this).attr('Altitud'));
            $("#inicioCosecha")     .val($(this).attr('Cosecha_comienza'));
            $("#finCosecha")        .val($(this).attr('Cosecha_termina'));
            $("#inicioMitaca")      .val($(this).attr('Mitaca_comienza'));
            $("#finMitaca")         .val($(this).attr('Mitaca_termina'));

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_finca', function () {

            $("#id_finca").val($(this).attr('id_finca'));
            toastr.error("¿Esta seguro que desea eliminar la finca?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","FINCAS");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_finca").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/fincas/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    self.location="http://cafesdelhuila.com/fincas/create";
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-finca', function () {

            $(".btn_agregar_finca").slideDown('slow');
            $("#contenedor_registro_finca").slideUp('slow');
            $("#btn-agregar-finca").val('Agregar Finca');
            $("#btn-agregar-finca").attr('accion','1');

            $("#id_finca")         .val('');
            $("#productor_id")      .val('');
            $("#departamento_id")   .val('');
            $("#municipio_id")      .val('');
            $("#corregimiento")     .val('');
            $("#vereda")            .val('');
            $("#finca")             .val('');
            $("#coordenadas")       .val('');
            $("#altitud")           .val('');
            $("#inicioCosecha")     .val('');
            $("#finCosecha")        .val('');
            $("#inicioMitaca")      .val('');
            $("#finMitaca")         .val('');

        });

    </script>

    @stop

@stop

