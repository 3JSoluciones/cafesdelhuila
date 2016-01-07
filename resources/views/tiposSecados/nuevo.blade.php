@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Tipo de Secados</li>
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
                <input type="hidden" id="id_tipoSeca" name="id_tipoSeca">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input style="display: none" type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-tipoSeca">
            <input type="button" value="Agregar Nuevo Tipo" class="btn btn-primary btn-sm"
                    id="btn-agregar-tipoSecados" accion="1">
        </div>
    </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_tipoSeca" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>NOMBRE</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tiposSecados as $tipoSecado)
                        <tr>
                            <td>{{ $tipoSecado->id }}</td>
                            <td>{{ $tipoSecado->nombre }}</td>
                            <td>{{ $tipoSecado->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_tipoSeca
                                btn btn-primary btn-sm" id_tipoSeca="{{ $tipoSecado->id }}" nombre_tipoSeca="{{ $tipoSecado->nombre }}">
                                <input type="button" value="Eliminar" class="btn_eliminar_tipoSeca
                                btn btn-danger btn-sm" id_tipoSeca="{{ $tipoSecado->id }}">
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
        $('#tabla_tipoSeca').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //btn agregar y actualizar
        $("#btn-agregar-tipoSecados").click(function(){

            var nombre  = $("#nombre").val();
            var id      = $("#id_tipoSeca").val();

            if($("#btn-agregar-tipoSecados").attr('accion') == 1) {

                //btn agregar
                $.ajax({
                    url: 'http://cafesdelhuila.com/tiposSecados',
                    data:{
                        nombre:nombre,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    type:'POST',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/tiposSecados/create";
                    }
                });

            } else {

                //btn actualizar
                $.ajax({
                    url: 'http://cafesdelhuila.com/tiposSecados/' + id + '',
                    data:{
                        id:id,
                        nombre:nombre,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    type:'PUT',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/tiposSecados/create";
                    }
                });

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_tipoSeca', function () {

            $("#btn-agregar-tipoSecados").val('Actualizar Tipo Secado');
            $("#btn-agregar-tipoSecados").attr('accion','2');
            $("#btn-cancelar-tipoSeca").slideDown('slow');
            $("#id_tipoSeca").val($(this).attr('id_tipoSeca'));
            $("#nombre").val($(this).attr('nombre_tipoSeca'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_tipoSeca', function () {

            $("#id_tipoSeca").val($(this).attr('id_tipoSeca'));
            toastr.error("¿Esta seguro que desea eliminar el Tipo de Secado?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","TIPOS DE SECADOS");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_tipoSeca").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/tiposSecados/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    self.location="http://cafesdelhuila.com/tiposSecados/create";
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-tipoSeca', function () {

            $("#btn-cancelar-tipoSeca").slideUp('slow');
            $("#btn-agregar-tipoSecados").val('Agregar Tipo Secado');
            $("#btn-agregar-tipoSecados").attr('accion','1');
            $("#nombre").val('');

        });

    </script>
@stop

@stop