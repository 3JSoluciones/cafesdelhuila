@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="http://cafesdelhuila.com/">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Sabores</li>
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
                <input type="hidden" id="id_sabor" name="id_sabor">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input style="display: none" type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-sabor">
            <input type="button" value="Agregar Sabor" accion="1"
                   class="btn btn-primary btn-sm" id="btn-agregar-sabores">
        </div>
    </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_sabor" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>NOMBRE</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sabores as $sabor)
                        <tr>
                            <td>{{ $sabor->id }}</td>
                            <td>{{ $sabor->nombre }}</td>
                            <td>{{ $sabor->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_sabor
                                btn btn-primary btn-sm" id_sabor="{{ $sabor->id }}" nombre_sabor="{{ $sabor->nombre }}">
                                <input type="button" value="Eliminar" class="btn_eliminar_sabor
                                btn btn-danger btn-sm" id_sabor="{{ $sabor->id }}">
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
        $('#tabla_sabor').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //btn agregar y actualizar
        $("#btn-agregar-sabores").click(function(){

            var nombre  = $("#nombre").val();
            var id      = $("#id_sabor").val();

            if($("#btn-agregar-sabores").attr('accion') == 1) {

                //btn agregar
                $.ajax({
                    url: 'http://cafesdelhuila.com/sabores',
                    data:{
                        nombre:nombre,
                    },
                    headers:{'X-CSRF-TOKEN': toke},
                    dataType:'json',
                    type:'POST',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/sabores/create";
                    }
                });

            } else {

                //btn actualizar
                $.ajax({
                    url: 'http://cafesdelhuila.com/sabores/' + id + '',
                    data:{
                        id:id,
                        nombre:nombre,
                    },
                    headers:{'X-CSRF-TOKEN': toke},
                    dataType:'json',
                    type:'PUT',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/sabores/create";
                    }
                });

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_sabor', function () {

            $("#btn-agregar-sabores").val('Actualizar Sabor');
            $("#btn-agregar-sabores").attr('accion','2');
            $("#btn-cancelar-sabor").slideDown('slow');
            $("#id_sabor").val($(this).attr('id_sabor'));
            $("#nombre").val($(this).attr('nombre_sabor'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_sabor', function () {

            $("#id_sabor").val($(this).attr('id_sabor'));
            toastr.error("¿Esta seguro que desea eliminar el sabor?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","SABORES");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_sabor").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/sabores/' + id + '',
                data:{
                    id:id,
                },
                headers:{'X-CSRF-TOKEN': toke},
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    self.location="http://cafesdelhuila.com/sabores/create";
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-sabor', function () {

            $("#btn-cancelar-sabor").slideUp('slow');
            $("#btn-agregar-sabores").val('Agregar Sabor');
            $("#btn-agregar-sabores").attr('accion','1');
            $("#nombre").val('');

        });

    </script>
@stop

@stop