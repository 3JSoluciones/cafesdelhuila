@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Departamentos</li>
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
                    <input type="hidden" id="id_depart" name="id_depart">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input style="display: none" type="button" value="Cancelar" class="btn btn-danger btn-sm"
                       id="btn-cancelar-departamento">
                <input type="button" value="Agregar Departamento" class="btn btn-primary btn-sm"
                       id="btn-agregar-departamento" accion="1">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_departamentos" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>NOMBRE</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departamentos as $departamento)
                        <tr>
                            <td>{{ $departamento->id }}</td>
                            <td>{{ $departamento->nombre }}</td>
                            <td>{{ $departamento->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_departamento
                                btn btn-primary btn-sm" id_depart="{{ $departamento->id }}" nombre_depart="{{ $departamento->nombre }}">
                                <input type="button" value="Eliminar" class="btn_eliminar_departamento
                                btn btn-danger btn-sm" id_depart="{{ $departamento->id }}">
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
        $('#tabla_departamentos').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //btn agregar y actualizar
        $("#btn-agregar-departamento").click(function(){

            var nombre  = $("#nombre").val();
            var id      = $("#id_depart").val();

            if($("#btn-agregar-departamento").attr('accion') == 1) {

                //btn agregar
                $.ajax({
                    url: 'http://cafesdelhuila.com/departamentos',
                    data:{
                        nombre:nombre,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    type:'POST',
                    success:function(data) {
                        toastr.info("El departamento " + nombre + " se agrego con exito.","DEPARTAMENTOS");
                        self.location="http://cafesdelhuila.com/departamentos/create";
                    }
                });

            } else {

                //btn actualizar
                $.ajax({
                    url: 'http://cafesdelhuila.com/departamentos/' + id + '',
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
                        self.location="http://cafesdelhuila.com/departamentos/create";
                    }
                });

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_departamento', function () {

            $("#btn-agregar-departamento").val('Actualizar departamento');
            $("#btn-agregar-departamento").attr('accion','2');
            $("#btn-cancelar-departamento").slideDown('slow');
            $("#id_depart").val($(this).attr('id_depart'));
            $("#nombre").val($(this).attr('nombre_depart'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_departamento', function () {

            $("#id_depart").val($(this).attr('id_depart'));
            toastr.error("¿Esta seguro que desea eliminar el departamento?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","DEPARTAMENTOS");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_depart").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/departamentos/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    self.location="http://cafesdelhuila.com/departamentos/create";
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-departamento', function () {

            $("#btn-cancelar-departamento").slideUp('slow');
            $("#btn-agregar-departamento").val('Agregar departamento');
            $("#btn-agregar-departamento").attr('accion','1');
            $("#nombre").val('');

        });


    </script>
    @stop

@stop