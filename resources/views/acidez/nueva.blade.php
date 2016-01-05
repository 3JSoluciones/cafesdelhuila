@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Acidez</li>
            </ol>
        </div>
    </div>
    <p><label>REGISTRO DE ACIDEZ</label></p>

    <form id="formularioAcidez">
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="toke" >

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label><br>
                <input type="text" class="form-control" id="nombre" name="nombre" required="required"
                       placeholder="Ingrese el Nombre" style="width: 100%">
                <input type="hidden" id="id_acidez" name="id_acidez">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input style="display: none" type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-acidez">
            <input type="button" value="Agregar Acidez" class="btn btn-primary btn-sm"
                    id="btn-agregar-acidez" accion="1">
        </div>
    </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_acidez" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>NOMBRE</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($acidez as $acidz)
                        <tr>
                            <td>{{ $acidz->id }}</td>
                            <td>{{ $acidz->nombre }}</td>
                            <td>{{ $acidz->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_acidez
                                btn btn-primary btn-sm" id_acidez="{{ $acidz->id }}" nombre_acidez="{{ $acidz->nombre }}">
                                <input type="button" value="Eliminar" class="btn_eliminar_acidez
                                btn btn-danger btn-sm" id_acidez="{{ $acidz->id }}">
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
        $('#tabla_acidez').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //btn agregar y actualizar
        $("#btn-agregar-acidez").click(function(){

            var nombre  = $("#nombre").val();
            var id      = $("#id_acidez").val();

            if($("#btn-agregar-acidez").attr('accion') == 1) {

                //btn agregar
                $.ajax({
                    url: 'http://cafesdelhuila.com/acidez',
                    data:{
                        nombre:nombre,
                    },
                    headers:{'X-CSRF-TOKEN': toke},
                    dataType:'json',
                    type:'POST',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/acidez/create";
                    }
                });

            } else {

                //btn actualizar
                $.ajax({
                    url: 'http://cafesdelhuila.com/acidez/' + id + '',
                    data:{
                        id:id,
                        nombre:nombre,
                    },
                    headers:{'X-CSRF-TOKEN': toke},
                    dataType:'json',
                    type:'PUT',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/acidez/create";
                    }
                });

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_acidez', function () {

            $("#btn-agregar-acidez").val('Actualizar Acidez');
            $("#btn-agregar-acidez").attr('accion','2');
            $("#btn-cancelar-acidez").slideDown('slow');
            $("#id_acidez").val($(this).attr('id_acidez'));
            $("#nombre").val($(this).attr('nombre_acidez'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_acidez', function () {

            $("#id_acidez").val($(this).attr('id_acidez'));
            toastr.error("¿Esta seguro que desea eliminar la acidez?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","ACIDEZ");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_acidez").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/acidez/' + id + '',
                data:{
                    id:id,
                },
                headers:{'X-CSRF-TOKEN': toke},
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    self.location="http://cafesdelhuila.com/acidez/create";
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-acidez', function () {

            $("#btn-cancelar-acidez").slideUp('slow');
            $("#btn-agregar-acidez").val('Agregar Acidez');
            $("#btn-agregar-acidez").attr('accion','1');
            $("#nombre").val('');

        });


    </script>
@stop

@stop
