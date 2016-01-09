@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Aromas</li>
            </ol>
        </div>
    </div>

    <form class="formValidation">
        <meta name="csrf-token" content="{{ csrf_token() }}">

   <div id="contenedor_registro_aroma" style="display: none">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text" class="k-textbox" id="nombre" name="nombre" required="required"
                       placeholder="Ingrese el Nombre" style="width: 100%" required validationMessage="El campo {0} es obligatorio">
                <input type="hidden" id="id_aromas" name="id_aromas">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-aromas">
            <input type="button" value="Agregar Aroma" class="btn btn-primary btn-sm"
                    id="btn-agregar-aromas" accion="1">
        </div>
    </div>

   </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Aroma" class="btn_agregar_aromas btn btn-primary btn-sm">
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_aromas" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>NOMBRE</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($aromas as $aroma)
                        <tr>
                            <td>{{ $aroma->id }}</td>
                            <td>{{ $aroma->nombre }}</td>
                            <td>{{ $aroma->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_aromas
                                btn btn-primary btn-sm" id_aromas="{{ $aroma->id }}" nombre_aromas="{{ $aroma->nombre }}">
                                <input type="button" value="Eliminar" class="btn_eliminar_aromas
                                btn btn-danger btn-sm" id_aromas="{{ $aroma->id }}">
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
        $('#tabla_aromas').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //animacion del contenedor de registro
        $(".btn_agregar_aromas").click(function () {
            $(".btn_agregar_aromas").slideUp('slow');
            $("#contenedor_registro_aroma").slideDown('slow');
            $(".btn_actualizar_aromas").attr('disabled','true');
            $(".btn_eliminar_aromas").attr('disabled','true');
        });

        //btn agregar y actualizar
        $("#btn-agregar-aromas").click(function(){


            var nombre  = $("#nombre").val();
            var id      = $("#id_aromas").val();

            if($("#btn-agregar-aromas").attr('accion') == 1) {

                if (validator.validate()) {
                    //btn agregar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/aromas',
                        data: {
                            nombre: nombre,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        type: 'POST',
                        success: function (data) {
                            self.location = "http://cafesdelhuila.com/aromas/create";
                        }
                    });
                }

            } else {

                if (validator.validate()) {
                    //btn actualizar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/aromas/' + id + '',
                        data: {
                            id: id,
                            nombre: nombre,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        type: 'PUT',
                        success: function (data) {
                            self.location = "http://cafesdelhuila.com/aromas/create";
                        }
                    });
                }

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_aromas', function () {

            $(".btn_actualizar_aromas").attr('disabled','true');
            $(".btn_eliminar_aromas").attr('disabled','true');
            $(".btn_agregar_aromas").slideUp('slow');
            $("#contenedor_registro_aroma").slideDown('slow');
            $("#btn-agregar-aromas").val('Actualizar Aromas');
            $("#btn-agregar-aromas").attr('accion','2');
            $("#id_aromas").val($(this).attr('id_aromas'));
            $("#nombre").val($(this).attr('nombre_aromas'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_aromas', function () {

            $("#id_aromas").val($(this).attr('id_aromas'));
            toastr.error("¿Esta seguro que desea eliminar el aroma?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","AROMAS");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_aromas").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/aromas/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    self.location="http://cafesdelhuila.com/aromas/create";
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-aromas', function () {

            $(".btn_actualizar_aromas").attr('disabled',false);
            $(".btn_eliminar_aromas").attr('disabled',false);
            $(".btn_agregar_aromas").slideDown('slow');
            $("#contenedor_registro_aroma").slideUp('slow');
            $("#btn-agregar-aromas").val('Agregar Aromas');
            $("#btn-agregar-aromas").attr('accion','1');
            $("#nombre").val('');

        });

    </script>
    @stop

@stop