@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="http://cafesdelhuila.com/">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Variedades</li>
            </ol>
        </div>
    </div>

    <form>
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required="required"
                       placeholder="Ingrese el Nombre" style="width: 100%">
                <input type="hidden" id="id_varied" name="id_varied">
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="input">Acidez</label>
                    <select name="acidez_id" id="acidez_id" class="form-control" style="width: 100%">
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
                    <select name="aroma_id" id="aroma_id" class="form-control" style="width: 100%">
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
                    <select name="sabor_id" id="sabor_id" class="form-control" style="width: 100%">
                        <option value="">Seleccione..</option>

                        @foreach($sabores as $sabor)
                            <option value="{{ $sabor->id }}">{{ $sabor->nombre }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>

        <input type="hidden" id="Variedadescol" value="<?php echo date('Y-m-d H:i:s'); ?>">

    <div class="row">
        <div class="col-lg-12 text-right">
            <input style="display: none" type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-varied">
            <input type="button" value="Agregar Variedad" class="btn btn-primary btn-sm"
                   id="btn-agregar-variedad" accion="1">
        </div>
    </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_varied" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>NOMBRE</th>
                        <th>ACIDEZ</th>
                        <th>AROMA</th>
                        <th>SABOR</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($variedades as $variedad)
                        <tr>
                            <td>{{ $variedad->id }}</td>
                            <td>{{ $variedad->nombre }}</td>
                            <td>{{ $variedad->acidez->nombre }}</td>
                            <td>{{ $variedad->aroma->nombre }}</td>
                            <td>{{ $variedad->sabor->nombre }}</td>
                            <td>{{ $variedad->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_varied
                                btn btn-primary btn-sm"
                                       id_varied="{{ $variedad->id }}"
                                       nombre_varied="{{ $variedad->nombre }}"
                                       acidez_varied="{{ $variedad->acidez->id }}"
                                       aroma_varied="{{ $variedad->aroma->id }}"
                                       sabor_varied="{{ $variedad->sabor->id }}"
                                       varidCol_varied="{{ $variedad->variedadescol }}" >
                                <input type="button" value="Eliminar" class="btn_eliminar_varied
                                btn btn-danger btn-sm" id_varied="{{ $variedad->id }}">
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
        $('#tabla_varied').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //btn agregar y actualizar
        $("#btn-agregar-variedad").click(function(){

            var Acidez_id       = $("#acidez_id").val();
            var Aroma_id        = $("#aroma_id").val();
            var Sabor_id        = $("#sabor_id").val();
            var nombre          = $("#nombre").val();
            var Variedadescol   = $("#Variedadescol").val();
            var id              = $("#id_varied").val();

            if($("#btn-agregar-variedad").attr('accion') == 1) {

                //btn agregar
                $.ajax({
                    url: 'http://cafesdelhuila.com/variedades',
                    data:{
                        Acidez_id:Acidez_id,
                        Aroma_id:Aroma_id,
                        Sabor_id:Sabor_id,
                        nombre:nombre,
                        Variedadescol:Variedadescol,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    type:'POST',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/variedades/create";
                    }
                });

            } else {

                //btn actualizar
                $.ajax({
                    url: 'http://cafesdelhuila.com/variedades/' + id + '',
                    data:{
                        Acidez_id:Acidez_id,
                        Aroma_id:Aroma_id,
                        Sabor_id:Sabor_id,
                        nombre:nombre,
                        Variedadescol:Variedadescol,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    type:'PUT',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/variedades/create";
                    }
                });

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_varied', function () {

            $("#btn-agregar-variedad").val('Actualizar Variedad');
            $("#btn-agregar-variedad").attr('accion','2');
            $("#btn-cancelar-varied").slideDown('slow');

            $("#id_varied")     .val($(this).attr('id_varied'));
            $("#acidez_id")     .val($(this).attr('acidez_varied'));
            $("#aroma_id")      .val($(this).attr('aroma_varied'));
            $("#sabor_id")      .val($(this).attr('sabor_varied'));
            $("#nombre")        .val($(this).attr('nombre_varied'));
            $("#Variedadescol") .val($(this).attr('varidCol_varied'));

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_varied', function () {

            $("#id_varied").val($(this).attr('id_varied'));
            toastr.error("¿Esta seguro que desea eliminar la variedad?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","VARIEDADES");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_varied").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/variedades/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    self.location="http://cafesdelhuila.com/variedades/create";
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-varied', function () {

            $("#btn-cancelar-varied").slideUp('slow');
            $("#btn-agregar-variedad").val('Agregar Variedad');
            $("#btn-agregar-variedad").attr('accion','1');
            $("#id_varied")     .val('');
            $("#acidez_id")     .val('');
            $("#aroma_id")      .val('');
            $("#sabor_id")      .val('');
            $("#nombre")        .val('');
            $("#Variedadescol") .val('');

        });

    </script>
    @stop

@stop