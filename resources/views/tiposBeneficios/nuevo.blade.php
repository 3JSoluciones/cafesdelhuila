@extends('layouts.main')

@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="/home">Inicio</a></li>
                <li><a href="#">Cafes del Huila</a></li>
                <li class="active" id="proceso_activo">Tipo de Beneficios</li>
            </ol>
        </div>
    </div>
    <form>
        <meta name="csrf-token" content="{{ csrf_token() }}">

   <div id="contenedor_registro_tipoBenef" style="display: none">

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required="required"
                       placeholder="Ingrese el Nombre" style="width: 100%">
                <input type="hidden" id="id_tipoBene" name="id_tipoBene">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-right">
            <input type="button" value="Cancelar" class="btn btn-danger btn-sm"
                   id="btn-cancelar-tipoBene">
            <input type="button" value="Agregar Nuevo Tipo" class="btn btn-primary btn-sm"
                    id="btn-agregar-tipoBeneficio" accion="1">
        </div>
    </div>

    </div>

        <div class="row">
            <div class="col-lg-12 text-right">
                <input type="button" value="+ Agregar Nuevo Tipo"
                       class="btn_agregar_tipoBeneficio btn btn-primary btn-sm">
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-lg-12">

                <table id="tabla_tipoBene" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>NIT</th>
                        <th>NOMBRE</th>
                        <th>CREADO</th>
                        <th>ACCION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tiposBeneficios as $tipoBeneficio)
                        <tr>
                            <td>{{ $tipoBeneficio->id }}</td>
                            <td>{{ $tipoBeneficio->nombre }}</td>
                            <td>{{ $tipoBeneficio->created_at }}</td>
                            <td>
                                <input type="button" value="Actualizar" class="btn_actualizar_tipoBene
                                btn btn-primary btn-sm" id_tipoBene="{{ $tipoBeneficio->id }}" nombre_tipoBene="{{ $tipoBeneficio->nombre }}">
                                <input type="button" value="Eliminar" class="btn_eliminar_tipoBene
                                btn btn-danger btn-sm" id_tipoBene="{{ $tipoBeneficio->id }}">
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
        $('#tabla_tipoBene').DataTable({
            "language": {
                "url": "/bower_components/jquery/Spanish.json"
            }
        });

        //animacion del contenedor de registro
        $(".btn_agregar_tipoBeneficio").click(function () {
            $(".btn_agregar_tipoBeneficio").slideUp('slow');
            $("#contenedor_registro_tipoBenef").slideDown('slow');
        });

        //btn agregar y actualizar
        $("#btn-agregar-tipoBeneficio").click(function(){

            var nombre  = $("#nombre").val();
            var id      = $("#id_tipoBene").val();

            if($("#btn-agregar-tipoBeneficio").attr('accion') == 1) {

                //btn agregar
                $.ajax({
                    url: 'http://cafesdelhuila.com/tiposBeneficios',
                    data:{
                        nombre:nombre,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType:'json',
                    type:'POST',
                    success:function(data) {
                        self.location="http://cafesdelhuila.com/tiposBeneficios/create";
                    }
                });

            } else {

                //btn actualizar
                $.ajax({
                    url: 'http://cafesdelhuila.com/tiposBeneficios/' + id + '',
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
                        self.location="http://cafesdelhuila.com/tiposBeneficios/create";
                    }
                });

            }

        });

        //btn actualizar
        $(document).on('click','.btn_actualizar_tipoBene', function () {

            $(".btn_agregar_tipoBeneficio").slideUp('slow');
            $("#contenedor_registro_tipoBenef").slideDown('slow');
            $("#btn-agregar-tipoBeneficio").val('Actualizar tipo beneficio');
            $("#btn-agregar-tipoBeneficio").attr('accion','2');
            $("#id_tipoBene").val($(this).attr('id_tipoBene'));
            $("#nombre").val($(this).attr('nombre_tipoBene'));
            console.log('actualizando');

        });

        //btn eliminar
        $(document).on('click','.btn_eliminar_tipoBene', function () {

            $("#id_tipoBene").val($(this).attr('id_tipoBene'));
            toastr.error("¿Esta seguro que desea eliminar el tipo de beneficio?<br>" +
                    "<button class='btn-danger confirmar'>Confirmar eliminar</button>","TIPOS DE BENEFICIOS");

        });

        //confirmar eliminar
        $(document).on('click','.confirmar', function () {

            var id = $("#id_tipoBene").val();
            $.ajax({
                url: 'http://cafesdelhuila.com/tiposBeneficios/' + id + '',
                data:{
                    id:id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType:'json',
                type:'DELETE',
                success:function(data) {
                    self.location="http://cafesdelhuila.com/tiposBeneficios/create";
                }
            });

        });

        //cancelar actualizar
        $(document).on('click','#btn-cancelar-tipoBene', function () {

            $(".btn_agregar_tipoBeneficio").slideDown('slow');
            $("#contenedor_registro_tipoBenef").slideUp('slow');
            $("#btn-agregar-tipoBeneficio").val('Agregar tipo beneficio');
            $("#btn-agregar-tipoBeneficio").attr('accion','1');
            $("#nombre").val('');

        });


    </script>
@stop

@stop