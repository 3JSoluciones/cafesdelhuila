@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Organizaciones</li>
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
                <input type="hidden" id="id_organiz" name="id_organiz">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input style="display: none" type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-organiz">
            <input type="button" value="Agregar Organizacion" accion="1"
                   class="btn btn-primary btn-sm" id="btn-agregar-organizacion">
        </div>
    </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_organiz" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>NOMBRE</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($organizaciones as $organizacion)
                        <tr>
                            <td>{{ $organizacion->id }}</td>
                            <td>{{ $organizacion->nombre }}</td>
                            <td>{{ $organizacion->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_organiz
                                btn btn-primary btn-sm" id_organiz="{{ $organizacion->id }}" nombre_organiz="{{ $organizacion->nombre }}">
                                <input type="button" value="Eliminar" class="btn_eliminar_organiz
                                btn btn-danger btn-sm" id_organiz="{{ $organizacion->id }}">
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
        $('#tabla_organiz').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //btn agregar y actualizar
        $("#btn-agregar-organizacion").click(function(){

            var nombre  = $("#nombre").val();
            var id      = $("#id_organiz").val();

            if($("#btn-agregar-organizacion").attr('accion') == 1) {

                //btn agregar
                $.ajax({
                    url: 'http://cafesdelhuila.com/organizaciones',
                    data:{
                        nombre:nombre,
                    },
                    headers:{'X-CSRF-TOKEN': toke},
                    dataType:'json',
                    type:'POST',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/organizaciones/create";
                    }
                });

            } else {

                //btn actualizar
                $.ajax({
                    url: 'http://cafesdelhuila.com/organizaciones/' + id + '',
                    data:{
                        id:id,
                        nombre:nombre,
                    },
                    headers:{'X-CSRF-TOKEN': toke},
                    dataType:'json',
                    type:'PUT',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/organizaciones/create";
                    }
                });

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_organiz', function () {

            $("#btn-agregar-organizacion").val('Actualizar organizacion');
            $("#btn-agregar-organizacion").attr('accion','2');
            $("#btn-cancelar-organiz").slideDown('slow');
            $("#id_organiz").val($(this).attr('id_organiz'));
            $("#nombre").val($(this).attr('nombre_organiz'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_organiz', function () {

            $("#id_organiz").val($(this).attr('id_organiz'));
            toastr.error("¿Esta seguro que desea eliminar la organizacion?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","ORGANIZACIONES");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_organiz").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/organizaciones/' + id + '',
                data:{
                    id:id,
                },
                headers:{'X-CSRF-TOKEN': toke},
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    self.location="http://cafesdelhuila.com/organizaciones/create";
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-organiz', function () {

            $("#btn-cancelar-organiz").slideUp('slow');
            $("#btn-agregar-organizacion").val('Agregar organizacion');
            $("#btn-agregar-organizacion").attr('accion','1');
            $("#nombre").val('');

        });


    </script>
    @stop

@stop