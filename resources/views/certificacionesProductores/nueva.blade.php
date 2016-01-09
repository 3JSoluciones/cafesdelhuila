@extends('layouts.main')

@section('page-css-code')

@stop

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Certificaciones Productores</li>
            </ol>
        </div>
    </div>
    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <input type="hidden" id="id_certProd" name="id_certProd">

   <div id="contenedor_registro_certiProduct" style="display: none">

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="input">Productor</label>
                <select name="productor_id" id="productor_id" class="select" style="width: 100%"
                        required validationMessage="El campo productor es obligatorio">
                    <option value="" >Seleccione..</option>

                    @foreach($productores as $productor)
                        <option value="{{ $productor->id }}">{{ $productor->nombre }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-lg-6">
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
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-certiProd">
            <input type="button" value="Agregar Certificacion al Productor" class="btn btn-primary btn-sm"
                    id="btn-agregar-certificacionProductor" accion="1">
        </div>
    </div>

   </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Certificacion al Productor"
                       class="btn_agregar_certificacionProductor btn btn-primary btn-sm" >
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_certiProd" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>PRODUCTOR</th>
                        <th>CERTIFICACION</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($certificacionesProductores as $certificacionProductor)
                        <tr>
                            <td>{{ $certificacionProductor->id }}</td>
                            <td>{{ $certificacionProductor->productor->nombre }}</td>
                            <td>{{ $certificacionProductor->certificacion->nombre }}</td>
                            <td>{{ $certificacionProductor->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_certiProd
                                btn btn-primary btn-sm"
                                       id_certiProd="{{ $certificacionProductor->id }}"
                                       prod_certiProd="{{ $certificacionProductor->productor->id }}"
                                       cert_certiProd="{{ $certificacionProductor->certificacion->id }}" >
                                <input type="button" value="Eliminar" class="btn_eliminar_certiProd
                                btn btn-danger btn-sm" id_certiProd="{{ $certificacionProductor->id }}">
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
        $('#tabla_certiProd').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //animacion del contenedor de registro
        $(".btn_agregar_certificacionProductor").click(function () {
            $(".btn_agregar_certificacionProductor").slideUp('slow');
            $("#contenedor_registro_certiProduct").slideDown('slow');
            $(".btn_actualizar_certiProd").attr('disabled','true');
            $(".btn_eliminar_certiProd").attr('disabled','true');
        });

        //btn agregar y actualizar
        $("#btn-agregar-certificacionProductor").click(function(){

            var Productor_id        = $("#productor_id").val();
            var Certificacion_id    = $("#certificacion_id").val();
            var id                  = $("#id_certProd").val();

            if($("#btn-agregar-certificacionProductor").attr('accion') == 1) {

                if (validator.validate()) {
                    //btn agregar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/certificacionesProductores',
                        data: {
                            Productor_id: Productor_id,
                            Certificacion_id: Certificacion_id,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            self.location = "http://cafesdelhuila.com/certificacionesProductores/create";
                        }
                    });
                }

            } else {

                if (validator.validate()) {
                    //btn actualizar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/certificacionesProductores/' + id + '',
                        data: {
                            id: id,
                            Productor_id: Productor_id,
                            Certificacion_id: Certificacion_id,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        type: 'PUT',
                        success: function (data) {
                            self.location = "http://cafesdelhuila.com/certificacionesProductores/create";
                        }
                    });
                }

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_certiProd', function () {

            $(".btn_agregar_certificacionProductor").slideUp('slow');
            $("#contenedor_registro_certiProduct").slideDown('slow');
            $("#btn-agregar-certificacionProductor").val('Actualizar Certificacion a Productores');
            $("#btn-agregar-certificacionProductor").attr('accion','2');
            $(".btn_actualizar_certiProd").attr('disabled','true');
            $(".btn_eliminar_certiProd").attr('disabled','true');

            $("#id_certProd")       .val($(this).attr('id_certiProd'));
            $("#productor_id")      .val($(this).attr('prod_certiProd'));
            $("#certificacion_id")  .val($(this).attr('cert_certiProd'));

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_certiProd', function () {

            $("#id_certProd").val($(this).attr('id_certiProd'));
            toastr.error("¿Esta seguro que desea eliminar la certificacion del productor?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","CERTIFICACIONES DE PRODUCTORES");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_certProd").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/certificacionesProductores/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    self.location="http://cafesdelhuila.com/certificacionesProductores/create";
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-certiProd', function () {

            $(".btn_agregar_certificacionProductor").slideDown('slow');
            $("#contenedor_registro_certiProduct").slideUp('slow');
            $(".btn_actualizar_certiProd").attr('disabled',false);
            $(".btn_eliminar_certiProd").attr('disabled',false);
            $("#btn-agregar-certificacionProductor").val('Agregar Certificacion a Productores');
            $("#btn-agregar-certificacionProductor").attr('accion','1');
            $("#id_certProd")       .val('');
            $("#productor_id")      .val('');
            $("#certificacion_id")  .val('');

        });

    </script>
    @stop

@stop