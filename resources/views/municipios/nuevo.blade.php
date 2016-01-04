@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Municipios</li>
            </ol>
        </div>
    </div>

    <form>
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="toke" >

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required="required"
                       placeholder="Ingrese el Nombre" style="width: 100%">
                <input type="hidden" id="id_municipio" name="id_municipio">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input style="display: none" type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-municipio">
            <input type="button" value="Agregar Municipio"
                   class="btn btn-primary btn-sm" id="btn-agregar-municipio">
        </div>
    </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_municipios" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>NOMBRE</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($municipios as $municipio)
                        <tr>
                            <td>{{ $municipio->id }}</td>
                            <td>{{ $municipio->nombre }}</td>
                            <td>{{ $municipio->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_municipio
                                btn btn-primary btn-sm" id_municipio="{{ $municipio->id }}" nombre_municipio="{{ $municipio->nombre }}">
                                <input type="button" value="Eliminar" class="btn_eliminar_municipio
                                btn btn-danger btn-sm" id_municipio="{{ $municipio->id }}">
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
            $('#tabla_municipios').DataTable({
                "language": {
                    "url": "/bower_components/jquery/Spanish.json"
                }
            });

            $("#btn-agregar-municipio").click(function(){
                var nombre = $("#nombre").val();

            });

            //btn agregar y actualizar departamentos
            $("#btn-agregar-municipio").click(function(){

                var nombre  = $("#nombre").val();
                var id      = $("#id_municipio").val();

                if($("#btn-agregar-municipio").attr('accion') == 1) {

                    //btn agregar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/municipios',
                        data:{
                            nombre:nombre,
                        },
                        headers:{'X-CSRF-TOKEN': toke},
                        dataType:'json',
                        type:'POST',
                        success:function(data) {
                            self.location="http://cafesdelhuila.com/municipios/create";
                        }
                    });

                } else {

                    //btn actualizar
                    $.ajax({
                        url: 'http://cafesdelhuila.com/municipios/' + id + '',
                        data:{
                            id:id,
                            nombre:nombre,
                        },
                        headers:{'X-CSRF-TOKEN': toke},
                        dataType:'json',
                        type:'PUT',
                        success:function(data) {
                            self.location="http://cafesdelhuila.com/municipios/create";
                        }
                    });

                }

            });

            //btn actualizar departamentos
            $(document).on('click','.btn_actualizar_municipio', function () {

                $("#btn-agregar-municipio").val('Actualizar municipio');
                $("#btn-agregar-municipio").attr('accion','2');
                $("#btn-cancelar-municipio").slideDown('slow');
                $("#id_municipio").val($(this).attr('id_municipio'));
                $("#nombre").val($(this).attr('nombre_municipio'));
                console.log('actualizando');

            });

            //btn eliminar departamentos
            $(document).on('click','.btn_eliminar_municipio', function () {

                $("#id_municipio").val($(this).attr('id_municipio'));
                toastr.error("¿Esta seguro que desea eliminar el municipio?<br>" +
                        "<button class='btn-danger confirmar'>Confirmar eliminar</button>","MUNICIPIOS");

            });

            //confirmar eliminar
            $(document).on('click','.confirmar', function () {

                var id = $("#id_municipio").val();
                $.ajax({
                    url: 'http://cafesdelhuila.com/municipios/' + id + '',
                    data:{
                        id:id,
                    },
                    headers:{'X-CSRF-TOKEN': toke},
                    dataType:'json',
                    type:'DELETE',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/municipios/create";
                    }
                });

            });

            //cancelar actualizar
            $(document).on('click','#btn-cancelar-municipio', function () {

                $("#btn-cancelar-municipio").slideUp('slow');
                $("#btn-agregar-municipio").val('Agregar municipio');
                $("#btn-agregar-municipio").attr('accion','1');
                $("#nombre").val('');

            })

        </script>

    @stop

@stop